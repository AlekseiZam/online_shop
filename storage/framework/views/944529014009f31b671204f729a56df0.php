<div class="position-fixed start-0 col-md-2 col-sm-12 col-12 p-3">
        <div class="small" style=" overflow: hidden;
  text-overflow: ellipsis;"><?php echo e(session()->get('email')); ?></div>
        <hr>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item text-white">
                <a href="#" class="nav-link active" aria-current="page">
                    Главная
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Корзина
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Заказы
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('exit')); ?>" class="nav-link text-white">
                    Выход
                </a>
            </li>
        </ul>
</div>
<?php /**PATH D:\Utilities\OSPanel\domains\localhost\online_shop\resources\views/inc/lside.blade.php ENDPATH**/ ?>