    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old("title", $post["Title"] ?? null ) }} ">
    </div>

    <div class="mb-3">
      <label for="content" class="form-label">Content</label>
      <textarea  type="text"   class="form-control" id="content" name="content" rows="3">{{old("content", $post["Content"] ?? null ) }}</textarea>

    @if ( $errors->any() )
    <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul> 
    @endif