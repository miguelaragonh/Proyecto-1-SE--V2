@extends('layouts.sideBar')
@section('title')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script defer src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/table.css') }}">
    <div class="container">
        <br>
        <div class="card text-center">
            <br>
            <h5>@yield('titulo')</h5>
            <div class="card-head text-center">
                <br>
                @yield('btnNuevo')
                @yield('nodata')
            </div>
            <div class="card-body">
                <table id="myTable" class="table table-striped" style="width:100%">

                    <thead>
                        @yield('thead')
                    </thead>
                    <tbody>
                        @yield('tbody')
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var datosDesdeServidor = document.getElementById('nodatos');

            // Verifica si hay datos antes de inicializar DataTables
            if (!datosDesdeServidor) {
                $('#myTable').DataTable({
                    responsive: true,
                    language: {
                        "url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
                    }
                });
            }
        });
    </script>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">@yield('modal-title')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center text-center">
                    @yield('modal-tbody')
                </div>
            </div>
        </div>
    </div>
@endsection
