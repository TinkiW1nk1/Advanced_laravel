<html>
<head>
    <title>New Category</title>
</head>
<body>
<h1>Add new Category</h1>
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
<form action="\Category\new" method="post">
    @csrf
    <label>name</label><br>
    <input type="text" name="name"><br>
    <input type="submit" value="send">
</form>
</body>
</html>
