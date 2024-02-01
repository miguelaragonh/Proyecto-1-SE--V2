<html>

<head>
    <link rel="shortcut icon" href="images/srtcr.png" type="image/x-icon">
    <title>Iniciar Sesion en SRTCR</title>
    <link rel="stylesheet" href="{{ asset('assets/LogIn.css') }}">
</head>

</html>
<section>
    <div id="container" class="container">
        <div class="bg-container">
            <img src="images/Background4.jpg" class="bg-fondo">
            <img src="images/Background1.jpg" class="bg-1">
            <img src="images/Background2.jpg" class="bg-2">
            <img src="images/Background3.jpg" class="bg-3">
        </div>
        <!-- FORM SECTION -->
        <div class="row">
            <!-- Registro-->
            <div class="col align-items-center sign-up">
                <form action="{{ route('crearUsuario') }}" method="POST" id="form">
                    @csrf
                    <div class="form-wrapper align-items-center">
                        <div class="form sign-up">
                            <div class="input-group">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" placeholder="Nombre" name="name" id="name"
                                    oninput="validarNombre()" required>
                            </div>
                            <!-- Muestra el mensaje de error para el nombre -->
                            <p class="error-message" id="error-name"></p>
                            <div class="input-group">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" placeholder="Apellidos" name="lastname" id="lastname"
                                    oninput="validarApellidos()" required>
                            </div>
                            <!-- Muestra el mensaje de error para los apellidos -->
                            <p class="error-message" id="error-lastname"></p>
                            <div class="input-group">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" placeholder="Correo Electronico" name="email" id="email"
                                    oninput="validarEmail()" required>
                            </div>
                            <!-- Muestra el mensaje de error para el correo electrónico -->
                            <p class="error-message" id="error-email"></p>
                            <div class="input-group">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" placeholder="Contraseña" name="password" id="password"
                                    oninput="validarPassword()" required>
                            </div>
                            <!-- Muestra el mensaje de error para la contraseña -->
                            <p class="error-message" id="error-password"></p>
                            <button class="submit" id="submitBtn" disabled>
                                Registrarme
                            </button>
                            <p>
                                <span>
                                    Ya tienes una cuenta?
                                </span>
                                <b onclick="toggle()" class="pointer">
                                    Iniciar Sesion
                                </b>
                            </p>
                        </div>
                    </div>
                </form>


            </div>

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <style>
                /* Agrega estilos CSS según tus necesidades */
                .error-message {
                    color: red;
                }

                .error {
                    border: 1px solid red;
                }

                .submit {
                    background-color: red;
                    color: white;
                    cursor: not-allowed;
                }

                .submit.enabled {
                    cursor: pointer;
                }
            </style>
            <script>
                const nombre = document.getElementById("name");
                const apellidos = document.getElementById("lastname");
                const email = document.getElementById("email");
                const pass = document.getElementById("password");
                const submitBtn = document.getElementById("submitBtn");

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

                function validarNombre() {
                    const valor = nombre.value.trim();
                    const contieneNumeros = /[0-9]/.test(valor); // Verifica si el valor contiene algún número
                    const mensajeError = (valor.length === 0) ? "El nombre es requerido." :
                        (valor.length < 3 || valor.length > 15 || contieneNumeros) ?
                        "El nombre debe tener de 3 a 15 caracteres y solo puede contener letras." : null;
                    mostrarError(nombre, mensajeError);
                    actualizarEstadoBoton();
                }


                function validarApellidos() {
                    const valor = apellidos.value.trim();
                    const contieneNumeros = /[0-9]/.test(valor); // Verifica si el valor contiene algún número
                    const mensajeError = (valor.length === 0) ? "El nombre es requerido." :
                        (valor.length < 3 || valor.length > 15 || contieneNumeros) ?
                        "Los apellidos deben tener de 3 a 15 caracteres y no puede ser numérico." : null;
                    mostrarError(apellidos, mensajeError);
                    actualizarEstadoBoton();
                }

                function validarEmail() {
                    const valor = email.value.trim();
                    const regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
                    mostrarError(email, (!regexEmail.test(valor) || valor === "") ? "El email no es válido." : null);
                    actualizarEstadoBoton();
                }

                function validarPassword() {
                    const valor = pass.value.trim();
                    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                    mostrarError(pass, (valor.length < 8 || !regexPassword.test(valor) || valor === "") ?
                        "La contraseña debe tener al menos 8 caracteres, una letra minúscula, una letra mayúscula, un número y un carácter especial." :
                        null);
                    actualizarEstadoBoton();
                }

                function actualizarEstadoBoton() {
                    const campos = [nombre, apellidos, email, pass];
                    const habilitarBoton = campos.every(campo => campo.value !== "" && !campo.classList.contains("error"));
                    submitBtn.disabled = !habilitarBoton;
                    submitBtn.classList.toggle("enabled", habilitarBoton);
                }
            </script>



            <!-- Registro -->
            <!-- Inicio Sesion -->
            <div class="col align-items-center flex-col sign-in">
                <form action="{{ route('iniciarSesion') }}" method="POST" id="form">
                    @csrf
                    <div class="form-wrapper align-items-center">
                        <div class="form sign-in">
                            <div class="input-group">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="text" placeholder="Correo Electronico" name="email" required>
                            </div>
                            <div class="input-group">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="password" placeholder="Contraseña" name="password" required>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value=""
                                    id="form2Example33" />
                                <label class="form-check-label" for="form2Example33">
                                    Recuerdame
                                </label>
                            </div>
                            <button class="submit">
                                Iniciar Sesion
                            </button>
                            <p>
                                <span>
                                    No tienes una cuenta?
                                </span>
                                <b onclick="toggle()" class="pointer">
                                    Registrarme
                                </b>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Inicio Sesion -->
        </div>
        <!-- END FORM SECTION -->
        <div class="row content-row">
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Bienvenidos a TuristiandoCR
                    </h2>
                </div>
                <div class="img sign-in">

                </div>
            </div>
            <div class="col align-items-center flex-col">
                <div class="img sign-up">

                </div>
                <div class="text sign-up">
                    <h2>
                        Registrate en TuristiandoCR
                    </h2>

                </div>
            </div>
        </div>
    </div>
    <style>

    </style>

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
    <script>
        let container = document.getElementById('container')
        toggle = () => {
            container.classList.toggle('sign-in')
            container.classList.toggle('sign-up')
        }
        setTimeout(() => {
            container.classList.add('sign-in')
        }, 100)
    </script>
    <script src="https://kit.fontawesome.com/ebacb183db.js" crossorigin="anonymous"></script>
</section>
