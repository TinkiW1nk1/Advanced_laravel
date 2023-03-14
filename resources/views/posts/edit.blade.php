<html>
<head>
    <title>Update Category</title>
</head>
<body>
<h1>update Category</h1>
<form action="\posts\{{$post->id}}\update" method="post">
    @csrf
    @method('patch')
        <input type="hidden" name="id" value="{{$post->id}}"><br>
        <label>name</label><br>
        <input type="text" name="name" placeholder="{{$post->name}}"><br>
        <label>text</label><br>
        <input type="text" name="text" placeholder="{{$post->text}}"><br>
        <label>category</label><br>
        <input type="text" name="category" placeholder="{{$post->category}}"><br>
        <label>tag</label><br>
        <input type="text" name="tag" placeholder="{{$post->tag}}"><br>
        <input type="submit" value="send">


</form>
</body>
</html>
