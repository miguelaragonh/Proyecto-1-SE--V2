@extends('layouts.sidebar')
@section('title', 'SRTCR-Perfil')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/profile.css') }}">


    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        @if (auth()->user()->img)
                                            <div id="imagePreview"
                                                style="background-image:  url('{{ asset(auth()->user()->img) }}');">
                                            @else
                                                <div id="imagePreview"
                                                    style="background-image:  url('{{ asset('images/user.png') }}');">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h5 class="user-name">{{ auth()->user()->name }} {{ auth()->user()->lastname }}</h5>
                            <h6 class="user-role">
                                @if (auth()->user()->idRol == 1)
                                    <p class="admin-info">Administrador</p>
                                @endif
                                @if (auth()->user()->idRol == 2)
                                    <p class="client-info">Cliente</p>
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">

                <form action="{{ route('editarUsuario2', auth()->user()->id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="idEstado" name="idEstado" value="{{ auth()->user()->idEstado }}">
                    <input type="hidden" id="idRol" name="idRol" value="{{ auth()->user()->idEstado }}">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Informacion</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Nombre</label>
                                    <input type="text" value="{{ auth()->user()->name }}" name="name" id="user-name"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Apellidos</label>
                                    <input type="text" value="{{ auth()->user()->lastname }}" name="lastname"
                                        id="user-lastname" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="text" value="{{ auth()->user()->email }}" name="email"
                                        id="user-email" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="preferencias">Preferencias</label>
                                    <select name="preferencia" id="user-preferences" disabled>
                                        @if (auth()->user()->preferencia != null)
                                            @foreach ($categorias as $categ)
                                                @if ($categ->id == auth()->user()->preferencia)
                                                    <option value="{{ $categ->id }}" selected>{{ $categ->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $categ->id }}">{{ $categ->nombre }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="0" selected>No definido</option>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="submit" id="submit" name="submit" class="btn btn-dark" hidden>Guardar
                                        Cambios</button>
                                </div>
                                <div class="text-right">
                                    <button type="button" id="editar" class="btn btn-dark"
                                        onclick="updateInfo()">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                <form action="{{ route('editarUsuario2', auth()->user()->id) }}" method="POST">
                    @csrf


                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Cambio de Contraseña</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Contraseña Actual</label>
                                    <input type="text" id="contrasenaActual" placeholder="**************" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Contraseña Nueva</label>
                                    <input type="text" id="contrasenaNueva" placeholder="**************"
                                        oninput="validarPassword()" readonly>
                                    <!-- Muestra el mensaje de error para la contraseña -->
                                    <p class="error-message" id="error-contrasenaNueva"></p>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Confirmar Contraseña</label>
                                    <input type="text" id="contrasenaNueva2" placeholder="**************"
                                        oninput="validarPassword2()" readonly>
                                    <!-- Muestra el mensaje de error para la contraseña -->
                                    <p class="error-message" id="error-contrasenaNueva2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="submit" id="submit2" disabled name="submit" class="btn btn-dark"
                                        hidden>Guardar
                                        Cambios</button>
                                </div>
                                <div class="text-right">
                                    <button type="button" id="editar2" class="btn btn-dark"
                                        onclick="updateInfo2()">Cambiar Contraseña</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        function updateInfo() {
            var botonEditar = document.getElementById("editar");
            var botonOcultar = document.getElementById("submit");
            var input1 = document.getElementById("user-name")
            var input2 = document.getElementById("user-lastname")
            var input3 = document.getElementById("user-email")
            var select = document.getElementById("user-preferences")
            if (input1.readOnly) {
                input1.readOnly = false
                input2.readOnly = false
                input3.readOnly = false
                select.removeAttribute("disabled");
                botonOcultar.hidden = false
                botonEditar.hidden = true
            }
        }

        function updateInfo2() {
            var botonEditar = document.getElementById("editar2");
            var botonOcultar = document.getElementById("submit2");
            var contrasenaActual = document.getElementById("contrasenaActual")
            var contrasenaNueva = document.getElementById("contrasenaNueva")
            var contrasenaNueva2 = document.getElementById("contrasenaNueva2")
            if (contrasenaActual.readOnly) {
                contrasenaActual.readOnly = false
                contrasenaNueva.readOnly = false
                contrasenaNueva2.readOnly = false
                botonOcultar.hidden = false
                botonEditar.hidden = true
            }
        }


        const pass = document.getElementById("contrasenaNueva");
        const pass2 = document.getElementById("contrasenaNueva2");
        const pass3 = document.getElementById("contrasenaActual");
        const submitBtn = document.getElementById("submit2");

        function validarPassword() {
            const valor = pass.value.trim();
            const valor2 = pass3.value.trim();
            const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            mostrarError(pass, (valor.length < 8 || !regexPassword.test(valor) || valor === "" || valor == valor2) ?
                "La contraseña debe ser diferente a la actual, debe tener al menos 8 caracteres, una letra minúscula, una letra mayúscula, un número y un carácter especial." :
                null);
            actualizarEstadoBoton();
        }

        function validarPassword2() {
            const valor = pass.value.trim();
            const valor2 = pass2.value.trim();
            mostrarError(pass2, (valor != valor2 || valor === "") ?
                "Las contraseñas deben ser iguales y este campo es requerido." :
                null);
            actualizarEstadoBoton();
        }

        function actualizarEstadoBoton() {
            const campos = [pass, pass2];
            const habilitarBoton = campos.every(campo => campo.value !== "" && !campo.classList.contains("error"));
            submitBtn.disabled = !habilitarBoton;
            submitBtn.classList.toggle("enabled", habilitarBoton);
        }

        function mostrarError(elemento, mensaje) {
            const errorElemento = document.getElementById(`error-${elemento.id}`);
            if (mensaje) {
                errorElemento.innerText = mensaje;
                elemento.classList.add("error");
            } else {
                errorElemento.innerText = "";
                elemento.classList.remove("error");
            }
        }

        function saveChanges() {
            var botonEditar = document.getElementById("editar");
            var botonOcultar = document.getElementById("submit");
            var input1 = document.getElementById("user-name")
            var input2 = document.getElementById("user-lastname")
            var input3 = document.getElementById("user-email")
            var select = document.getElementById("user-preferences")
            if (!input1.readOnly) {
                input1.readOnly = true
                input2.readOnly = true
                input3.readOnly = true
                select.setAttribute("disabled", "disabled");
                botonOcultar.hidden = true
                botonEditar.hidden = false
            }
        }
    </script>
@endsection
