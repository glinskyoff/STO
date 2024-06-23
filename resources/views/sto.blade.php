@extends('layouts.app')

@section('content')
    <script>
        var getCarModelsUrl = "{{ route('orders.carmodels', '') }}";
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{url('js/script.js')}}"></script>
    <style>
        body {
            background-color: #1A1A1A; /* Темный фон */
            color: #fff;

        }

        .section-title {
            color: #007bff; /* Синий цвет заголовка */
        }

        .card {
            background-color: #1c1c1c; /* Темный фон карточек */
        }

        .card-title, .card-text {
            color: #fff;
        }

        .card-img-overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Полупрозрачный черный фон для текста поверх изображения */
        }


        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
    </style>
    <div class="form-container" style="background-image: url('/public/img/11.png'); background-size: 100% 100%">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand text-light fs-3 " style="font-family:" href="{{ url('/') }}">
                    DROM MOTORS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto  " style="opacity: 0.65">

                        <li class=" me-4 nav-item text-light">
                            Чем мы занимаемся?
                        </li>
                        <li class=" me-4 nav-item text-light">
                            Наши специальности
                        </li>
                        <li class="me-4 nav-item text-light">
                            Контакты
                        </li>
                    </ul>
                    <ul class="nav">@if(!Auth::check()|| !Auth::user()->isAdmin())
                        @else

                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    admin
                                </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-dark" href="{{ route('admin') }}">
                                    Просмотр заявок
                                </a>

                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <h1 style="font-family:'Malgun Gothic'; font-weight: bolder; margin-left: 4%">Оставьте <span style="color: #007bff;">заявку</span> и мы вам перезвоним <br> течении <span style="color: #007bff;">5 минут</span></h1>
                <div class="col-md-7">

                    <div class="col-md-9 offset-md-1">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('orders.store') }}" method="POST" class="form-container">
                            @csrf
                            <div class="row mt-3 mb-3">
                                <label for="name" class="form-label mt-3 mb-4 fs-4" style="font-weight: bold">Введите данные о себе</label>
                                <div class="col">
                                    <input type="text" class="form-control text-light border-0" id="name" name="name" required
                                           style="background-color: #131313; width: 316px" placeholder="Имя">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control text-light border-0" id="surname" name="surname" required
                                           style="background-color: #131313; width: 316px" placeholder="Фамилия">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control text-light border-0" id="name" name="name" required
                                           style="background-color: #131313; width: 316px" placeholder="Отчество">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control text-light border-0" id="phone" name="phone" required
                                           style="background-color: #131313; width: 316px" placeholder="Номер телефона">
                                </div>
                                <div class="row mb-3 mt-4">
                                    <label for="brandmodel" class="form-label mt-1 mb-3 fs-4 " style="font-weight: bold">Введите данные авто</label>
                                    <div class="col mt-2">
                                        <select class="form-select text-light border-0" id="brandmodel" name="brandmodel_id" required
                                                style="background-color: #131313">
                                            <option value="" selected disabled>Выберите марку</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mt-2">
                                        <select class="form-select  text-light border-0 " id="carmodel" name="carmodel_id" required
                                                style="background-color: #131313; margin-left: 15px">
                                            <option value="" selected disabled>Выберите модель</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="date" class="form-label mt-1 mb-3 fs-4 " style="font-weight: bold">Выберите СТО и тип работ</label>
                            <div class="row mb-3">
                                <div class="col">
                                    <select class="form-select text-light border-0" id="station" name="station_id" required
                                            style="background-color: #131313">
                                        <option value="" selected disabled>Выберите адрес</option>
                                        @foreach($stations as $station)
                                            <option value="{{ $station->id }}">{{ $station->address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select text-light border-0" id="service" name="service_id" required
                                            style="background-color: #131313">
                                        <option value="" selected disabled>Выберите тип работ</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col mt-3">
                                    <input type="date" class="form-control text-light border-0" id="date" name="date" required
                                           style="background-color: #131313">
                                </div>
                                <div class="col mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Оставить заявку</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 mb-3" style="margin-top: 6%">
                    <img src="/public/img/15.png" alt="Map" class="img-fluid">
                </div>
            </div>
        </div>

        </div>

    </div>

    <div class="container mt-5 ">
        <!-- Услуги -->
        <div class="mb-5" >
            <h2 class="section-title fs-1 mb-5" style="color: #007bff;font-family:'Malgun Gothic'; font-weight: bolder;">Услуги</h2>
            <img src='/public/img/18.png' width="100%" height="100%">
            </div>
        </div>

        <!-- Специалисты -->
        <div class="container mb-3">
            <h2 class="section-title fs-1 mb-5" style="color:#007bff;font-family:'Malgun Gothic'; font-weight: bolder;">Специалисты</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card" style="background-color: #1c1c1c; ">
                        <div class="card-body">
                            <img src='/public/img/20.jpg' style="width: 100%; height: 100%">
                            <p class="card-text fs-4 " style="font-weight: bold">Павлов Константин</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: #1c1c1c; ">
                        <div class="card-body">
                            <img src='/public/img/21.jpg' style="width: 100%; height: 100%">
                            <p class="card-text fs-4"  style="font-weight: bold">Петров Данил</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: #1c1c1c; ">
                        <div class="card-body">
                            <img src='/public/img/22.jpg' style="width: 100%; height: 100%">
                            <p class="card-text fs-4"  style="font-weight: bold">Самусев Алексей</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: #1c1c1c; ">
                        <div class="card-body">
                            <img src='/public/img/23.jpg' style="width: 100%; height: 100%">
                            <p class="card-text fs-4"  style="font-weight: bold">Белов Владимир</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
