<html>
<head>
    <title>New Category</title>
</head>
<body>
<h1>Add new Post</h1>
@include('components.massage')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="\Post\new" method="post">
    @csrf
    <label>name</label><br>
    <input type="text" name="name"><br>
    <input type="text" name="text"><br>
    <label><h3>Category</h3></label>
    @foreach($categories as $category)
        <label for="categories">{{$category['name']}}</label>
        <input type="checkbox" value="{{$category['id']}}" name="category"><br>
    @endforeach
    <label><h3>Tag</h3></label>
    @foreach($tags as $tag)
        <label for="tag">{{$tag['name']}}</label>
        <input type="checkbox" name="tag" value="{{$tag['id']}}"><br>
    @endforeach

    <input type="submit" value="send">

</form>
</body>
</html>
