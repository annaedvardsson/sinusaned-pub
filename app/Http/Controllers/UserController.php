<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        
        $users = User::orderBy('role_id', 'asc')->orderBy('name', 'asc')->paginate(2);
        return view('users.index', ['users' => $users]);
    }


    public function create(Role $roles)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        return view('users.create', ['roles' => $roles->all()]);
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');

        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'phone' => ['required', 'regex:/^0[0-9]{2}-?[0-9]{7}$/'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required',
            'is_accessible' => ['required', 'regex:/^0|1/'],
        ]);

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        User::create($formFields);

        return redirect('/users')->with('message', 'User created successfully');
    }

    /** Show the form for editing the specified resource. */
    public function edit(User $user, Role $roles)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        return view('users.edit', ['user' => $user, 'roles' => $roles->all()]);
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, User $user)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'phone' => ['required', 'regex:/^0[0-9]{2}-?[0-9]{7}$/'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user)],
            'password' => 'nullable|confirmed|min:6', // Make the password field nullable
            'role_id' => 'required',
            'is_accessible' => ['required', 'regex:/^0|1/'],
        ]);

        
        // Check if last admin
        $adminUsers = User::where('role_id', 1)->count();
        if ($user->role_id == Role::IS_ADMIN && $request->role_id == Role::IS_USER && $adminUsers < 2) {
            return back()->with('message', 'You cannot change the role.<br>There must be at least one Admin account!');
        }

        // Check if a new password was provided - MUST be above other updates to ensure update of demoted admins
        if ($request->filled('password')) {
            // Hash and update the new password
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        // Update only the provided form fields
        // If logged in admin was demoted automatic logout is managed in Middleware/CheckUserRoleAdmin
        $user->update($request->only(['name', 'address', 'zip', 'city', 'phone', 'email', 'role_id', 'is_accessible']));

        return redirect('/users')->with('message', 'User updated successfully!');
    }


    /********** FUNCTIONS WITH USER ACCESS **********/

    public function show_profile(User $user)
    {
        if ($user->role_id == 1) {
            return back()->with('message', 'Admin roles does not have a profile page!');
        }

        return view('users.show_profile', ['user' => $user]);
    }

    /** Show the form for editing the specified resource. */
    public function edit_profile(User $user)
    {
        return view('users.edit_profile', ['user' => $user]);
    }

    public function update_profile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'phone' => ['required', 'regex:/^0[0-9]{2}-?[0-9]{7}$/'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user)],
            'password' => 'nullable|confirmed|min:6', // Make the password field nullable
        ]);

        // Check if a new password was provided - MUST be above other updates to ensure update of demoted admins
        if ($request->filled('password')) {
            // Hash and update the new password
            $user->update(['password' => bcrypt($request->input('password'))]);
        }

        // Update only the provided form fields
        $user->update($request->only(['name', 'address', 'zip', 'city', 'phone', 'email']));
        
        return redirect(route('users.user.show_profile', $user->id))->with('message', 'Profile updated successfully!');
    }


    public function register()
    {
        return view('users.register');
    }

    // save new registred user
    public function registerstore(Request $request)
    {
        $previousSessionID = $request->session()->getId();

        $formFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'phone' => ['required', 'regex:/^0[0-9]{2}-?[0-9]{7}$/'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        // set role_id as user (2) and accessible as true (1)
        $formFields['role_id'] = 2;
        $formFields['is_accessible'] = 1;

        // hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);
        
        // automatically log in the new user
        auth()->login($user);

        // Retrieve the cart associated with the previous session ID (ie before login)
        $cart = Cart::where('session_id', $previousSessionID)->first();
        if ($cart) {
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        return redirect('/')->with('message', 'User created and logged in.');
    }
    
    public function login()
    {
        return view('users.login');
    }
    
    // authenticate user login
    public function authenticate(Request $request)
    {
        $previousSessionID = $request->session()->getId();

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',           
        ]);
        
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            // Retrieve the cart associated with the previous session ID (ie before login)
            $cart = Cart::where('session_id', $previousSessionID)->first();
            if ($cart) {
                $cart->user_id = Auth::user()->id;
                $cart->save();
            }
            
            return redirect('/')->with('message', 'You are logged in');
        }
        
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        abort_if(auth()->id() === null, 403, 'Page does not exist');

        auth()->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with('message', 'You have been logged out!');
    }    
}
