@extends('layouts.sideBar') @section('title', 'SRTCR-Home') @section('content')
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="{{ asset('assets/cards.css') }}" />
    </head>

    <body>
        <div class="wrapper">
            <div class="cards">@yield('lugares')</div>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center text-center">
                    @yield('modal-tbody')
                </div>
            </div>
        </div>
    </div>
</html>
@endsection
