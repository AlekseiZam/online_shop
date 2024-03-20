@extends('layouts.base')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')Видеокарты@endsection

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
                @section('rside')
                    <h5><strong>Фильтры</strong></h5>
                    <div class="col-12">
                        <label class="form-label" for="category_id">Бренды</label>
                        @foreach($brands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$brand->id}}" id="brand{{$brand->id}}">
                            <label class="form-check-label" for="brand{{$brand->id}}">
                                {{$brand->name}}
                            </label>
                            <sup>{{\App\Models\Good::where('brand_id', $brand->id)->count()}}</sup>
                        </div>
                        @endforeach
                        <hr style="width: 80%">
                        <label class="form-label" for="category_id">Производители</label>
                        @foreach($manufacturers as $manufacturer)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$manufacturer->id}}" id="manufacturer{{$brand->id}}">
                                <label class="form-check-label" for="manufacturer{{$manufacturer->id}}">
                                    {{$manufacturer->name}}
                                </label>
                                <sup>{{\App\Models\Good::where('manufacturer_id', $manufacturer->id)->count()}}</sup>
                            </div>
                        @endforeach
                        <hr style="width: 80%">

                        <label class="form-check-label">Цена, руб.</label>
                        <div class="p-2 form-input">
                            <div class="row col-10">
                                мин.
                                <input class="form-control-sm" type="text" value="{{$products->min('price')}}">
                            </div>

                            <div class="row col-10">
                                макс.
                                <input class="form-control-sm" type="text" value="{{$products->max('price')}}">
                            </div>
                        </div>

                        <button class="btn btn-primary mt-2 ml-1" type="submit">Применить</button>
                        <a href="{{route('videocards')}}" class="btn btn-secondary mt-2">Сбросить</a>
                    </div>
                @endsection
            </div>

            <div class="col-md-8 col-sm-8 col-9 gy-5 text-center">
                <div class="container mt-1 mb-1">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div class="row bg-white border rounded mb-3">
                                <ol class="breadcrumb float-sm-left">
                                    <li class="breadcrumb-item active"><a href="{{route('main')}}">Главная</a> - Видеокарты</li>
                                </ol>
                                <form action="{{route('videocards')}}" method="GET">
                                        <div class="input-group" >
                                            <input type="text" class="form-control" placeholder="Поиск..." name="name" id="name" @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif">
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                                        </div>
                                </form>
                            </div>


                            @foreach($products as $good)
                                <div class="row bg-white border rounded mb-3">
                                    <div class="col-md-4 mt-1 mb-1">
                                        @if(!is_null($good->image))
                                                <img src="{{ URL::asset('storage/'.$good->image) }}" style="width: 90%; height: 200px">
                                        @else<img src="{{ URL::asset('storage/uploads/no_image.jpg') }}" style="width: 90%; height: 200px">@endif
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <h5>@if(isset($good->brand['name'])){{$good->brand['name']}} @endif
                                            @if(isset($good->manufacturer['name'])){{$good->manufacturer['name']}} @endif
                                            {{$good->name}}</h5>
                                        <div class="text-center">
                                            <h7>Характеристики</h7>
                                                <div class="text-start">
                                                    <a class="btn btn-light" data-bs-toggle="collapse" href="#attributes{{$good->id}}" role="button" aria-expanded="false" aria-controls="attributes">
                                                        Показать/скрыть
                                                    </a>
                                                    <div class="collapse" id="attributes{{$good->id}}">
                                                        @foreach($good->attributes as $attr)
                                                            @if(!is_null($attr->value))
                                                                <span>{{$attr->attribute['name']}}: {{$attr->value}} <br></span>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="align-items-end align-content-center col-md-2 border-left mt-1">
                                        <div class="d-flex flex-row justify-content-center">
                                            <h4 class="text">{{$good->price}} руб.</h4>
                                        </div>
                                        @if($good->count > 0)
                                            <h6 class="text-success text-center">В наличии</h6>
                                            <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn mb-2" value="{{$good->id}}"><i class="bi bi-bag-plus-fill"></i></button></div>
                                        @else  <h6 class="text-danger text-center">Нет в наличии</h6>
                                        @endif
                                    </div>
                                </div>

                            @endforeach
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-3 text-bg-dark">
                @include('inc.rside')
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function (){
            $('.btn-primary').click( function (event){
                let id = $(this).attr("value")
                let qty = 1

                let total_qty = parseInt($('.cart_qty').text())
                total_qty += qty
                $('.cart_qty').text(total_qty)

                $.ajax({
                    type: "POST",
                    url: "{{route('addToCart')}}",
                    data :{
                        id: id,
                        qty: qty,
                    },
                    success: (data) => {
                        console.log(data)
                    },

                    error: (data) => {
                        console.log(data)
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

