@extends("layout")

@section('content')

<h2> Add Posts : </h2>
<form method="POST" action="{{ route("posts.store") }}">

    @csrf
    <div>
        <label for="title">Title: </Title></label>
        <input name="title" id="tilte" type="text">
    </div>

    <div>
        <label for="content">Content: </Title></label>
        <input name="content" id="content" type="text">
    </div>

    <button type="submit">Add</button>


</form>
    
@endsection