@extends("layout")

@section('content')

<h2> Edit Posts : </h2>
<form method="POST" action="{{ route("posts.update", ["post" => $post]) }}">
    @csrf
    @method("PUT")
    <div>
        <label for="title">Title: </Title></label>
        <input name="title" id="tilte" type="text" value="{{ old("title", $post["Title"]) }} ">
    </div>

    <div>
        <label for="content">Content: </Title></label>
        <input name="content" id="content" type="text" value="{{ old("content", $post["Content"]) }} " >
    </div>

    <button type="submit">Edit</button>

    @if ( $errors->any() )
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul> 
    @endif


</form>
    
@endsection