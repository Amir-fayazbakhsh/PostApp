@extends('layout.app')


@section('content')

<div class="container d-flex justify-content-center">
    <div class="w-50 p-2 bg-dark text-light">
        Posts Of  {{$user->name}}
        <br>
        Posted {{$posts->count()}} {{Str::plural('posts',$posts->count())}} And received {{$user->receivedLike()->count()}} {{Str::plural('likes',$user->receivedLike()->count())}}
    </div>
</div>


<div class="container">
    @if($posts->count())
            @foreach($posts as $row)

                {{--//post component--}}
                <x-post :row="$row" />

             @endforeach
               <span class="text-center mt-5">{{ $posts->links() }} </span>
            @else
                {{ "there is no post" }}
    @endif
</div>



@endsection