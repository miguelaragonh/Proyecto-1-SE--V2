<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image"
        style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 150px;
          ">
    </div>
    <style>
        .form {
  display: flex;
  flex-direction: column;
  gap: 10px;
  max-width: 350px;
  padding: 20px;
  border-radius: 20px;
  position: relative;
}

.title {
  font-size: 28px;
  color: royalblue;
  font-weight: 600;
  letter-spacing: -1px;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}

.title::before,.title::after {
  position: absolute;
  content: "";
  height: 16px;
  width: 16px;
  border-radius: 50%;
  left: 0px;
  background-color: royalblue;
}

.title::before {
  width: 18px;
  height: 18px;
  background-color: royalblue;
}

.title::after {
  width: 18px;
  height: 18px;
  animation: pulse 1s linear infinite;
}

.message, .signin {
  color: rgba(88, 87, 87, 0.822);
  font-size: 14px;
}

.signin {
  text-align: center;
}

.signin a {
  color: royalblue;
}

.signin a:hover {
  text-decoration: underline royalblue;
}

.flex {
  display: flex;
  width: 100%;
  gap: 6px;
}

.form label {
  position: relative;
}

.form label .input {
  width: 100%;
  padding: 10px 10px 20px 10px;
  outline: 0;
  border: 1px solid rgba(105, 105, 105, 0.397);
  border-radius: 10px;
}

.form label .input + span {
  position: absolute;
  left: 10px;
  top: 15px;
  color: grey;
  font-size: 0.9em;
  cursor: text;
  transition: 0.3s ease;
}

.form label .input:placeholder-shown + span {
  top: 15px;
  font-size: 0.9em;
}

.form label .input:focus + span,.form label .input:valid + span {
  top: 30px;
  font-size: 0.7em;
  font-weight: 600;
}

.form label .input:valid + span {
  color: green;
}

.submit {
  border: none;
  outline: none;
  background-color: royalblue;
  padding: 10px;
  border-radius: 10px;
  color: #fff;
  font-size: 16px;
  transform: .3s ease;
}

.submit:hover {
  background-color: rgb(56, 90, 194);
}

@keyframes pulse {
  from {
    transform: scale(0.9);
    opacity: 1;
  }

  to {
    transform: scale(1.8);
    opacity: 0;
  }
}
    </style>

    <!-- Background image -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <div class="card mx-4 mx-md-5 shadow-5-strong align-items-center"
        style="
          margin-top: -90px;
          background: hsla(0, 0%, 90%, 0.5);
          backdrop-filter: blur(20px);
          ">
        <div class="card-body py-3 px-md-3 align-items-center">
            <div class="row d-flex justify-content-center align-items-center">

                    <form class="form" method="POST" action="{{route('crearUsuario')}}">
                        @csrf
                        <p class="title  align-items-center">Registrarme </p>
                        <p class="message  align-items-center"> </p>
                            <div class="flex">
                            <label>
                                <input required="" placeholder="" type="text" class="input" name="name" required>
                                <span>Nombre</span>
                            </label>

                            <label>
                                <input required="" placeholder="" type="text" class="input" name="lastname" required>
                                <span>Apellidos</span>
                            </label>
                        </div>

                        <label>
                            <input required="" placeholder="" type="email" class="input" name="email" required>
                            <span>Correo</span>
                        </label>

                        <label>
                            <input required="" placeholder="" type="password" class="input" name="password" required>
                            <span>Contraseña</span>
                        </label>
                        <button class="submit">Registrarme</button>
                        <p class="signin">Ya tienes una cuenta ? <a href="{{ route('login') }}">Inicia Sesión</a> </p>
                    </form>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->
