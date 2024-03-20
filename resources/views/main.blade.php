@extends('layouts.base')

@section('title')Главная@endsection

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
            <div class="col-md-8 col-sm-8 col-9 py-5 gx-5 text-center" style="background-color: #d7d7d7">
                <div class="row gy-5">
                        <div class="ref col-xl-4 col-md-6">
                            <a href="{{route('videocards')}}">
                                <div class="img-fluid">
                                    <img src="{{URL('images/videocards.jpg')}}">
                                    <p style="color: black; margin-top: 10px;">Видеокарты</p>
                                </div>
                            </a>
                        </div>

                    <div class="ref col-xl-4 col-md-6">
                        <a href="#">
                            <div class="img-fluid">
                                <img src="{{URL('images/RAM.jpg')}}">
                                <p>Оперативная память</p>
                            </div>
                        </a>
                    </div>

                    <div class="ref col-xl-4 col-md-6">
                        <a href="#">
                            <div class="img-fluid">
                                <img src="{{URL('images/CPU.png')}}">
                                <p>Процессоры</p>
                            </div>
                        </a>
                    </div>

                    <div class="ref col-xl-4 col-md-6">
                        <a href="#">
                            <div class="img-fluid">
                                <img src="{{URL('images/motherboards.jpg')}}">
                                <p>Материнские платы</p>
                            </div>
                        </a>
                    </div>

                    <div class="ref col-xl-4 col-md-6">
                        <a href="#">
                            <div class="img-fluid" >
                                <img src="{{URL('images/coolers.jpg')}}">
                                <p>Кулеры</p>
                            </div>
                        </a>
                    </div>

                    <div class="ref col-xl-4 col-md-6">
                        <a href="#">
                            <div class="img-fluid">
                                <img src="{{URL('images/bp.png')}}">
                                <p>Блоки питания</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-3 text-bg-dark">
                @include('inc.rside')
            </div>
        </div>
    </div>

@endsection
