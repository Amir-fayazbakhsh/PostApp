@extends('layout.app')


@section('content')

<div class="container d-flex justify-content-center">
    <div class="w-50 p-2 bg-dark text-light">
        <x-post :row="$post"/>
    </div>
</div>



@endsection