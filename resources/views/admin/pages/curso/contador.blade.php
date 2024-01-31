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
                    <li class="breadcrumb-item">INICIO</li>
                    <li class="breadcrumb-item active">CONTADOR</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
                <div class="col-lg-6 col-sm-8">
                    <h2 style="padding-top:5px;">Contador</h2>
                </div>
                <div class="col-lg-6 col-sm-4" style="text-align: right; padding-top:5px;">
                    <a href="{{ route('contador.create') }}" class="btn btn-success"><i class="fa fa-plus"></i><span>
                            Registrar</span></a>
                </div>
            </div>

            <div class="body" style="margin-top: -15px">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" cellspacing="0" id="basic-datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Evento</th>
                                <th style="text-align: center">Fecha</th>
                                <th style="text-align: center">Hora</th>
                                <th style="text-align:center;">Estado</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contadores as $i => $contador)
                                <tr class="gradeA">
                                    <td style="text-align: center">{{ $i + 1 }}</td>
                                    <td style="text-align: center">{{ $contador->nombre }}</td>
                                    <td style="text-align: center">{{ $contador->fecha }}</td>
                                    <td style="text-align: center">{{ $contador->hora }}</td>
                                    <td style="text-align: center">
                                        @if ($contador->estado == 'HABILITADO')
                                            <span class="badge badge-success">{{ $contador->estado }}</span>
                                        @elseif($contador->estado == 'DESHABILITADO')
                                            <span class="badge badge-danger"
                                                style="color: #676767">{{ $contador->estado }}</span>
                                        @endif
                                    </td>
                                    <td class="actions" style="padding: 20px !important;text-align:center;">
                                        <a href="{{ route('contador.edit', $contador->id) }}" class="btn btn-info"
                                            title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>&nbsp;
                                        @if ($contador->estado == 'DESHABILITADO' && $habilitado < 1)
                                            <a href="{{ route('contador.iniciar', $contador->id) }}"
                                                class="btn btn-success" title="Iniciar Contador">
                                                <i class="fa fa-play"></i>
                                            </a>&nbsp;
                                        @elseif($contador->estado == 'HABILITADO')
                                            <a href="{{ route('contador.detener', $contador->id) }}" class="btn btn-danger"
                                                title="Detener Contador">
                                                <i class="fa fa-stop"></i>
                                            </a>&nbsp;
                                        @endif
                                        <a href="#" class="btn btn-danger js-sweetalert button"
                                            data-id="{{ $contador->id }}" title="Eliminar">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
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
            var link = "/amv/admin/contador/delete/";
            // var link = "/amv/admin/contador/delete/";
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
