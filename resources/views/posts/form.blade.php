<div>
    <label for="title">Title: </Title></label>
    <input name="title" id="tilte" type="text" value="{{ old("title", $post["Title"] ?? null ) }} ">
</div>

<div>
    <label for="content">Content: </Title></label>
    <input name="content" id="content" type="text" value="{{ old("content", $post["Content"] ?? null ) }} " >
</div>

@if ( $errors->any() )
<ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
</ul> 
@endif