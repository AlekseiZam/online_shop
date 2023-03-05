<?php $__env->startSection('title'); ?>Регистрация<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('html'); ?>


    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <p>Ошибка регистрации</p>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="tab" href="#pills-login" >Авторизация</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="tab" href="#pills-register" >Регистрация</a>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
        <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <!-- Auth form -->
            <form>
                <?php echo csrf_field(); ?>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Эл. почта</label>
                    <input type="email" id="loginName" class="form-control" value="<?php echo e(old('loginName')); ?>" required>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginPassword">Пароль</label>
                    <input type="password" id="loginPassword" class="form-control" required>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Войти</button>
            </form>
        </div>

        <!-- Reg form -->
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form action="<?php echo e(route('check_reg')); ?>" method="post" oninput='rep_pass.setCustomValidity(rep_pass.value != pass.value ? "Пароли не совпадают" : "")'>
                <?php echo csrf_field(); ?>
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Имя</label>
                    <input  <?php if($errors->has('name')): ?> style="color: #de2329;"  <?php endif; ?> type="text" id="name" name="name" class="form-control" value="<?php echo e(old('name')); ?>" required>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input  <?php if($errors->has('email')): ?> style="color: #de2329;"  <?php endif; ?> type="email" id="email" name="email" class="form-control" placeholder="example@example.com"  value="<?php echo e(old('email')); ?>" required>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="pass">Пароль</label>
                    <input type="password" id="pass" minlength="8" name="pass" class="form-control" required>
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="rep_pass">Повторите пароль</label>
                    <input type="password" id="rep_pass" name="rep_pass" class="form-control" required>
                </div>

                <!-- Phone input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="phone">Телефон</label>
                    <input <?php if($errors->has('phone')): ?> style="color: #de2329;"  <?php endif; ?> type="number" id="phone" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>" placeholder="+7xxxxxxxx" required>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-3">Регистрация</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Utilities\OSPanel\domains\localhost\online_shop\resources\views/auth_form.blade.php ENDPATH**/ ?>