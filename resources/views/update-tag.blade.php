<html>
<head>
    <title>Update Category</title>
</head>
<body>
<h1>update Category</h1>
<form action="\Tag\update" method="post">
    @csrf
    @if(!empty($_GET))
        <input type="hidden" name="id" value="{{$id}}"><br>
        <label>name</label><br>
        <input type="text" name="name" placeholder="{{$name}}"><br>
        <input type="submit" value="send">
    @endif

</form>
</body>
</html>
