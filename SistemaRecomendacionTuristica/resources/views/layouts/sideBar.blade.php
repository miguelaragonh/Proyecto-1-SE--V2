<!DOCTYPE html>
<html lang="en">

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
            <a href="{{ url('/logout') }}"
                class="btn-logout">
                <i class="fa-solid fa-circle-xmark"></i> Cerrar Sesion</a>
        </nav>
<<<<<<< HEAD
        <div class="content">
            @yield('content')
        </div>
=======
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    @yield('content')
                    <h3>Bienvenidos a SRT CR</h3>
                </div>
            </div>
        </main>
>>>>>>> 9bbd8ad17c3a7197d47fd5fd217bc9e8e5ff3eb2
    </div>
</div>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    :root {
    --primary-color: #183d7c;
    --secondary-color: #2c4778;
    --black: #000000;
    --white: #ffffff;
    --gray: #efefef;
    --gray-2: #757575;
    }
*,
::after,
::before {
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
   background: rgb(0, 0, 0)
    background-repeat: no-repeat;
    background-position: center bottom;
    background-size: cover;
}

h3 {
    font-size: 1.2375rem;
    color: var(--black);
}

a {
    cursor: pointer;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

li {
    list-style: none;
}

/* Layout skeleton */

.wrapper {
    align-items: stretch;
    display: flex;
    width: 100%;
}

#sidebar {
    max-width: 264px;
    min-width: 264px;
    transition: all 0.35s ease-in-out;
    box-shadow: 0 0 35px 0 rgba(10, 10, 10, 0.5);
    border-right: 1px solid var(--primary-color);
    z-index: 1111;
}

.navbar{
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid var(--primary-color);
    box-shadow: 0 0 35px 0 rgba(10, 10, 10, 0.5);
    font-size: 18px;
}
.navbar span{
    color: var(--primary-color);
}
/* Sidebar collapse */

#sidebar.collapsed {
    margin-left: -264px;
}

.main {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
}

.sidebar-logo {
    padding: 1.15rem 1.5rem;
}

.sidebar-logo a {
    color: var(--black);
    font-size: 1.25rem;
    font-weight: 600;
}

.sidebar-nav {
    padding: 0;
}

.sidebar-header {
    color: #000000;
    font-size: .75rem;
    padding: 1.5rem 1.5rem .375rem;
}

a.sidebar-link {
    padding: .625rem 1.625rem;
    color: var(--black);
    position: relative;
    display: block;
    font-size: 1rem;
}

.sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
}

.sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
}

.content {
    width: 100%;
    height: 100%;
}

/* Responsive */

@media (min-width:768px) {
    .content {
        width: 100%;
    }
}
</style>


<script>
    const toggler = document.querySelector(".btn");
toggler.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});
</script>
<script src="https://kit.fontawesome.com/ebacb183db.js" crossorigin="anonymous"></script>
</body>
</html>