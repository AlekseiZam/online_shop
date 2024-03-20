@php
    $issue = \App\Models\IssuePoint::all();
    $payment = \App\Models\MethodPayment::all();
@endphp

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <title>Оформление заказа</title>
        @vite('resources/css/app.css')
    </head>
    <body style="background-color: #d7d7d7" >
        <div class="container-fluid">
            <div class="row block min-vh-100 justify-content-center">
                <div class="row col-lg-10 gy-3 gx-5">
                    <div class="col-md-6 col-sm-9 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Ваша корзина</span>
                            <span class="badge bg-primary rounded-pill">{{\Cart::session(session()->get('user_id'))->getTotalQuantity()}}</span>
                        </h4>
                        @foreach($cart as $good)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <h6 class="my-0">@if(isset($good->attributes['brand'])){{$good->attributes['brand']}} @endif
                                        @if(isset($good->attributes['manufacturer'])){{$good->attributes['manufacturer']}} @endif
                                        {{$good->name}} - {{$good->quantity}} шт.
                                    </h6>
                                    <span class="text-muted">{{$good->price*$good->quantity}}₽</span>
                                </li>
                                @endforeach
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Всего (РУБ)</span>
                                <strong>{{\Cart::session(session()->get('user_id'))->getTotal()}} ₽</strong>
                            </li>
                        </ul>
                    </div>

                    <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                        <h4 class="mb-3">Оформление заказа</h4>
                        <form action="{{route('make_order')}}" method="POST" class="needs-validation mb-5" novalidate="">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="firstName" class="form-label">Имя получателя</label>
                                    <input type="text" name="name" class="form-control" id="firstName" placeholder="" value="" required="">
                                    <div class="invalid-feedback">
                                        Действительное имя обязательно.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Эл. адрес</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="{{session()->get('email')}}">
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите действующий адрес электронной почты для получения информации о доставке.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="issue_point">Место получения</label>
                                    <select class="form-select" id="point_id" name="point_id" >
                                        @foreach($issue as $point)
                                            <option @if($point->id == 1) selected @endif value="{{$point->id}}">
                                                {{$point->address}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="my-4">
                            <h4 class="mb-3">Способ оплаты</h4>

                            <div class="my-3">
                                @foreach($payment as $pm)
                                    <div class="form-check">
                                        <input id="credit" name="payment_id" value="{{$pm->id}}" type="radio" class="form-check-input" @if($pm->id == 1) checked @endif required="">
                                        <label class="form-check-label" for="credit">{{$pm->name}}</label>
                                    </div>
                                @endforeach
                            </div>

                            <hr class="my-4">
                            <a class="w-45 btn btn-secondary" href="{{route('toCart')}}">Назад</a>
                            <button class="w-10 btn btn-primary" type="submit">Оформить</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
