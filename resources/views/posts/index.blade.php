@extends("layout")

@section('content')

    @if (session()->has("status"))
        <h2 style="color: green">
            {{ session()->get("status") }}
        </h2>
    @endif

    <h1>List of Posts : </h1>
    <ul>
        @forelse ($posts as $post)
            <li>
           
            <h2> <a href="{{route("posts.show", ["post" => $post->id])}}"> {{ $post->Title }}</a></h2>

            <p>{{ $post->Content}}</p>
        
            <span>{{$post->created_at->diffForHumans() }}</span>
            </li>     
        @empty
            <p> Not have posts</p>        
        @endforelse
    </ul>
    
    
@endsection
