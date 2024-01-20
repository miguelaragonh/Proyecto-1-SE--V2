<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="{{ asset('assets/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/home.css') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/srtcr.png" type="image/x-icon">
    <title> @yield('title')</title>
</head>

<body>
    <div class="wrapper">
    <header class="menu__wrapper">
        <div class="menu__bar">
            <a href="#" title="Home" aria-label="home" class="logo">
                <img src="images/srtcr.png" alt="">
            </a>
            <nav>
                <ul class="navigation hide">
                    <li>
                        <button>
                            Features
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
                                        <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Previews</h3>
                                            <p>Zero config, more innovation</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 4l-8 4l8 4l8 -4l-8 -4" />
                                            <path d="M4 12l8 4l8 -4" />
                                            <path d="M4 16l8 4l8 -4" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Infrastructure</h3>
                                            <p>Always fast always online</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-nextjs" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 15v-6l7.745 10.65a9 9 0 1 1 2.255 -1.993" />
                                            <path d="M15 12v-3" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Next js</h3>
                                            <p>The native Next.js platform</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M3.6 9h16.8" />
                                            <path d="M3.6 15h16.8" />
                                            <path d="M11.5 3a17 17 0 0 0 0 18" />
                                            <path d="M12.5 3a17 17 0 0 1 0 18" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Edge Functions</h3>
                                            <p>Dynamic pages, static speed</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Analytics</h3>
                                            <p>Real-time insights, peak performance</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0" />
                                            <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                            <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Storage</h3>
                                            <p>Serverless storage for frontend</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button>
                            Features
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
                                        <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Previews</h3>
                                            <p>Zero config, more innovation</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 4l-8 4l8 4l8 -4l-8 -4" />
                                            <path d="M4 12l8 4l8 -4" />
                                            <path d="M4 16l8 4l8 -4" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Infrastructure</h3>
                                            <p>Always fast always online</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-nextjs" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 15v-6l7.745 10.65a9 9 0 1 1 2.255 -1.993" />
                                            <path d="M15 12v-3" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Next js</h3>
                                            <p>The native Next.js platform</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M3.6 9h16.8" />
                                            <path d="M3.6 15h16.8" />
                                            <path d="M11.5 3a17 17 0 0 0 0 18" />
                                            <path d="M12.5 3a17 17 0 0 1 0 18" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Edge Functions</h3>
                                            <p>Dynamic pages, static speed</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12h4l3 8l4 -16l3 8h4" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Analytics</h3>
                                            <p>Real-time insights, peak performance</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0" />
                                            <path d="M4 6v6a8 3 0 0 0 16 0v-6" />
                                            <path d="M4 12v6a8 3 0 0 0 16 0v-6" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Storage</h3>
                                            <p>Serverless storage for frontend</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button>
                            Features
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
                                        <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Previews</h3>
                                            <p>Zero config, more innovation</p>
                                        </div>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-nextjs" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 15v-6l7.745 10.65a9 9 0 1 1 2.255 -1.993" />
                                            <path d="M15 12v-3" />
                                        </svg>
                                        <div class="item-title">
                                            <h3>Next js</h3>
                                            <p>The native Next.js platform</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="action-buttons hide">
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
</script>
</html>
