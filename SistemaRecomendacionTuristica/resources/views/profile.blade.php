@extends('layouts.sidebar')
@section('title', 'SRTCR-Perfil')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/profile.css') }}">
    <div class="wrapper">
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
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-2 text-primary">Informacion</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Nombre</label>
                                    <input type="text" value="{{ auth()->user()->name }}" id="user-name" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Apellidos</label>
                                    <input type="text" value="{{ auth()->user()->lastname }}" id="user-lastname" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="text" value="{{ auth()->user()->email }}" id="user-email" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="preferencias">Preferencias</label>
                                    <select name="preferencias" id="user-preferences" disabled>
                                        <option value="" selected>No Definido</option>
                                        <option value="montaña">Montaña</option>
                                        <option value="playa">Playa</option>
                                        <option value="ciudad">Ciudad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit" name="submit" class="btn btn-dark"onclick="saveChanges()" hidden>Guardar
                                        Cambios</button>
                                </div>
                                <div class="text-right">
                                    <button type="button" id="editar" class="btn btn-dark" onclick="updateInfo()">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
