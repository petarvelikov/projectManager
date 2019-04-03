@extends('layout')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3 text-center">Мениджър на проекти</h1>
        <br>
        <hr class="my-4">
        <br>
        <h2 class="lead text-warning text-center" style="font-size: 24px; font-weight: bold;">Това е тестово приложение.</h2>
        @guest
            <h3 class="text-info text-center">За повече информация влезте в системата.</h3>
        @endguest
    </div>

@endsection
