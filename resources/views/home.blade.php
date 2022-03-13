@extends('layout.app')

@yield('content')

@section('content')
    <div class="">
        <img class="object-fill h-screen w-full overflow-hidden" src="{{ asset('images/komodo.webp') }}" alt="">
    </div>
@endsection
