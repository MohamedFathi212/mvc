<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Create Product</h1>
    
    <form action="store" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" >
        <input type="number" name="price" placeholder="Price" >
        <textarea name="description" placeholder="Description" ></textarea>
        <input type="file" name="img" >

        <select name="category_id" >
            @foreach ($category as $cat)
            <option value={{ $cat['id'] }}>{{ $cat['name'] }}</option>
            @endforeach
        </select>

        <select name="user_id" >
            @foreach ($users as $user)
            <option value={{ $user['id'] }}>{{ $user['name'] }}</option>
            @endforeach
        </select>

        <input type="submit" value="Save" class="btn btn-suc">
    </form>
</body>
</html>


