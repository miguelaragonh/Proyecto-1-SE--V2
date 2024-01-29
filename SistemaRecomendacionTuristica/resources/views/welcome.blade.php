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
    @foreach($lugares as $lugar)
        <div class="card">
          <div class="card__image-container">
            <img
              src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1200&q=80"
            />
          </div>
          <div class="card__content" id="content">
            <p class="card__title text--medium" id="title-text">
              {{$lugar->nombre}}
            </p>
            <div class="card__info" id="location-text">
              <p class="text--medium">{{$lugar->ubicacion}} / {{ $lugar->categoria->nombre }}</p>
              <p class="card__price text--medium" id="button-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                data-descripcion="{{ $lugar->descripcion }}">Descripcion</p>
            </div>
          </div>
        </div>
    @endforeach
    @endif
@endsection
@section('modal-title','Informacion del Lugar')
@section('modal-tbody')
    <p id="Descripcion"></p>
@endsection
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
    $('#button-info').click(function(e) {
     e.preventDefault();
        var descripcion = $(this).data('descripcion');
        $('#Descripcion').text(descripcion);
        $('#modal').modal('show');
      });
 });
</script>
