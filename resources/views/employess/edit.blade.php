@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a> - <a href="{{route('employess.index')}}">Сотрудники</a> - Изменить</li>
                    </ol>
                    <div class="card-header">
                        <a href="{{route('employess.index')}}" class="btn btn-primary">Назад</a>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <form action="{{route('employess.update', $employee['id'])}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="access_id">Уровень доступа</label>
                                        <select class="form-select" id="access_id" name="access_id" >
                                            @foreach($accesses as $acc)
                                                <option
                                                    {{ $acc->id === $user->access_id ? ' selected' : ''}}
                                                    value="{{$acc->id}}">{{$acc->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="last_name">Фамилия</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $employee['last_name'] }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="first_name">Имя</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $employee['first_name'] }}" required>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="middle_name">Отчество</label>
                                        <input type="text" id="middle_name" name="middle_name" class="form-control"  value="{{ $employee['middle_name'] }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="passport_series">Серия паспорта</label>
                                        <input type="text" id="passport_series" name="passport_series" class="form-control" value="{{ $employee['passport_series'] }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="passport_number">Номер паспорта</label>
                                        <input type="text" id="passport_number" name="passport_number" class="form-control" value="{{ $employee['passport_number'] }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">"Эл. почта"</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $user['email'] }}">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone">Телефон</label>
                                        <input type="number" id="phone" name="phone" class="form-control" value="{{ $user['phone'] }}">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="date_of_birthday">Дата рождения</label>
                                        <input type="date" id="date_of_birthday" name="date_of_birthday" class="form-control" value="{{ $employee['date_of_birthday'] }}" required>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="date_of_employment">Дата устройства</label>
                                        <input type="date" id="date_of_employment" name="date_of_employment" class="form-control" value="{{ $employee['date_of_employment'] }}" required>
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
