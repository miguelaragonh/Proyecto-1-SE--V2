@extends('layouts.sideBar') @section('title', 'SRTCR-Home') @section('content')
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="{{ asset('assets/cards.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/searchbar.css') }}" />
    </head>

    <body>
        <div class="wrapper">
            <div class="search">
            <button id="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
                @yield('search-bar')
            </div>
            <div class="cards">
                @yield('lugares')
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        const likeButtons = document.querySelectorAll(".card__btn");
        likeButtons.forEach((likeButton) => {
            likeButton.addEventListener("click", () => {
                likeButton.classList.toggle("card__btn--like");
            });
        });
    
    document.getElementById('search-toggle').addEventListener('click', function() {
    var button = document.getElementById('search-toggle');
    var searchBar = document.getElementById('searchBar');
    if (searchBar.style.display === 'none' || searchBar.style.display === '') {
        searchBar.style.display = 'block';
        button.innerHTML = '<i class="fa-solid fa-xmark"></i>'
    } else {
        searchBar.style.display = 'none';
        button.innerHTML = '<i class="fa-solid fa-magnifying-glass">'
    }
});
    </script>
</html>
@endsection
