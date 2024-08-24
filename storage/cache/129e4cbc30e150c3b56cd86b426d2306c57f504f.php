<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Product</h1>
        <form action="../update" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($data['price']); ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars($data['description']); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="img" name="img">
                <?php if (!empty($data['img'])): ?>
                    <img src="../uploads/<?php echo htmlspecialchars($data['img']); ?>" alt="Current Image" class="mt-2" style="max-width: 200px;">
                <?php else: ?>
                    <p>No image available</p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="text" class="form-control" id="category_id" name="category_id" value="<?php echo htmlspecialchars($data['category_id']); ?>">
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo htmlspecialchars($data['user_id']); ?>">
            </div>

            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\pro_mvc\src\views/edit_pro.blade.php ENDPATH**/ ?>