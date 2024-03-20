<div class="position-fixed start-0 col-md-2 col-sm-12 col-12 p-3">
        <div class="small" style=" overflow: hidden;
  text-overflow: ellipsis;"><?php echo e(session()->get('email')); ?></div>
        <hr>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item text-white">
                <a href="<?php echo e(route('main')); ?>" class="nav-link text-white" aria-current="page">
                    Главная
                </a>
            </li>
            <?php if(session()->get('id_access') > 1): ?>
                <li>
                    <a href='<?php echo e(route('index')); ?>' class="nav-link text-white">
                        Управление
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?php echo e(route('toCart')); ?>" class="nav-link text-white">
                    Корзина (<span class="cart_qty"><?php echo e(\Cart::session(session()->get('user_id'))->getTotalQuantity()); ?></span>)
                </a>

            </li>
            <li>
                <a href="<?php echo e(route('order_list')); ?>" class="nav-link text-white">
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