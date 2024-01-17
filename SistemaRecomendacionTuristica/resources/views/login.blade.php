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
            <form action="{{route('crearUsuario')}}" method="POST" id="form-reg">
            @csrf
            <div class="form-wrapper align-items-center">
					<div class="form sign-up">
						<div class="input-group">
                            <i class="fa-solid fa-user"></i>
							<input type="text" placeholder="Nombre" name="name" required>
						</div>
						<div class="input-group">
                            <i class="fa-solid fa-user"></i>
							<input type="text" placeholder="Apellidos" name="lastname" required>
						</div>
						<div class="input-group">
                            <i class="fa-solid fa-envelope"></i>
							<input type="email" placeholder="Correo Electronico" name="email" required>
						</div>
						<div class="input-group">
                            <i class="fa-solid fa-lock"></i>
							<input type="password" placeholder="Contraseña" name="password" required>
						</div>
						<button class="submit">
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
			<!-- Registro -->
			<!-- Inicio Sesion -->
			<div class="col align-items-center flex-col sign-in">
                <form action="{{route('iniciarSesion') }}" method="POST" id="form">
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
                            <input class="form-check-input" type="checkbox" name="remember" value="" id="form2Example33"/>
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
						Bienvenidos
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
						Registrarse
					</h2>
	
				</div>
			</div>
		</div>
	</div>
<style>

</style>

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