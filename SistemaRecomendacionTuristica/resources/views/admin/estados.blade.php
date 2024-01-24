@extends('layouts.tables')
@section('titulo', 'Gestionar Estados')
@section('title', 'STRCR-Estados')

@section('btnNuevo')
    <button class="btn btn-primary" id="btnNuevo" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id=""
        data-nombre="" data-descripcion=""><i class="fa-regular fa-square-plus"></i> Nuevo</button>
@endsection

@if ($estados->isEmpty())
    @section('nodata')
        <h3 id='nodatos'>No existen categorias agregados</h3>
    @endsection
@else
    @section('thead')
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    @endsection
    @section('tbody')
        @foreach ($estados as $estado)
            <tr>
                <td>{{ $estado->id }} </td>
                <td>{{ $estado->nombre }} </td>
                <td>{{ $estado->descripcion }} </td>
                <td>
                    <div class="d-flex ">
                        <a href="" class="editar-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            data-id="{{ $estado->id }}" data-nombre="{{ $estado->nombre }}"
                            data-descripcion="{{ $estado->descripcion }}"><i class="fa-solid fa-pen-to-square"></i></a>

                        <form method="POST" action="{{ route('eliminarEstado', $estado->id) }}" class="ms-2">
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

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                // Capturar el clic en el botón "Editar"
                $('.editar-btn').click(function(e) {
                    e.preventDefault();

                    // Obtener los datos del registro desde los atributos data
                    let editarEstadoRoute = '{{ route('editarEstado', ':id') }}';
                    var id = $(this).data('id');
                    var nombre = $(this).data('nombre');
                    var descripcion = $(this).data('descripcion');

                    // Actualizar los valores del formulario
                    $('#formulario-editar #id').val(id);
                    $('#formulario-editar #nombre').val(nombre);
                    $('#formulario-editar #descripcion').val(descripcion);
                    $('#formulario-editar').attr('action', editarEstadoRoute.replace(':id', id));

                    // Mostrar el modal de edición
                    $('#editarModal').modal('show');
                });

                // Capturar el clic en el botón "Nuevo"
                $('#btnNuevo').click(function(e) {
                    e.preventDefault();

                    // Actualizar los valores del formulario
                    $('#formulario-editar #id').val('');
                    $('#formulario-editar #nombre').val('');
                    $('#formulario-editar #descripcion').val('');
                    $('#formulario-editar').attr('action', '{{ route('crearEstado') }}');
                    // Mostrar el modal de edición
                    $('#editarModal').modal('show');
                });

            });
        </script>
    @endsection
@endif
@section('modal-title', 'Formulario de Estados')
@section('modal-tbody')
    <form id="formulario-editar" class="form text-center" method="POST"  action=" {{route('crearEstado') }}">
        @csrf
        <!-- Agrega un campo oculto para almacenar el ID del registro -->
        <input type="hidden" id="id" name="id">

        <label>
            <input class="input" type="text" id="nombre" name="nombre" placeholder="" required="">
            <span>Nombre</span>
        </label>
        <label>
            <input class="input" type="text" id="descripcion" name="descripcion" placeholder="" required="">
            <span>Descripción</span>
        </label>
        <!-- Otros campos del formulario -->
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
    </form>

    <style>
        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            /* Ajuste para ocupar todo el ancho del modal */
            max-width: none;
            /* Para ignorar el límite máximo de ancho */
            background-color: #fff;
            padding: 20px;
            border-radius: 20px;
            position: relative;

        }

        .title {
            font-size: 28px;
            color: royalblue;
            font-weight: 600;
            letter-spacing: -1px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 30px;
        }

        .title::before,
        .title::after {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            border-radius: 50%;
            left: 0px;
            background-color: royalblue;
        }

        .title::before {
            width: 18px;
            height: 18px;
            background-color: royalblue;
        }

        .title::after {
            width: 18px;
            height: 18px;
            animation: pulse 1s linear infinite;
        }

        .message,
        .signin {
            color: rgba(88, 87, 87, 0.822);
            font-size: 14px;
        }

        .signin {
            text-align: center;
        }

        .signin a {
            color: royalblue;
        }

        .signin a:hover {
            text-decoration: underline royalblue;
        }

        .flex {
            display: flex;
            width: 100%;
            gap: 6px;
        }

        .form label {
            position: relative;
        }

        .form label .input {
            width: 100%;
            padding: 10px 10px 20px 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
        }

        .form label .form-select {
            width: 100%;
            padding: 10px 10px 20px 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 10px;
        }

        .form label .input+span {
            position: absolute;
            left: 10px;
            top: 15px;
            color: grey;
            font-size: 0.9em;
            cursor: text;
            transition: 0.3s ease;
        }

        .form label .input:placeholder-shown+span {
            top: 15px;
            font-size: 0.9em;
        }

        .form label .input:focus+span,
        .form label .input:valid+span {
            top: 0px;
            font-size: 0.7em;
            font-weight: 600;
        }

        .form label .input:valid+span {
            color: green;
        }

        .submit {
            border: none;
            outline: none;
            background-color: royalblue;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            transform: .3s ease;
        }

        .submit:hover {
            background-color: rgb(56, 90, 194);
            cursor: pointer;
        }

        @keyframes pulse {
            from {
                transform: scale(0.9);
                opacity: 1;
            }

            to {
                transform: scale(1.8);
                opacity: 0;
            }
        }
    </style>
@endsection
