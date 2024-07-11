<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function main()
    {
        return view('products.main', [
            'products' => Product::filter(request(['search', 'categories', 'colors']))->orderBy('category_id', 'asc')->orderBy('color_id', 'asc')->paginate(12),
            'categories' => Category::all(),
            'colors' => Color::all(),
        ]);
    }

    /** Display a listing of the resource. */
    public function index()
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        
        return view('products.index', [
            'products' => Product::filter(request(['search', 'categories', 'colors']))->orderBy('category_id', 'asc')->orderBy('color_id', 'asc')->paginate(10),
            'categories' => Category::all(),
            'colors' => Color::all(),
        ]);

    }

    /** Show the form for creating a new resource. */
    public function create(Category $category, Color $color)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        
        return view('products.create',
            [
                'categories' => $category->all(),
                'colors' => $color->all()
            ]
        );
    }

    /** Store a newly created resource in storage. */
    public function store(Request $request)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        
        $formFields = $request->validate([
            'category_id' => 'required',
            'color_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'is_accessible' => 'required'
        ]);

        if ($request->has('image') && $request->image != '') {
            $imageRegex = '/sinus-[a-z]+-[a-z_]+\.(png|jpg)/i';

            if (preg_match($imageRegex, $request->image)) {
                $formFields['image'] = $request->image;
            } else {
                return redirect('/products/create')->withInput()->withErrors(['image' => 'Wrong name format']);
            }
        }

        Product::create($formFields);

        return redirect('/products')->with('message', 'New product added to the webshop!');
    }

    /** Display the specified resource. */
    public function show(Product $product)
    {
        $productsWithSameTitle = Product::where('title', $product->title)
            ->whereNotIn('id', [$product->id])
            ->get();
        
        return view('products.show', ['product' => $product, 'productsWithSameTitle' => $productsWithSameTitle]);
    }

    /** Show the form for editing the specified resource. */
    public function edit(Product $product, Category $category, Color $color)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');

        return view('products.edit',
            [
                'product' => $product,
                'categories' => $category->all(),
                'colors' => $color->all()
            ]
        );
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, Product $product)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        
        $formFields = $request->validate([
            'category_id' => 'required',
            'color_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'is_accessible' => 'required'
        ]);

        if ($request->has('image') && $request->image != '') {
            $imageRegex = '/sinus-[a-z]+-[a-z_]+\.(png|jpg)/i';

            if (preg_match($imageRegex, $request->image)) {
                $formFields['image'] = $request->image;
            } else {
                return redirect('/products/create')->withInput()->withErrors(['image' => 'Wrong name format']);
            }
        }

        $product->update($formFields);

        return redirect('/products')->with('message', 'Product updated successfully!');
    }

    /** Show the form to confirm removal of a specific resource. */
    public function confirm_delete(Product $product)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');

        return view('products.delete', ['product' => $product]);
    }

    /** Remove the specified resource from storage. */
    public function destroy(Product $product)
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');
        
        $product->delete();
        return redirect('/products')->with('message', 'Product deleted successfully!');
    }
}
