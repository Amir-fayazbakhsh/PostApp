@extends('layout.app')


@section('content')

<div class="container d-flex justify-content-center">
    <div class="w-50 p-2 bg-secondary text-light">
        @auth
            <form action="{{route('post')}}" method="POST">
                @csrf
                <div class="mb-3">
                <label for="body" class="form-label">Post Content</label>
                <textarea class="form-control @error('body') border border-danger @enderror" name="body" id="body" rows="4" value="{{old('body')}}" ></textarea>
                @error('body')<div class="text-sm text-danger mt-2">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-light">Create</button>
            </form>
        @endauth

        @if($posts->count())
            @foreach($posts as $row)
                {{-- <a href={{route('post.show',$row)}}> --}}

                    {{--//post component--}}
                    <x-post :row="$row" />
                {{-- </a> --}}

             @endforeach
               <span class="text-center mt-5">{{ $posts->links() }} </span>
            @else
                {{ "there is no post" }}
            @endif

            <style>
                .w-5{
                    width: 20px;
                }
            </style>

    </div>
</div>


@endsection
