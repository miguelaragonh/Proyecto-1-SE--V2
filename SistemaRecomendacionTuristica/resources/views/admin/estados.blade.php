@extends('layouts.tables')
@if ($estados->isEmpty())
    <h3>No existen estados agregados</h3>
@else
    @section('thead')
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Accion</th>
        </tr>
    @endsection
    @section('tbody')
    @foreach ($estados as $estado)<tr>
            <td>{{ $estado->id }} </td>
            <td>{{ $estado->nombre }} </td>
            <td>{{ $estado->descripcion }} </td>
            <td>
                <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                <a href=""><i class="fa-solid fa-trash"></i></i></a>
            </td>
        </tr>
        @endforeach

    @endsection
    @endif
    @section('modal-title', 'Formulario de Estados')
    @section('modal-tbody')
        <style>
            .form {
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 100%;
                /* Ajuste para ocupar todo el ancho del modal */
                max-width: none;
                /* Para ignorar el límite máximo de ancho */
                background-color: #fff;
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

            .title::before,
            .title::after {
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

            .message,
            .signin {
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

            .form label .input+span {
                position: absolute;
                left: 10px;
                top: 15px;
                color: grey;
                font-size: 0.9em;
                cursor: text;
                transition: 0.3s ease;
            }

            .form label .input:placeholder-shown+span {
                top: 15px;
                font-size: 0.9em;
            }

            .form label .input:focus+span,
            .form label .input:valid+span {
                top: 0px;
                font-size: 0.7em;
                font-weight: 600;
            }

            .form label .input:valid+span {
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
                cursor: pointer;
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
        <form class="form text-center">
            <label>
                <input class="input" type="text" placeholder="" required="">
                <span>Firstname</span>
            </label>
            <label>
                <input class="input" type="text" placeholder="" required="">
                <span>Lastname</span>
            </label>
            <label>
                <input class="input" type="email" placeholder="" required="">
                <span>Email</span>
            </label>

            <label>
                <input class="input" type="password" placeholder="" required="">
                <span>Password</span>
            </label>
            <label>
                <input class="input" type="password" placeholder="" required="">
                <span>Confirm password</span>
            </label>
            <button type="button" class="btn btn-primary">Agrergar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>

        </form>
    @endsection
