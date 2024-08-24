<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <h1>Edit User</h1>
        <div class="container mt-5">
        <form action="../update" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($data['name']); ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo e($data['email']); ?>">
            </div>      

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo e($data['password']); ?>">
            </div>      
            <input type="hidden" value="<?php echo e($data['id']); ?>" name="id">
            <input type="submit" class="btn btn-primary" value="Update User">
        </form>
    </body>
</html><?php /**PATH C:\laragon\www\pro_mvc\src\views/edit_user.blade.php ENDPATH**/ ?>