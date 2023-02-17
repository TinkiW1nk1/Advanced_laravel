<html>
<head>
    <title>New Category</title>
</head>
<body>
<h1>Add new Category</h1>
<form action="\Category\new" method="post">
    @csrf
    <label>name</label><br>
    <input type="text" name="name"><br>
    <input type="submit" value="send">
</form>
</body>
</html>
