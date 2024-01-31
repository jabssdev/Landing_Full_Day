@extends('admin.layouts.permisos')
@section('styles')
    <style>
        .input-orden {
            width: 50px;
            margin: 5px;
        }
    </style>
    <link href="{{ asset('admin/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-8 col-sm-12">
                <h2><a href="javascript:void(0);" id="botonmenu" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                            id="otroboton" class="fa fa-arrow-left"></i></a> Dashboard</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active">Datos de Participante</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
                <div class="col-lg-6 col-sm-8">
                    <h2 style="padding-top:5px;">Datos de Participante</h2>
                </div>
            </div>

            <div class="body" style="margin-top: -15px">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" cellspacing="0" id="basic-datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Fotografía</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Apellido</th>
                                <th style="text-align: center">Correo</th>
                                <th style="text-align: center">Celular</th>
                                <th style="text-align: center">DNI</th>
                                <th style="text-align: center">Direccion</th>
                                <th style="text-align: center">Lugar</th>
                                <th style="text-align: center">Especialidad</th>
                                <th style="text-align: center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="gradeA">
                                <td style="text-align: center">{{ $participante->id }}</td>
                                <td style="text-align: center">
                                    <div class="media-object">
                                        <img src="{{ asset('/participante_img/' . $participante->imagen) }}" alt=""
                                            width="100px">
                                    </div>
                                </td>
                                <td style="text-align: center">{{ $participante->nombre }}</td>
                                <td style="text-align: center">{{ $participante->apellido }}</td>
                                <td style="text-align: center">{{ $participante->correo }}</td>
                                <td style="text-align: center">{{ $participante->celular }}</td>
                                <td style="text-align: center">{{ $participante->dni }}</td>
                                <td style="text-align: center">{{ $participante->direccion }}</td>
                                <td style="text-align: center">{{ $participante->lugar }}</td>
                                <td style="text-align: center">{{ $participante->especialidad }}</td>
                                <td style="text-align: center"> <span class="badge badge-warning">Activo</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.button', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var link = "/admin/participante/delete/";
            swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás recuperar este registro!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "get",
                        url: link + id,
                        success: function(data) {
                            Swal.fire(
                                'Eliminado!',
                                'El registro ha sido eliminado.',
                                'success')
                            location.reload();
                        },
                    });
                }
            });


        });
    </script>
@endsection
