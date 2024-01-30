@extends('layouts.tables')
@section('titulo', 'Gestionar Usuarios')
@section('title', 'STRCR-Usuarios')

@section('btnNuevo')
    <button class="btn btn-primary" id="btnNuevo" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id=" "
        data-name=" " data-lastname=" " data-email=" "><i class="fa-regular fa-square-plus"></i> Nuevo</button>
@endsection

@if ($usuarios->isEmpty())
    @section('nodata')
        <h3 id='nodatos'>No existen usuarios agregados</h3>
    @endsection
@else
    @section('thead')
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo Electronico</th>
            <th>Imagen</th>
            <th>Estado</th>
            <th>Rol</th>
            <th>Accion</th>
        </tr>
    @endsection
    @section('tbody')
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }} </td>
                <td>{{ $usuario->name }} </td>
                <td>{{ $usuario->lastname }} </td>
                <td>{{ $usuario->email }} </td>
                @if ($usuario->img)
                    <td>
                        <img style="border-radius: 10px; overflow: hidden;" src="{{ asset($usuario->img) }}"
                            alt="Imagen del usuario">
                    </td>
                @else
                    <td>
                        <img style="border-radius: 10px; overflow: hidden;" src="{{ asset('storage/pdf.png') }}"
                            alt="Imagen del usuario">
                    </td>
                @endif

                <td>{{ $usuario->estado->nombre }}</td>
                <td>{{ $usuario->rol->nombre }}</td>

                <td>
                    <div class="d-flex ">
                        <a href="" class="editar-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            data-id="{{ $usuario->id }}" data-name="{{ $usuario->name }}"
                            data-lastname="{{ $usuario->lastname }}" data-email="{{ $usuario->email }}"
                            data-idestado="{{ $usuario->idEstado }}" data-idrol="{{ $usuario->idRol }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form method="POST" action="{{ route('eliminarUsuario', $usuario->id) }}" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none;
                            outline: none;">
                                <i class="fa-solid fa-trash" style="color: #f50000;"></i>
                            </button>
                        </form>

                        <form method="POST" action="{{ route('resetPass', $usuario->id) }}" class="ms-2">
                            @csrf
                            @method('PUT')
                            <button type="submit" style="border: none;
                            outline: none;">
                                <i class="fa-solid fa-key" style="color: #000000;"></i>
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
                    let editarUsuarioRoute = '{{ route('editarUsuario', ':id') }}';
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var lastname = $(this).data('lastname');
                    var email = $(this).data('email');
                    var idEstado = $(this).data('idestado');
                    var idRol = $(this).data('idrol');

                    // Actualizar los valores del formulario
                    $('#formulario-editar #id').val(id);
                    $('#formulario-editar #name').val(name);
                    $('#formulario-editar #email').val(email);
                    $('#formulario-editar #lastname').val(lastname);
                    $('#formulario-editar #idEstado').val(idEstado);
                    $('#formulario-editar #idRol').val(idRol);


                    $('#formulario-editar').attr('action', editarUsuarioRoute.replace(':id', id));

                    // Seleccionar el estado correspondiente en el select

                    //$('#formulario-editar #idEstado option[value="' + idEstado + '"]').prop('selected', true);
                    // Mostrar el modal de edición
                    $('#editarModal').modal('show');
                });



                // Capturar el clic en el botón "Nuevo"
                $('#btnNuevo').click(function(e) {
                    e.preventDefault();

                    $('#formulario-editar #id').val('');
                    $('#formulario-editar #name').val('');
                    $('#formulario-editar #email').val('');
                    $('#formulario-editar #lastname').val('');
                    $('#formulario-editar #idEstado').val(0);
                    $('#formulario-editar #idRol').val(0);
                    $('#formulario-editar').attr('action', '{{ route('nuevoUsuario') }}');
                    // Mostrar el modal de edición
                    $('#editarModal').modal('show');
                });

            });
        </script>
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
        @elseif(Session::has('error'))
            <script>
                toastr.options = {
                    "timeOut": 5000,
                };
                toastr.error("{{ Session::get('error') }}");
            </script>
        @endif
    @endsection
@endif
@section('modal-title', 'Formulario de usuarios')
@section('modal-tbody')

    <form id="formulario-editar" class="form text-center" method="POST" action=" {{ route('nuevoUsuario') }}"
        enctype="multipart/form-data">
        @csrf
        <!-- Agrega un campo oculto para almacenar el ID del registro -->
        <input type="hidden" id="id" name="id">

        <label>
            <input class="input" type="text" id="name" name="name" placeholder="" required>
            <span>Nombre</span>
        </label>
        <label>
            <input class="input" type="text" id="lastname" name="lastname" placeholder="" required>
            <span>Apellidos</span>
        </label>

        <label>
            <input class="input" type="email" id="email" name="email" placeholder="" required>
            <span>Correo Electronico</span>
        </label>

        <label>
            <select id="idEstado" name="idEstado" class="form-select form-select-sm" required>
                <option value="0">Selecciona un Estado:</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                @endforeach
            </select>
        </label>

        <label>
            <select id="idRol" name="idRol" class="form-select form-select-sm" required>
                <option value="0">Selecciona un Rol</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endforeach
            </select>
        </label>

        <label>
            <input class="input" type="file" id="img" name="img" placeholder="" accept="image/*">
        </label>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
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
