@extends("layouts.app")

@section('content')

    @if (session()->has("status"))
        <h2 style="color: green">
            {{ session()->get("status") }}
        </h2>
    @endif


    
    <ul>
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link   @if($tab =='list') active @endif" aria-current="page" href="/posts">List</a>
                </li>
        
                <li class="nav-item">
                  <a class="nav-link  @if($tab =='archive') active @endif" href="/posts/archive">Archive</a>
                </li>
        
                <li class="nav-item">
                  <a class="nav-link  @if($tab =='all') active @endif" href="/posts/all">All</a>
                </li>   
              </ul>
        
            <h1 class="text-center">List of Posts : </h1> {{ $posts->count()}} Post(s)
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

                            @if (!$post->deleted_at)
                                <form  style="display: inline;" method="POST" action="{{ route("posts.destroy", ["post" => $post]) }}">
                                    @csrf
                                    @method("DELETE")            
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @else
                                <form  style="display: inline;" method="POST" action="{{ route("posts.restore", ["id" => $post->id]) }}">
                                    @csrf
                                    @method("PATCH")            
                                    <button class="btn btn-success" type="submit">Restore</button>
                                </form>                               
                            @endif
                           
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


