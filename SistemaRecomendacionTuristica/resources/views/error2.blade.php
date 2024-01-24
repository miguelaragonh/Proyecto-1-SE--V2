
@extends('layouts.sideBar')
@section('content')
<div class="container-fluid p-0" style="width: 100%; height: 100vh;">
    <div class="text-wrapper" style="background-color: rgb(255, 255, 255)">
        <div class="title" data-content="404">
            Error - Usuario Existente
        </div>

        <div class="subtitle">
            Oops, el correo electronico del usuario que quieres agregar ya existe..
        </div>

        <div class="buttons">
            <a class="button" href="{{ route('usuario') }}">Regresar</a>
        </div>
    </div>
</div>
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway:700);

    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    html {
        height: 100%;
    }

    body {
        font-family: 'Raleway', sans-serif;
        background-color: #ffffff;
        height: 100%;
        padding: 10px;
    }

    a {
        color: #EE4B5E;
        text-decoration: none;
    }

    a:hover {
        color: #FFFFFF;
        text-decoration: none;
    }

    .text-wrapper {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .title {
        font-size: 2em;
        font-weight: 700;
        color: #EE4B5E;
    }

    .subtitle {
        font-size: 20px;
        font-weight: 700;
        color: #1FA9D6;
    }

    .isi {
        font-size: 18px;
        text-align: center;
        margin: 30px;
        padding: 20px;
        color: white;
    }

    .buttons {
        margin: 30px;
        font-weight: 700;
        border: 2px solid #EE4B5E;
        text-decoration: none;
        padding: 15px;
        text-transform: uppercase;
        color: #EE4B5E;
        border-radius: 26px;
        transition: all 0.2s ease-in-out;
        display: inline-block;

        .buttons:hover {
            background-color: #EE4B5E;
            color: dark;
            transition: all 0.2s ease-in-out;
        }
    }
</style>


@endsection

