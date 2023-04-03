@extends('layouts.base')

@section('title')Главная@endsection

@section('head')
    <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
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
            <div class="col-md-8 col-sm-8 col-9 gy-5 text-center">

                <div class="container mt-5 mb-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div class="row p-2 bg-white border rounded">
                                <div class="col-md-3 mt-1">Картинка</div>
                                <div class="col-md-6 mt-1">
                                    <h5>NVIDIA MSI RTX 3060</h5>
                                    <div class="text-start">
                                        <a class="btn btn-light" data-bs-toggle="collapse" href="#attributes" role="button" aria-expanded="false" aria-controls="attributes">
                                            Характеристики
                                        </a>
                                        <div class="collapse" id="attributes">
                                                <ul>
                                                    <li>Характеристика 1</li>
                                                    <li>Характеристика 2</li>
                                                    <li>Характеристика 3</li>
                                                    <li>Характеристика 4</li>
                                                    <li>Характеристика 4</li>
                                                    <li>Характеристика 4</li>
                                                    <li>Характеристика 4</li>
                                                    <li>Характеристика 4</li>
                                                    <li>Характеристика 4</li>
                                                    <li>Характеристика 4</li>
                                                </ul>
                                        </div>
                                    </div>


                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row justify-content-center">
                                        <h4 class="text">$13.99</h4>
                                    </div>
                                    <h6 class="text-success">В наличии</h6>
                                    <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm" type="button">Details</button><button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button></div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-2 col-sm-4 col-3 text-bg-dark">
                @include('inc.rside')
            </div>
        </div>
    </div>
@endsection

