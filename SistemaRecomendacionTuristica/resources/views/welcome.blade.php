@extends('layouts.cards')
@section('lugares')
    @if ($lugares->isEmpty())
        @section('error')
            <div class="notFound">
                <div class="moon"></div>
                <div class="moon_crater moon_crater1"></div>
                <div class="moon_crater moon_crater2"></div>
                <div class="moon_crater moon_crater3"></div>

                <div class="star star1"></div>
                <div class="star star2"></div>
                <div class="star star3"></div>
                <div class="star star4"></div>
                <div class="star star5"></div>

                <div class="error">
                    <div class="error__title">404</div>
                    <div class="error__subtitle">Hmmm...</div>
                    <div class="error__description">El Contenido solicitado no se encuentra disponile</div>
                    <a href="{{ route('welcome') }}">
                        <button class="error_button error_button--active">Home</button>
                    </a>
                </div>
            </div>
            </div>
        @endsection
    @else
        @section('search-bar')
            <div class="search">
                <button id="search-toggle"><i class="fa-solid fa-magnifying-glass"></i></button>
                <form method="post" action=" {{ route('buscar') }}" class="input">
                    @csrf
                    <input type="text" name="text" placeholder="Buscar" id="searchBar" oninput="filterLugares()"
                        class="input">
                </form>
            </div>
        @endsection
        @foreach ($lugares as $lugar)
            <div id="prefer" hidden>{{ $preferencia }}</div>
            <div id="categ" hidden>{{ $categoriaMasBuscada }}</div>
            <div class="card">
                <div class="card__image-container">
                    @if ($lugar->imagen)
                        <img src="{{ asset($lugar->imagen) }}">
                    @else
                        <img src="{{ asset('images/notImage.png') }}" />
                    @endif
                </div>
                <div class="card__content" id="content">
                    <p class="card__title text--medium" id="title-text">
                        {{ $lugar->nombre }}
                    </p>
                    <div class="card__info" id="location-text">
                        <button class="text--medium button-ub" href="{{route('welcome')}}">{{ $lugar->ubicacion }} / {{ $lugar->categoria->nombre }}</button>
                        <button class="card__price text--medium button-info" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"
                            data-descripcion="{{ $lugar->descripcion }}">Descripcion</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
@section('modal-title', 'Informacion del Lugar')
@section('cerrar_modal_cards')
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-descripcion=""
        id="cls"></button>
@endsection
@section('modal-tbody')
    <p id="Descripcion"></p>
@endsection
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
        $('.button-info').click(function(e) {
            e.preventDefault();
            var descripcion = $(this).data('descripcion');
            $('#Descripcion').text(descripcion);
            $('#modal').modal('show');
        });

        $('#cls').click(function(e) {
            e.preventDefault();
            $('#Descripcion').text('');
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var data;
        var divOculto = document.getElementById('prefer');
        var divOcultoB = document.getElementById('categ');
        var datosOcultos = divOculto.innerHTML;
        var datosOcultosB = divOcultoB.innerHTML;
        if (!data === null) {
            data = "";
        } else {
            data = (datosOcultos) ? datosOcultos : datosOcultosB;
        }
        console.log(data)
        switch (data) {
            case '3':
                data = "";
                var cards = document.querySelectorAll('.card');
                var buttonInfos = document.querySelectorAll('.button-info');
                var body = document.querySelectorAll(".wrapper")

                cards.forEach(function(card) {
                    card.style.color = '#005187';
                });

                body.forEach(function(body) {
                    body.style.background = 'rgb(131,235,237)';
                    body.style.background =
                        'linear-gradient(315deg, rgba(131,235,237,1) 0%, rgba(42,137,242,1) 53%, rgba(203,234,249,1) 100%)';
                });

                buttonInfos.forEach(function(buttonInfo) {
                    buttonInfo.style.color = 'white';
                    buttonInfo.style.backgroundColor = '#4d82bc';

                    buttonInfo.addEventListener('mouseover', function() {
                        buttonInfo.style.backgroundColor = '#005187';
                    });

                    buttonInfo.addEventListener('mouseout', function() {
                        buttonInfo.style.backgroundColor = '#4d82bc';
                    });
                });
                break;
            case '4':
                data = "";
                var cards = document.querySelectorAll('.card');
                var buttonInfos = document.querySelectorAll('.button-info');
                var body = document.querySelectorAll(".wrapper")

                cards.forEach(function(card) {
                    card.style.color = '#006414';
                });

                body.forEach(function(body) {
                    body.style.background = 'rgb(17,57,11)';
                    body.style.background =
                        'linear-gradient(328deg, rgba(17,57,11,1) 0%, rgba(23,144,80,1) 61%, rgba(140,198,50,1) 100%)';
                });

                buttonInfos.forEach(function(buttonInfo) {
                    buttonInfo.style.color = 'white';
                    buttonInfo.style.backgroundColor = '#5ccb5f';

                    buttonInfo.addEventListener('mouseover', function() {
                        buttonInfo.style.backgroundColor = '#006414';
                    });

                    buttonInfo.addEventListener('mouseout', function() {
                        buttonInfo.style.backgroundColor = '#5ccb5f';
                    });
                });
                break;
            case '5':
                data = "";
                var cards = document.querySelectorAll('.card');
                var buttonInfos = document.querySelectorAll('.button-info');
                var body = document.querySelectorAll(".wrapper")

                cards.forEach(function(card) {
                    card.style.color = '#3c3c3c';
                });

                body.forEach(function(body) {
                    body.style.background = 'rgb(94,99,121)';
                    body.style.background =
                        'linear-gradient(315deg, rgba(94,99,121,1) 0%, rgba(180,178,178,1) 53%, rgba(35,33,37,1) 100%)';
                }); 

                buttonInfos.forEach(function(buttonInfo) {
                    buttonInfo.style.color = 'black';
                    buttonInfo.style.backgroundColor = '#8c8c8c';

                    buttonInfo.addEventListener('mouseover', function() {
                        buttonInfo.style.backgroundColor = '#3c3c3c';
                        buttonInfo.style.color = 'white';
                    });

                    buttonInfo.addEventListener('mouseout', function() {
                        buttonInfo.style.backgroundColor = '#8c8c8c';
                        buttonInfo.style.color = 'black';
                    });
                });
                break;
            default:
                break;
        }
    });
</script>