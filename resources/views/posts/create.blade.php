@extends("layout")

@section('content')

<h2> Add Posts : </h2>
<form method="POST" action="{{ route("posts.store") }}">

    @csrf
    <div>
        <label for="title">Title: </Title></label>
        <input name="title" id="tilte" type="text" value="{{ old("title") }} ">
    </div>

    <div>
        <label for="content">Content: </Title></label>
        <input name="content" id="content" type="text" value="{{ old("content") }} " >
    </div>

    <button type="submit">Add</button>

    @if ( $errors->any() )
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul> 
    @endif


</form>
    
@endsection