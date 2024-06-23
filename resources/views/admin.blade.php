@extends('layouts.app')

@section('content')
    <a class="btn btn-primary mt-3 m-4" href="{{route('sto')}}">На главную</a>
    <div class="container" style="color: white">
        <h1>Orders</h1>
        <table class="table table-bordered" style="color: white">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Номер телефона</th>
                <th>Дата</th>
                <th>Марка авто</th>
                <th>Модель авто</th>
                <th>Услуга</th>
                <th>Станция СТО</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->surname }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->brandModel->name }}</td>
                    <td>{{ $order->carModel->name }}</td>
                    <td>{{ $order->service->name }}</td>
                    <td>{{ $order->station->address }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
