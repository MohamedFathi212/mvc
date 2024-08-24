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
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value=<?php echo e($cat['id']); ?>><?php echo e($cat['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="user_id" >
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value=<?php echo e($user['id']); ?>><?php echo e($user['name']); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <input type="submit" value="Save" class="btn btn-suc">
    </form>
</body>
</html>


<?php /**PATH C:\laragon\www\pro_mvc\src\views/create_pro.blade.php ENDPATH**/ ?>