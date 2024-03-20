@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item active"><a href="{{route('index')}}">Главная</a> - Сотрудники</li>
                    </ol>
                    <div class="card-header">
                        <a href="{{route('index')}}" class="btn btn-secondary mr-3">Назад</a>
                        <a href="{{route('employess.create')}}" class="btn btn-primary">Создать</a>
                    </div>
                    <div class="card-header" style="width: 250px;">
                        <form action="{{route('employess.index')}}" method="GET">
                            <input type="text" class="form-control" name="name">
                            <button class="btn btn-primary mt-1" type="submit">Поиск</button>
                        </form>
                    </div>


                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap text-left">
                            <thead class="text-left">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Уровень доступа</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Отчество</th>
                                <th scope="col">Серия паспорта</th>
                                <th scope="col">Номер паспорта</th>
                                <th scope="col">Эл. почта</th>
                                <th scope="col">Телефон</th>
                                <th scope="col">Дата рождения</th>
                                <th scope="col">Дата устройства</th>
                            </tr>
                            </thead>
                            <tbody class="text-left">
                            @foreach($employess as $employee)
                                @if($employee->user['access_id'] > 1 or is_null($employee->user['access_id']))
                                <tr>
                                    <td>
                                        <form action="{{route('employess.destroy', $employee->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td><a href="{{route('employess.edit', $employee->id)}}">{{$employee->id}}</a></td>
                                    <td>{{$employee->user->access['name']}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->middle_name}}</td>
                                    <td>{{$employee->passport_series}}</td>
                                    <td>{{$employee->passport_number}}</td>
                                    <td>{{$employee->user['email']}}</td>
                                    <td>{{$employee->user['phone']}}</td>
                                    <td>{{$employee->date_of_birthday}}</td>
                                    <td>{{$employee->date_of_employment}}</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $employess->withQueryString()->links() }}
        </div>
    </div>
@endsection
