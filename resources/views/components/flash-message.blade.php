@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="fixed top-1/3 left-1/2 transform -translate-x-1/2 bg-hover text-white text-2xl px-48 py-3 rounded">
   <p>
      {!! session('message') !!}
      {{-- {{ session('message') }}   {!! !!} to allow eg <br> --}}
   </p>
</div>
@endif