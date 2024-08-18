<body>
<form action="../{{$articles->id}}" method="post">
    {{method_field('put')}}
    {{csrf_field()}}
    name: <input type="text" name="title" value="{{$articles->title}}">
    body: <textarea name="body" cols="30" rows="30">
    {{$articles->body}}
    </textarea>
    image: <img src="/images/{{$articles->image}}">
    <input type="submit">
</form>

enter comment:
<form action="../{{$articles->id}}/comments" method="post">
    {{csrf_field()}}
    name: <input type="text" name="author">
    body: <textarea name="body" cols="30" rows="30">
    </textarea>
    <input type="submit">
</form>
<select name="categories[]" multiple>

    @foreach($categories as $category)
    <option value="{{$category->id}}" @if($articles->hasCategory($category->id)) selected @endif>{{$category->title}}</option>
    @endforeach
</select>
<ul>
    comments:
    @foreach($articles->comments as $comment)
    <li>{{$comment->body}} , {{$comment->author}}</li>
    @endforeach
</ul>

<ul>
    categories:
    @foreach($articles->categories as $category)
    <li>{{$category->title}}</li>
    @endforeach
</ul>
</body>
