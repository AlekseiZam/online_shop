@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a> - <a href="{{route('employess.index')}}">Сотрудники</a> - Добавить</li>
                    </ol>
                    <div class="card-header">
                        <a href="{{route('index')}}" class="btn btn-primary">Назад</a>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-4 col-sm-6">


                                <form action="{{ route('employess.store') }}" method="post">
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="last_name">Фамилия</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="first_name">Имя</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control"  value="{{ old('first_name') }}" required>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="middle_name">Отчество</label>
                                        <input type="text" id="middle_name" name="middle_name" class="form-control" value="{{ old('middle_name') }}" required>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="passport_series">Серия паспорта</label>
                                        <input type="text" id="passport_series" name="passport_series" class="form-control" value="{{ old('passport_series') }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="passport_number">Номер паспорта</label>
                                        <input type="text" id="passport_number" name="passport_number" class="form-control" value="{{ old('passport_number') }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="date_of_birthday">Дата рождения</label>
                                        <input type="date" id="date_of_birthday" name="date_of_birthday" class="form-control" value="{{ old('date_of_birthday') }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="date_of_employment">Дата устройства</label>
                                        <input type="date" id="date_of_employment" name="date_of_employment" class="form-control" value="{{ old('date_of_employment') }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="user_id">ID пользователя</label>
                                        <input type="number" id="user_id" name="user_id" class="form-control" value="{{ old('user_id') }}">
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
