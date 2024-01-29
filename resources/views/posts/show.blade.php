@extends("layout")

@section('content')

    <h1>  Post : </h1>
    <a href=" {{route("posts.edit", ["post"=>$post]) }} "> Edit</a>
        <li>
            <h2> {{ $post->Title }}</h2>

            <p>{{ $post->Content}}</p>
        
            <span>{{$post->created_at}}</span>
        </li>
        <p> Status : 
        @if ($post->Active)
        <span> Enable</span>
        @else
            <span> Disable</span>
                    
        @endif
        </p>
        
@endsection
    
