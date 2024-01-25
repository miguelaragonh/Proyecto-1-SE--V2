@extends('layouts.cards')

@section('lugares')

@foreach ($lugares as $lugar)
    <div class="cards">
        <article class="card">
            <div class="card__preview">
                <img src="{{ asset($lugar->imagen) }}" alt="">
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


                <div class="card__bottom">

                    <div class="card__properties">
                        2 camas | 2 Personas Habitacion
                    </div>


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
    @endforeach

@endsection


<!--


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
