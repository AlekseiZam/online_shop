@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a> - <a href="{{route('goods.index')}}">Товары</a> - Добавить</li>
                    </ol>
                    <div class="card-header">
                        <a href="{{route('goods.create')}}" class="btn btn-primary">Назад</a>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-4 col-sm-6">

                                <form action="{{ route('goods.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="brand_id">Бренд</label>
                                        <select class="form-select" id="brand_id" name="brand_id">
                                            <option value="">Не задано</option>
                                            @foreach($brands as $brand)
                                                <option @if(old('brand_id') === $brand->id) selected @endif value="{{$brand->id}}">
                                                    {{$brand->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="manufacturer_id">Производитель</label>
                                        <select class="form-select" id="manufacturer_id" name="manufacturer_id">
                                            <option value="">Не задано</option>
                                            @foreach($manufacturers as $manufacturer)
                                                <option @if(old('manufacturer_id') === $manufacturer->id) selected @endif value="{{$manufacturer->id}}">
                                                    {{$manufacturer->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @foreach($attributes as $attribute)
                                    <div class="form-outline mb-4">
                                        <label class="form-label">{{$attribute->name}}</label>
                                        <input class="form-control" type="text" name="value[{{$attribute->id}}]">
                                    </div>
                                    @endforeach
                                    @foreach($data as $key=>$value)
                                        <input hidden type="text" name="{{$key}}" value="{{$value}}">
                                    @endforeach

                                    <div class="form-outline mb-4">
                                        <label for="formFile" class="form-label">Изображение</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-3">Создать</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection

