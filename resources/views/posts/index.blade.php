@extends("layout")

@section('content')

    @if (session()->has("status"))
        <h2 style="color: green">
            {{ session()->get("status") }}
        </h2>
    @endif

    <h1 class="text-center">List of Posts : </h1>
    <ul>
        <div class="container">
            <div class="row">
            @forelse ($posts as $post)
                <div class="col-md-6 mx-auto">             
                    <div class="card" >
                        <img src="..." class="card-img-top" alt="">
                        <div class="card-body">
                        <h3 class="card-title"> <a href="{{route("posts.show", ["post" => $post->id])}}"> {{ $post->Title }}</a> </h3>
                        <p class="card-text"> {{ $post->Content}}.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$post->created_at->diffForHumans() }}</li>
                        <li class="list-group-item">
                            @if ($post->comments_count > 0)
                                <span class="badge bg-success">  {{ $post->comments_count }} comments</span>               
                            @else
                                <span class="badge bg-dark">  no comments !</span>                            
                            @endif                               
                        </li>
                        </ul>
                        <div class="card-body">
                            <a class="btn btn-warning" href=" {{route("posts.edit", ["post"=>$post]) }} "> Edit</a>   
                            <form  style="display: inline;" method="POST" action="{{ route("posts.destroy", ["post" => $post]) }}">
                                @csrf
                                @method("DELETE")            
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>    
                </div>    
            </div>
        </div>        
        @empty
            <p> Not have posts</p>        
        @endforelse
    </ul>
    
    
@endsection


