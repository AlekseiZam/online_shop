@extends('layouts.base')
@section('links')
    @vite('resources/css/cart.css')
@endsection

@section('title')Заказы@endsection

@section('head')
    <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
    <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
    <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
@endsection
@section('html')
    <div class="container-fluid">
        <div class="row block min-vh-100" >
            <div class="col-md-2 col-sm-12 col-12 p-3 text-bg-dark">
                @include('inc.lside')
            </div>
            <div class="col-md-10 col-sm-8 col-8 gy-5 text-center">

                <div class="container mb-1">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-12">
                            <div class="row bg-white border rounded mb-3">
                                <ol class="breadcrumb float-sm-left">
                                    <li class="breadcrumb-item active"><a href="{{route('main')}}">Главная</a> - Заказы</li>
                                </ol>
                            </div>
                            <section class="h-100 h-custom">
                                <div class="container py-3 h-100">
                                    <h5 class="py-3"><strong>Заказы</strong></h5>
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-12">
                                            <div class="card-body">
                                                <table class="table table-bordered" style="background-color: white;">
                                                    <thead class="text-center table-primary">
                                                    <tr>
                                                        <th scope="col">№ заказа</th>
                                                        <th scope="col">Стоимость заказа</th>
                                                        <th scope="col">Дата заказа</th>
                                                        <th scope="col">Статус заказа</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{$order->order_id}}</td>
                                                            <td>{{$order->cost}}</td>
                                                            <td>{{$order->date}}</td>
                                                            <td>{{$order->status->name}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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

@endsection

