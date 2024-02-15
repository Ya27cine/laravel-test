@extends("layouts.app")

@section('content')

<h2> Edit Posts : </h2>
<form method="POST" action="{{ route("posts.update", ["post" => $post]) }}">
    @csrf
    @method("PUT")

     @include('posts.form')

    <div class="d-grid mt-2">
        <button class="btn btn-danger btn-block" type="submit">Edit</button>
    </div>
</form>
    
@endsection