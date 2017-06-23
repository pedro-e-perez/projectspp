@extends('layouts.app')

@section('title', 'Inicio')

@section('sidebar')
@parent

@endsection

@section('content')
<style>
    html, body {
        background-color: #fff;
        color: #7bb0a6;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 80vh;
    }
    p{
        font-weight: normal;

    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #7bb0a6;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @if (Auth::check())
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Register</a>
        @endif
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Archerion

        </div>

        <div class="links">
            <a href="{{ URL::to('getInformeDocumentosGen/') }}">Documentos</a>
            <a href="{{ URL::to('asociarArchivo/create') }}">Asociar documentos</a>

        </div>
    </div>
</div>

@endsection