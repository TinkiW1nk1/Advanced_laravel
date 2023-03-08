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

<form action="\posts" method="post">
    @csrf
    <label>name</label><br>
    <input type="text" name="name"><br>
    <label>text</label><br>
    <input type="text" name="text"><br>
    <label>Cat</label><br>
    <input type="text" name="category"><br>
    <label>tag</label><br>
    <input type="text" name="tag"><br>
    <input type="submit" value="send">

</form>
</body>
</html>
