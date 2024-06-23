<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        .footer {
            background-color: #131313;
            color: #fff;
            padding: 20px 0;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer .address, .footer .contacts, .footer .info {
            margin-bottom: 20px;
        }
    </style>

</head>
<body>

        <main class=""  style="min-height: 75vh; background-color:#1c1c1c;">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 address" >
                        <h5>Адреса СТО:</h5>
                        <ul class="list-unstyled" style="opacity: 0.65">
                            <li>Ипподромная улица, 2А</li>
                            <li>Проспект Губкина, 2/3А</li>
                            <li>Адрес 3</li>
                            <li>Адрес 4</li>
                        </ul>
                    </div>
                    <div class="col-md-4 contacts">
                        <h5>Контакты</h5>
                        <p  style="opacity: 0.65">+7 (3812) 36-29-29</p>
                        <p  style="opacity: 0.65">08:00-20:00</p>
                    </div>
                    <div class="col-md-4 info">
                        <h5>DROM MOTORS</h5>
                        <p  style="opacity: 0.65">Вся текстовая и графическая информация на сайте защищена законом об авторском праве. При использовании любых материалов сайта ссылка обязательна.</p>
                        <p  style="opacity: 0.65">© «Дром Моторс» 2019-2024</p>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
