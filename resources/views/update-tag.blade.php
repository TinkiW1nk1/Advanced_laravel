<html>
<head>
    <title>Update Category</title>
</head>
<body>
<h1>update Category</h1>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
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
