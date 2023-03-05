<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>

    <header style="background-color: #a3a6a8; padding-left: 40px; padding-right: 40px;" class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <p  class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" width="40" height="32">
            <span class="fs-4">PC ONLINE-SHOP</span>
        </p>

        <ul class="nav nav-pills">
            <?php echo $__env->yieldContent('head'); ?>
        
        
        
        
        
        </ul>
    </header>
<body>
    <?php echo $__env->yieldContent('html'); ?>
</body>
</html>
<?php /**PATH G:\Utilities\OSPanel\domains\localhost\online_shop\resources\views/layouts/base.blade.php ENDPATH**/ ?>