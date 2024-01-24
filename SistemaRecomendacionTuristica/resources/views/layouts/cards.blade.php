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
            <div class="cards">
                <article class="card">
                    <div class="card__preview">
                        @yield('preview-content')
                    </div>
                    <div class="card__content">
                        @yield('card-body')
                        <div class="card__bottom">
                        @yield('card-bottom')
                        <button class="card__btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                            </svg>
                        </button>
                        </div>
                    </div>
                </article>
        </div>
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
