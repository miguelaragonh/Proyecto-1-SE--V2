<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="{{asset('assets/sidebar.css')}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
</head>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar">
        <div class="h-100">
            <div class="sidebar-logo">
                <a href="{{ url('/home') }}">SRTCR</a>
            </div>
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Tools & Components
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-list pe-2"></i>
                        Profile
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                        aria-expanded="false" aria-controls="pages">
                        <i class="fa-regular fa-file-lines pe-2"></i>
                        Pages
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Analytics</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Ecommerce</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Crypto</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="fa-solid fa-sliders pe-2"></i>
                        Dashboard
                    </a>
                    <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Dashboard Analytics</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Dashboard Ecommerce</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                        aria-expanded="false" aria-controls="auth">
                        <i class="fa-regular fa-user pe-2"></i>
                        Auth
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-header">
                    Multi Level Nav
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
                        aria-expanded="false" aria-controls="multi">
                        <i class="fa-solid fa-share-nodes pe-2"></i>
                        Multi Level
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Main Component -->
    <div class="main m-0">
        <nav class="navbar navbar-expand px-3">
            <!-- Button for sidebar toggle -->
            <button class="btn" type="button" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="cs-btn">
            <a href="{{ url('/logout') }}"
                class="btn-logout">
                <i class="fa-solid fa-circle-xmark"></i> Cerrar Sesion</a>
            </div>
        </nav>
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
</body>

<script>
    const toggler = document.querySelector(".btn");
toggler.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});
</script>
<script src="https://kit.fontawesome.com/ebacb183db.js" crossorigin="anonymous"></script>
</body>
</html>