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
:root {
    --primary-color: #4f6a98e6;
    --secondary-color: #3b547ee6;
    --black: #000000;
    --white: #ffffff;
    --gray: #efefef;
    --gray-2: #757575;
    }


@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

* {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html,
body {
    height: 100vh;
    overflow: hidden;
}

.bg-container{
    width: 100%;
    height: 100vh;
    position: absolute;
}

.bg-fondo,.bg-2,.bg-3,.bg-1{
    position: absolute;
    width: 100%;
    height: 100vh;
    animation: change 8s infinite;
}
.bg-2{
    animation-delay: 2s
}
.bg-3{
    animation-delay: 4s
}
.bg-1{
    animation-delay: 6s
}

@keyframes change{
    0%,100%{
        opacity: 1;
    }
    25%,50%,75%{
        opacity: 0;
    }
}


.container {
    position: relative;
    min-height: 100vh;
}

.row {
    display: flex;
    flex-wrap: wrap;
    height: 100vh;
}

.col {
    width: 50%;
}

.align-items-center {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.form-wrapper {
    width: 120%;
    max-width: 35rem;
}

.form {
    padding: 1rem;
    background-color: var(--white);
    border-radius: 1.5rem;
    width: 100%;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transform: scale(0);
    transition: 0.5s ease-in-out;
}

.input-group {
    position: relative;
    width: 100%;
    margin: 1rem 0;
}

.input-group i {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
    font-size: 1.4rem;
    color: var(--gray-2);
}

.input-group input {
    width: 100%;
    padding: 1rem 3rem;
    font-size: 1rem;
    background-color: var(--gray);
    border-radius: .5rem;
    border: 0.125rem solid var(--white);
    outline: none;
}

.input-group input:focus {
    border: 0.125rem solid var(--primary-color);
}

.form button {
    cursor: pointer;
    width: 100%;
    padding: .6rem 0;
    border-radius: .5rem;
    border: none;
    background-color: var(--primary-color);
    color: var(--white);
    font-size: 1.2rem;
    outline: none;
}

.form p {
    margin: 1rem 0;
    font-size: .7rem;
}

.flex-col {
    flex-direction: column;
}

.pointer {
    cursor: pointer;
}

.container.sign-in .form.sign-in,
.container.sign-up .form.sign-up {
    transform: scale(1);
}

.content-row {
    position: absolute;
    top: 0;
    left: 0;
    pointer-events: none;
    z-index: 6;
    width: 100%;
}

.text {
    margin: 4rem;
    color: var(--white);
}

.text h2 {
    font-size: 3.5rem;
    font-weight: 800;
    margin: 2rem 0;
    transition: 0.6s ease-in-out;
}

.text p {
    font-weight: 600;
    transition: 1s ease-in-out;
    transition-delay: .1s;
}

.img img {
    width: 30vw;
    transition: 1s ease-in-out;
    transition-delay: .4s;
}

.text.sign-in h2,
.text.sign-in p,
.img.sign-in img {
    transform: translateX(-250%);
}

.text.sign-up h2,
.text.sign-up p,
.img.sign-up img {
    transform: translateX(250%);
}

.container.sign-in .text.sign-in h2,
.container.sign-in .text.sign-in p,
.container.sign-in .img.sign-in img,
.container.sign-up .text.sign-up h2,
.container.sign-up .text.sign-up p,
.container.sign-up .img.sign-up img {
    transform: translateX(0);
}

.form-check{
    display: flex;
    justify-content: start;
    margin-top: 4px;
    margin-bottom: 4px;
    margin-left: 10px;
}

.form-check-input{
    margin-right: 5px;
    cursor:pointer;
}

/* BACKGROUND */

.container::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    height: 100vh;
    width: 300vw;
    transform: translate(35%, 0);
    background-image: linear-gradient(-45deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    transition: 0.5s ease-in-out;
    z-index: 6;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-bottom-right-radius: max(50vw, 50vh);
    border-top-left-radius: max(50vw, 50vh);
}

.container.sign-in::before {
    transform: translate(0, 0);
    right: 50%;
}

.container.sign-up::before {
    transform: translate(100%, 0);
    right: 50%;
}

/* RESPONSIVE */

@media (max-width: 456px){

.bg-container{
    display : none;
}

.container::before,
.container.sign-in::before,
.container.sign-up::before {
    height: 100vh;
    border-bottom-right-radius: 0;
    border-top-left-radius: 0;
    z-index: 0;
    transform: none;
    right: 0;
}

/* .container.sign-in .col.sign-up {
    transform: translateY(100%);
} */

.container.sign-in .col.sign-in,
.container.sign-up .col.sign-up {
    transform: translateY(0);
}

.content-row {
    align-items: flex-start !important;
}

.content-row .col {
    transform: translateY(0);
    background-color: unset;
}

.col {
    width: 100%;
    position: absolute;
    padding: 2rem;
    background-color: var(--white);
    border-top-left-radius: 2rem;
    border-top-right-radius: 2rem;
    transform: translateY(100%);
    transition: 1s ease-in-out;
}

.row {
    align-items: flex-end;
    justify-content: flex-end;
}

.form,
.social-list {
    box-shadow: none;
    margin: 0;
    padding: 0;
}

.text {
    margin: 0;
}

.text p {
    display: none;
}

.text h2 {
    margin: .5rem;
    font-size: 2rem;
}
}

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