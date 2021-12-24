@props(['row'=> $row])


    <!-- An unexamined life is not worth living. - Socrates -->
    <div class="btn-light mt-5">
        <a href="{{route('user.posts',$row->user)}}" class="font-bold m-2">{{$row->user->name}}</a> <span class="text-gray text-sm m-2">{{$row->created_at->diffForHumans()}}</span>
        <p class="m-2">{{$row->body}}</p>
        {{-- ////////////// delete post --}}
        @auth
            
            {{-- @can('delete',$row) --}}

            @if($row->ownedBy(auth()->user()))
                <form method="POST" action="{{route('post.delete',$row)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                </form>
            @endif
            {{-- @endcan --}}
        @endauth
        {{-- ///////////// --}}
        <div class="d-flex items-center mt-3">
            @auth
                @if(!$row->likedBy(auth()->user()))
                    <form action="{{ route('post.like',$row) }}" method="POST">
                        @csrf
                        <button type="submit" class="rounded btn btn-sm btn-primary">like</button>
                    </form>
                @else
                    <form action="{{ route('post.like',$row) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded btn btn-sm btn-danger">unlike</button>
                    </form>
                @endif
            @endauth
            <span class="ml-2">{{$row->likes->count()}} {{Str::plural('like',$row->likes->count())}}</span>
        </div>
    </div>