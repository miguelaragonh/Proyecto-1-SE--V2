@extends('layouts.sideBar')
@section('title', 'SRTCR-Home')
@section('content')
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <link rel="stylesheet" href="{{ asset('assets/cards.css') }}">
    </head>

    <body>
        <div class="wrapper">
            @yield('lugares')
        </div>
    </body>
    <script>
        const likeButtons = document.querySelectorAll(".card__btn");
        likeButtons.forEach((likeButton) => {
            likeButton.addEventListener("click", () => {
                likeButton.classList.toggle("card__btn--like");
            });
        });
    </script>

    </html>
@endsection
