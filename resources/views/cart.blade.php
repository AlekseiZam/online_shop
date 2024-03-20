@extends('layouts.base')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('links')
    @vite('resources/css/cart.css')
@endsection

@section('title')Корзина@endsection

@section('head')
    <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
    <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
@endsection
@section('html')

    <div class="container-fluid">
        <div class="row block min-vh-100">
            <div class="col-md-2 col-sm-12 col-12 p-3 text-bg-dark">
                @include('inc.lside')
            </div>
            <div class="col-md-9 col-sm-8 col-8 gy-5 text-center">

                <div class="container mb-1">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div class="row bg-white border rounded mb-3">
                                <ol class="breadcrumb float-sm-left">
                                    <li class="breadcrumb-item active"><a href="{{route('main')}}">Главная</a> - Корзина</li>
                                </ol>
                            </div>
                            <section class="h-100 h-custom" style="background-color: #d2c9ff;">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12">
                                            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                                <div class="card-body p-0">
                                                    <div class="row g-0">
                                                        <div class="col-lg-8">
                                                            <div class="p-5">
                                                                <div class="d-flex justify-content-between align-items-start mb-5">
                                                                    <h3 class="fw-bold mb-0 text-black">Корзина</h3>
                                                                    <button class="btn btn-danger">Очистить</button>
                                                                </div>

                                                                <hr class="my-4">
                                                                @if(\Cart::session(session()->get('user_id'))->getTotalQuantity() === 0)
                                                                    <h5>Пусто</h5>
                                                                @endif

                                                                @foreach($cart as $good)
                                                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                                        <div class="col-md-2 col-lg-2 col-xl-3">
                                                                            <img src="{{ URL::asset('storage/'.$good->attributes['img']) }}" class="img-fluid rounded-3">
                                                                        </div>
                                                                        <div class="col-md-3 col-lg-3 col-xl-5">
                                                                            <h6 class="text-black mb-0">@if(isset($good->attributes['brand'])){{$good->attributes['brand']}} @endif
                                                                                @if(isset($good->attributes['manufacturer'])){{$good->attributes['manufacturer']}} @endif
                                                                                {{$good->name}}</h6>
                                                                        </div>
                                                                        <div class="col-md-1 col-lg-1 col-xl-1">
                                                                            <h6 class="mb-0">{{$good->quantity}} шт.</h6>
                                                                        </div>
                                                                        <div class="col-md-3 col-lg-3 col-xl-2">
                                                                            <h6 class="mb-0">{{$good->price}} руб.</h6>
                                                                        </div>
                                                                        <div class="col-md-1 col-lg-1 col-xl-1 text-center">
                                                                            <button class="btn btn-danger btn-sm mb-2" value="{{$good->id}}"><i class="bi bi-x-circle"></i></button>
                                                                        </div>
                                                                    </div>

                                                                    <hr class="my-4">
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 bg-dark">
                                                            <div class="p-4 text-center text-bg-dark">
                                                                <div class="mb-5">
                                                                    <h6>Товары: {{\Cart::session(session()->get('user_id'))->getTotalQuantity()}}</h6>
                                                                </div>

                                                                <div class="mb-5">
                                                                    <h6 class="text-uppercase ">Стоимость</h6>
                                                                    <h5>{{\Cart::session(session()->get('user_id'))->getTotal()}} руб.</h5>
                                                                </div>

                                                                <a @if(\Cart::session(session()->get('user_id'))->getTotal() != 0) href="{{route('toOrder')}}" @endif>
                                                                    <button @if(\Cart::session(session()->get('user_id'))->getTotal() == 0) disabled @endif type="button" class="btn btn-success btn-block ">Оформить</button>
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.btn-danger').click( function (event){
                let id = $(this).attr("value")

                $.ajax({
                    type: "POST",
                    url: "{{route('delGood')}}",
                    data :{
                        id: id,
                    },

                    complete: function() {
                        window.location.href = '/main/cart';
                    }
                })
            })
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
@endsection

