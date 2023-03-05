@extends('layouts.base')

@section('title')Регистрация@endsection

@section('html')
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
             <div class="col-6 gy-5">
                @if ($errors->any())
                    <div class="alert alert-danger gy-2">
                        <p>Ошибка регистрации</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('err'))
                    <div class="alert alert-danger gy-2">
                        <li>{{ session('err') }}</li>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">
                        <li>{{ session('success') }}</li>
                    </div>
                @endif
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="tab-login" data-bs-toggle="tab" href="#pills-login" role="tab"
                           aria-controls="pills-login">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if ($errors->has('email') or $errors->has('phone') or session('err')) active @endif" id="tab-register" data-bs-toggle="tab" href="#pills-register" role="tab"
                           aria-controls="pills-register">Регистрация</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <!-- Auth form -->
                        <form>
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Эл. почта</label>
                                <input type="email" id="loginName" class="form-control" value="{{ old('loginName') }}" required>
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
                    <div class="tab-pane fade  @if ($errors->has('email') or $errors->has('phone') or session('err')) active show @endif"" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form action="{{ route('check_reg') }}" method="post" oninput='rep_pass.setCustomValidity(rep_pass.value != pass.value ? "Пароли не совпадают" : "")'>
                            @csrf
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Имя</label>
                                <input  @if ($errors->has('name')) style="color: #de2329;"  @endif type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input  @if ($errors->has('email')) style="color: #de2329;"  @endif type="email" id="email" name="email" class="form-control" placeholder="example@example.com"  value="{{ old('email') }}" required>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="pass">Пароль</label>
                                <input type="password" id="pass" minlength="6" name="pass" class="form-control" required>
                            </div>

                            <!-- Repeat Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="rep_pass">Повторите пароль</label>
                                <input type="password" id="rep_pass" name="rep_pass" class="form-control" required>
                            </div>

                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="phone">Телефон</label>
                                <input @if ($errors->has('phone')) style="color: #de2329;"  @endif type="number" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="8xxxxxxxx" required>
                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-3">Регистрация</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
