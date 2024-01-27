@extends('layouts.cards')

@section('lugares')

@foreach ($lugares as $lugar)
        <article class="card">
            <div class="card__preview">
                <img src="{{ asset($lugar->imagen) }}" alt=" ">
                <div class="card__price">
                    {{ $lugar->categoria->nombre }}
                </div>
            </div>
            <div class="card__content">


                <h2 class="card__title">{{ $lugar->nombre }}</h2>
                <p class="card__address">
                    Costa Rica - {{ $lugar->ubicacion }}
                </p>
                <p class="card__description">
                    {{ $lugar->descripcion }}
                </p>
                
                <div hidden></div>

                <div class="card__bottom">
                    <div class="card__properties">
                       
                    </div>


                    <button class="card__btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            data-nombre="{{$lugar->nombre}}"
                            data-descripcion="{{ $lugar->descripcion }}" data-ubicacion="{{ $lugar->ubicacion }}"
                            >
                            <a href="#m3-o">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                        </svg>
                        </a>
                    </button>
                </div>
            </div>
        </article>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
            $(document).ready(function() {
                // Capturar el clic en el botón "Editar"
                $('.card__btn').click(function(e) {
                    e.preventDefault();

                    var name = $(this).data('nombre')
                    var descrip = $(this).data('descripcion')
                    var ubic = $(this).data('ubicacion')
                    
                    $('.card__title').val(name);
                    $('.card__address').val(ubic);
                    $('.card__description').val(descrip);
                    // Mostrar el modal de edición
                    $('.modal').modal('show');
                });
            });
    </script>
    @section('modal-tbody')
    <div class="card__content">
        <h2 class="card__title"></h2>
        <p class="card__address">
        </p>
        <p class="card__description">
        </p>
    </div>
    @endsection
@endsection
<!--

<div class="box">
  <a href="#m3-o" class="link-1" id="m3-c">Modal 3</a>
  <p class="box__info">With Background Full Opacity</p>

  <div class="modal-container" id="m3-o" style="--m-background: var(--global-background);">
    <div class="modal" style="--m-shadow: 0 0 10rem 0">
      <h1 class="modal__title">Modal 3 Title</h1>
      <p class="modal__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis ex dicta maiores libero minus obcaecati iste optio, eius labore repellendus.</p>
      <button class="modal__btn">Button &rarr;</button>
      <button class="modal__btn">Button &rarr;</button>
      <a href="#m3-c" class="link-2"></a>
    </div>
  </div>
</div>
@foreach ($lugares as $lugar)
                <tr>
                <td>{{ $lugar->id }} </td>
                <td>{{ $lugar->nombre }} </td>
                <td>{{ $lugar->descripcion }} </td>
                <td>{{ $lugar->ubicacion }} </td>
                <td >
                    <img style="border-radius: 10px; overflow: hidden;" src="{{ asset($lugar->imagen) }}" alt="Imagen del lugar">
                </td>
                <td>{{ $lugar->estado->nombre }}</td>
                <td>{{ $lugar->categoria->nombre }}</td>

                <td>
                    <div class="d-flex ">
                        <a href="" class="editar-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            data-id="{{ $lugar->id }}"
                            data-nombre="{{ $lugar->nombre }}"
                            data-descripcion="{{ $lugar->descripcion }}"
                            data-ubicacion="{{ $lugar->ubicacion }}"
                            data-idestado="{{ $lugar->idEstado }}"
                            data-idcategoria="{{ $lugar->idCategoria }}"

                            >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form method="POST" action="{{ route('eliminarLugar', $lugar->id) }}" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none;
                            outline: none;">
                                <i class="fa-solid fa-trash" style="color: #f50000;"></i>
                            </button>
                        </form>
                    </div>
                </td>
                </tr>
        @endforeach

--->
