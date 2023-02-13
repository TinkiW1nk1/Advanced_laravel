<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Categories</title>
</head>
<body>
<h1>All Tags</h1>
<table>
    <th>id</th>
    <th>name</th>
    <th>updated_at</th>
    <th>created_at</th>
    <th>update</th>
    <th>delete</th>
    </tr>
    @foreach( $tags as $row )
        <tr>
            @foreach( $row as $item => $value )
                    <?php
                    if( $item == 'id' ){
                        $id = $value;
                    }
                    ?>
                <td>{{$value}}</td>
            @endforeach
            <td><a href="\Tag\update?id={{$id}}">Update</a></td>
            <td><a href="\Tag\delete?id={{$id}}">Delete</a></td>
            <td></td>
        </tr>
    @endforeach
</table>
</body>
</html>
