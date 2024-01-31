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
                    <li class="breadcrumb-item active">CURSOS</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
                <div class="col-lg-6 col-sm-8">
                    <h2 style="padding-top:5px;">Cursos</h2>
                </div>
                <div class="col-lg-6 col-sm-4" style="text-align: right; padding-top:5px;">
                    <a href="{{ route('curso.create') }}" class="btn btn-success"><i class="fa fa-plus"></i><span>
                            Registrar</span></a>
                </div>
            </div>

            <div class="body" style="margin-top: -15px">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" cellspacing="0" id="basic-datatable">
                        <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Fecha</th>
                                <th style="text-align: center">Hora</th>
                                <th style="text-align: center">Expositor</th>
                                <th style="text-align: center">Descripcion</th>
                                <th style="text-align: center">PDF</th>
                                <th style="text-align: center">Video</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursos as $i => $curso)
                                <tr class="gradeA">
                                    <td style="text-align: center">{{ $i + 1 }}</td>
                                    <td style="text-align: center">{{ $curso->nombre }}</td>
                                    <td style="text-align: center">{{ $curso->fecha }}</td>
                                    <td style="text-align: center">{{ $curso->hora }} {{ $curso->periodo }}</td>
                                    <td style="text-align: center">{{ $curso->expositor }}</td>
                                    <td
                                        style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; width:215px;padding-top:27px;text-align:center;">
                                        {!! $curso->descripcion !!}</td>
                                    <td style="text-align: center">
                                        <div class="media-object">
                                            <a href="{{ '/pdf_img/' . $curso->pdf }}" target="_blank"><img
                                                    src="{{ asset('admin/assets/imagenes/pdf.png') }}" alt=""
                                                    width="30px"></a>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="media-object">
                                            <a href="{{ '/video_img/' . $curso->video }}" target="_blank"><img
                                                    src="{{ asset('admin/assets/imagenes/video.png') }}" alt=""
                                                    width="30px"></a>
                                        </div>
                                    </td>
                                    <td class="actions" style="padding: 20px !important;text-align:center;">
                                        <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-info"
                                            title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>&nbsp;
                                        <a href="#" class="btn btn-danger js-sweetalert button"
                                            data-id="{{ $curso->id }}" title="Eliminar">
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
            var link = "/amv/admin/curso/delete/";
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
