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
    <header class="menu__wrapper">
        <div class="menu__bar">
            <a href="{{route('welcome')}}" title="Home" aria-label="home" class="logo">
                <img src="images/srtcr.png" alt="">
            </a>
            <nav>
                <ul class="navigation hide">
                    <li>
                        <button>
                            <i class="fa-solid fa-sliders"></i>Administracion
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16">
                                <path
                                    d="M12.78 5.22a.749.749 0 0 1 0 1.06l-4.25 4.25a.749.749 0 0 1-1.06 0L3.22 6.28a.749.749 0 1 1 1.06-1.06L8 8.939l3.72-3.719a.749.749 0 0 1 1.06 0Z">
                                </path>
                            </svg>
                        </button>
                        <div class="dropdown__wrapper">
                            <div class="dropdown">
                                <ul class="list-items-with-description">
                                    <li>
                                        <i class="fa-solid fa-gear"></i>
                                        <a href="{{ route('estados') }}">
                                            <div class="item-title">
                                             <h3>Administar Estados</h3>
                                             <p>Gestiona los Estados</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-location-dot"></i>
                                        <div class="item-title">
                                            <h3>Administrar Lugares</h3>
                                            <p>Gestiona los Lugares Disponibles</p>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-users"></i>
                                        <div class="item-title">
                                            <h3>Administar Usuarios</h3>
                                            <p>Gestiona los Usuarios Registrados</p>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-user-tag"></i>
                                        <div class="item-title">
                                            <h3>Administrar Roles</h3>
                                            <p>Gestiona los Roles</p>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-list"></i>
                                        <div class="item-title">
                                            <h3>Administrar Categorias</h3>
                                            <p>Gestiona las Categorias Disponibles</p>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-house"></i>
                                        <a href="{{route('welcome')}}">
                                        <div class="item-title">
                                            <h3>Home</h3>
                                            <p>Regresa a la Pagina Principal</p>
                                        </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button>
                            <i class="fa-solid fa-user"></i>Hola, {{ auth()->user()->name }}
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16">
                                <path
                                    d="M12.78 5.22a.749.749 0 0 1 0 1.06l-4.25 4.25a.749.749 0 0 1-1.06 0L3.22 6.28a.749.749 0 1 1 1.06-1.06L8 8.939l3.72-3.719a.749.749 0 0 1 1.06 0Z">
                                </path>
                            </svg>
                        </button>
                        <div class="dropdown__wrapper">
                            <div class="dropdown">
                                <ul class="list-items-with-description">
                                    <li>
                                        <i class="fa-solid fa-user-tie"></i>
                                        <div class="item-title">
                                            <h3>Rol</h3>
                                            @if (auth()->user()->idRol == 1)
                                            <p class="admin-info">Administrador</p>
                                            @endif
                                            @if (auth()->user()->idRol == 2)
                                            <p class="client-info">Cliente</p>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-address-card"></i>
                                        <a href="{{route('profile')}}">
                                        <div class="item-title">
                                            <h3>Perfil</h3>
                                            <p>Administra tu informacion</p>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-star"></i>
                                        <a href="{{route('favorites')}}">
                                        <div class="item-title">
                                            <h3>Mis Favoritos</h3>
                                            <p>Mira los Lugares que te gustaron</p>
                                        </div>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-house"></i>
                                        <a href="{{route('welcome')}}">
                                        <div class="item-title">
                                            <h3>Home</h3>
                                            <p>Regresa a la Pagina Principal</p>
                                        </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="action-buttons">
        <button class="Btn" onclick="showConfirmation()">
                        <div class="sign"><svg viewBox="0 0 512 512">
                                <path
                                    d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                                </path>
                            </svg></div>
                        <a class="text">Salir</a>
        </button>
        </div>
    </header>
    <div class="main">
        <div class="content">
            @yield('content')
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/ebacb183db.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>

<script>
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
</script>
</html>
