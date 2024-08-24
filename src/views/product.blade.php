<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Product </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <a class="btn btn-info" href="create">Create New Product</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Img</th>
            <th>category_id</th>
            <th>user_id</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

        @foreach($product as $pro)
            <tr>
                <td>{{$pro['id']}}</td>
                <td>{{$pro['name']}}</td>
                <td>{{$pro['price']}}</td>
                <td>{{$pro['description']}}</td>
                <td>
                    <img src="../uploads/{{$pro['img']}}" width="100">
                </td>
                <td>{{$pro['category_id']}}</td>
                <td>{{$pro['user_id']}}</td>
                <td><a class="btn btn-success" href="edit/{{$pro['id']}}">Edit</a></td>
                <td><a class="btn btn-warning" href="delete/{{$pro['id']}}">Delete</a></td>

            </tr>
        @endforeach
    </table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>