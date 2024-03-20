@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a> - <a href="{{route('goods.index')}}">Товары</a> - Изменить</li>
                    </ol>
                    <div class="card-header">
                        <a href="{{route('goods.index')}}" class="btn btn-primary">Назад</a>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-4 col-sm-6">

                                <form action="{{route('goods.update', $good['id'])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="brand_id">Бренд</label>
                                        <select class="form-select" id="brand_id" name="brand_id">
                                            <option value="">Не задано</option>
                                            @foreach($brands as $brand)
                                                <option @if($good['brand_id'] === $brand->id) selected @endif value="{{$brand->id}}">
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
                                                <option @if($good['manufacturer_id'] === $manufacturer->id) selected @endif value="{{$manufacturer->id}}">
                                                    {{$manufacturer->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="count">Кол-во</label>
                                        <input type="text" @error('count')style="color: red" @enderror id="count" name="count" class="form-control"  value="{{$good->count}}" required>
                                    </div>

                                    @foreach($attributes as $attribute)
                                        <div class="form-outline mb-4">
                                            <label class="form-label">{{$attribute->name}}</label>
                                            <input class="form-control" type="text" name="value[{{$attribute->id}}]"
                                                   @foreach($good->attributes as $attr)
                                                       @if($attribute->id === $attr->attribute_id)
                                                           value="{{$attr->value}}"@endif
                                                @endforeach
                                            >
                                        </div>
                                    @endforeach

                                    <div class="form-outline mb-4">
                                        <label for="formFile" class="form-label">Изображение</label>
                                        <img src="{{ URL::asset('storage/'.$good->image) }}"/>
                                        <input class="form-control" type="file" id="formFile" name="image" >
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-3">Изменить</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection

