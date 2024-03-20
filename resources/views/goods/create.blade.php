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
                        <a href="{{route('goods.index')}}" class="btn btn-primary">Назад</a>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-4 col-sm-6">

                                @if(session('mess'))
                                    <div class="alert alert-danger">
                                        <span>{{ session('mess') }}</span>
                                    </div>
                                @endif

                                <form action="{{ route('create2') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="category_id">*Категория</label>
                                        <select class="form-select" id="category_id" name="category_id" >
                                            @foreach($categories as $category)
                                                <option @if(old('category_id') === $category->id) selected @endif value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">*Модель</label>
                                        <input type="text" id="name" name="name" class="form-control"  value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="price">*Цена</label>
                                        <input type="text" @error('price')style="color: red" @enderror id="price" name="price" class="form-control"  value="{{ old('price') }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="count">*Кол-во</label>
                                        <input type="text" @error('count')style="color: red" @enderror id="count" name="count" class="form-control"  value="{{ old('count') }}" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-3">Далее</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection

