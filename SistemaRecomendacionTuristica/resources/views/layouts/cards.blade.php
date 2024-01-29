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
            <div class="cards-container">
                <section class="cards">
                    @yield('lugares')
                </section>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">@yield('modal-title')</h1>
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
