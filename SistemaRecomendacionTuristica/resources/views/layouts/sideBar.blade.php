<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="{{ asset('assets/sidebar.css') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/srtcr.png" type="image/x-icon">
    <title> @yield('title')</title>
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        < script src = "https://cdn.jsdelivr.net/npm/sweetalert2@10" >
    </script>
    </script>

    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="{{ url('/home') }}">
                        <img src="images/srtcr.png" alt="">
                        SRTCR
                    </a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header user">
                        <i class="fa-solid fa-user"></i>
                        <a>Bienvenido {{ auth()->user()->name }}</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-address-card"></i>
                            Perfil
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                            data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="fa-solid fa-earth-americas"></i>
                            Explorar
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-umbrella-beach"></i>
                                    Playas</a>
                            </li>
                            <li class="sidebar-item">

                                <a href="#" class="sidebar-link"><i class="fa-solid fa-mountain"></i> Montañas</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i class="fa-solid fa-city"></i> Ciudades</a>
                            </li>
                        </ul>
                    </li>

                    @if (auth()->user()->idRol == 1)
                        <li class="sidebar-item">
                            <a href="{{ route('iniciarSesion') }}" class="sidebar-link collapsed"
                                data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false"
                                aria-controls="auth">
                                <i class="fa-solid fa-user-tie"></i>
                                Administracion
                            </a>
                            <ul id="auth" class="sidebar-dropdown list-unstyled collapse"
                                data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="{{ route('estados') }}" class="sidebar-link">Administrar Estados</a>
                                    <a href="{{ route('estados') }}" class="sidebar-link">Administrar Roles</a>
                                    <a href="{{ route('estados') }}" class="sidebar-link">Administrar Usuarios</a>
                                    <a href="{{ route('estados') }}" class="sidebar-link">Administrar Categoria</a>
                                    <a href="{{ route('estados') }}" class="sidebar-link">Administrar Lugares</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    <button class="Btn" onclick="showConfirmation()">
                        <div class="sign"><svg viewBox="0 0 512 512">
                                <path
                                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                                </path>
                            </svg></div>
                        <a class="text">Salir</a>
                    </button>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main m-0">
            <nav class="navbar navbar-expand px-3">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="search">
                    <input placeholder="Search..." type="text">
                    <button type="submit">Go</button>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>

<script>
    const toggler = document.querySelector(".btn");
    toggler.addEventListener("click", function() {
        document.querySelector("#sidebar").classList.toggle("collapsed");
    });

    function addDarkmodeWidget() {
        const options = {
            bottom: '64px', // default: '32px'
            //right: 'unset', // default: '32px'
            //left: '32px', // default: 'unset'
            time: '0.5s', // default: '0.3s'
            mixColor: '#fff', // default: '#fff'
            backgroundColor: '#fff', // default: '#fff'
            buttonColorDark: '#100f2c', // default: '#100f2c'
            buttonColorLight: '#fff', // default: '#fff'
            saveInCookies: false, // default: true,
            label: '🌓', // default: ''
            autoMatchOsTheme: true // default: true
        }
        new Darkmode(options).showWidget();
    }
    window.addEventListener('load', addDarkmodeWidget);

    function showConfirmation() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¡Se cerrará la sesión!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Cerrar Sesion'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'info',
                    title: 'Cerrando Sesion....',
                    text: 'Nos Vemos la proxima',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
                setTimeout(function() {
                    window.location.href = "{{ url('/logout') }}";
                }, 3000);
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/ebacb183db.js" crossorigin="anonymous"></script>
</body>

</html>
