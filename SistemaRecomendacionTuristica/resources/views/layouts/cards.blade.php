@extends('layouts.sideBar') @section('title', 'DestinoCR') @section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="{{ asset('assets/cards.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/searchbar.css') }}" />
</head>

<body>
    <div class="wrapper">
            @yield('error')
            @yield('search-bar')
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
                @yield('cerrar_modal_cards')
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center text-center">
                @yield('modal-tbody')
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('message'))
    <script>
        toastr.options = {
            "timeOut": 5000,
        };
        toastr.success("{{ Session::get('message') }}");
    </script>
@endif

</html>
@endsection
