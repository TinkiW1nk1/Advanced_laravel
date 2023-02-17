<html>
<head>
    <title>New Tag</title>
</head>
<body>
<h1>Add new Tag</h1>
<form action="\Tag\new" method="post">
    @csrf
    <label>name</label><br>
    <input type="text" name="name"><br>
    <input type="submit" value="send">
</form>
</body>
</html>
