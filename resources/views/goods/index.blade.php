@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a> - Товары</li>
                    </ol>
                    <div class="card-header">
                        <a href="{{route('index')}}" class="btn btn-secondary mr-3">Назад</a>
                        <a href="{{route('goods.create')}}" class="btn btn-primary">Создать</a>
                    </div>
                    <div class="card-header" style="width: 500px" >
                        <h3>Фильтр</h3>

                            <form action="{{route('goods.index')}}" method="GET">
                                <div class="form-row">

                                    <div class="col-4">
                                        <label class="form-label" for="id">ID</label>
                                        <input type="text" class="form-control" name="id" id="id" @if(isset($_GET['id'])) value="{{$_GET['id']}}" @endif>
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="name">Модель</label>
                                        <input type="text" class="form-control" name="name" id="name" @if(isset($_GET['name'])) value="{{$_GET['name']}}" @endif">
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label" for="category_id">Категория</label>
                                        <select class="form-select" id="category_id" name="category_id" >
                                            <option value="">Не задано</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if(isset($_GET['category_id'])) @if($_GET['category_id'] == $category->id) selected @endif @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary mt-2 ml-1" type="submit">Применить</button>
                                </div>
                            </form>
                        <a href="{{route('goods.index')}}"><button style="width: 105px" class="btn btn-secondary mt-2">Очистить</button></a>
                    </div>


                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead class="text-center">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">#</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Модель</th>
                                <th scope="col" class="text-start">Аттрибуты</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Кол-во</th>
                                <th scope="col">Изображение</th>

                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($goods as $good)
                                <tr>
                                    <td>
                                        <form action="{{route('goods.destroy', $good->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td><a href="{{route('goods.edit', $good->id)}}">{{$good->id}}</a></td>
                                    <td>{{$good->category['name']}}</td>
                                    <td>@if(isset($good->brand['name'])){{$good->brand['name']}} @endif
                                        @if(isset($good->manufacturer['name'])){{$good->manufacturer['name']}} @endif
                                        {{$good->name}}</td>
                                    <td class="text-start">
                                        <button type="button" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#collapse{{$good->id}}" aria-expanded="false" aria-controls="collapseExample">
                                            Показать/Скрыть
                                        </button>
                                        <div class="collapse text-start" id="collapse{{$good->id}}">
                                            @foreach($good->attributes as $attr)
                                                    @if(!is_null($attr->value))
                                                    <span>
                                                        {{$attr->attribute['name']}}: {{$attr->value}} <br>
                                                    </span>
                                                    @endif
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{$good->price}}</td>
                                    <td>{{$good->count}}</td>
                                    <td>@if($good->image != 'uploads/no_image.jpg')
                                            <button type="button" class="btn btn-default" data-bs-toggle="collapse" data-bs-target="#image{{$good->id}}"
                                                    aria-expanded="false" aria-controls="imageExample">Показать/Скрыть</button>
                                            <div class="collapse" id="image{{$good->id}}">
                                               <img src="{{ URL::asset('storage/'.$good->image) }}" style="width: 150px; height: 150px">
                                            </div>
                                        @else Нет@endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $goods->withQueryString()->links() }}
        </div>
    </div>
@endsection
