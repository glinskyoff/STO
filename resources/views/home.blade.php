@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card " style="background-color: #131313">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="fs-3" style="color: white">{{ __('Вы авторизованы!') }}</p>
                    <a class="btn btn-primary" href="{{route('sto')}}">На главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
