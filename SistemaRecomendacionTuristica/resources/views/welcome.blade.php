@extends('layouts.cards')
@section('search-bar')
<form method="get" action=" {{ route('welcome') }}" class="input">
    <input type="text" name="text" placeholder="Buscar" id="searchBar" oninput="filterLugares()" class="input">
</form>
@endsection
@section('lugares')

@if ($lugares->isEmpty())
        <h3 id='nodatos'>No se encontraron registros</h3>
@else

    @foreach ($lugares as $lugar)
        <div class="container py-4">
            <article class="postcard light blue">
                <div class="postcard__img_link">
                    <img class="postcard__img" src="{{ asset($lugar->imagen) }}" alt="Image Title" />
                </div>
                <div class="postcard__text">
                    <h1 class="postcard__title"><a href="#">{{ $lugar->nombre }}</a></h1>
                    <div class="postcard__subtitle small">
                        {{ $lugar->ubicacion }} / {{ $lugar->categoria->nombre }}
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">{{ $lugar->descripcion }}</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                        <li class="tag__item">
                            <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                        </li>
                    </ul>
                </div>
            </article>
        </div>
    @endforeach
    @endif
@endsection
