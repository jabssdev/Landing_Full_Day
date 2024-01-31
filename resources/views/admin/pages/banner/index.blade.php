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
                    <li class="breadcrumb-item active">Banner</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
                <div class="col-lg-6 col-sm-8">
                    <h2 style="padding-top:5px;">Banner</h2>
                </div>
                <div class="col-lg-6 col-sm-4" style="text-align: right; padding-top:5px;">
                    <a href="{{ route('banner.create') }}" class="btn btn-success"><i class="fa fa-plus"></i><span>
                            Registrar </span></a>
                </div>
            </div>

            <div class="body" style="margin-top: -15px">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" cellspacing="0" id="basic-datatable">
                        <thead>
                            <tr>
                                <th style="text-align:center;">#</th>
                                <th style="text-align:center;">Imagen</th>
                                <th style="text-align:center;">Subtitulo</th>
                                <th style="text-align:center;">Titulo</th>
                                <th style="text-align:center;">Descripcion</th>
                                <th style="text-align:center;">Ruta</th>
                                <th style="text-align:center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $i => $banner)
                                <tr class="gradeA">
                                    <td style="text-align: center">{{ $i + 1 }}</td>
                                    <td style="text-align:center;">
                                        <div class="media-object">
                                            <img src="{{ asset('/banner_img/' . $banner->imagen) }}" alt=""
                                                width="100px">
                                        </div>
                                    </td>
                                    <td style="text-align:center">
                                        @if ($banner->subtitulo != null)
                                            {{ $banner->subtitulo }}
                                        @else
                                            <span class="badge badge-dark">Sin subtítulo</span>
                                        @endif
                                    <td style="text-align: center">
                                        @if ($banner->titulo != null)
                                            {{ $banner->titulo }}
                                        @else
                                            <span class="badge badge-dark">Sin título</span>
                                        @endif
                                    <td
                                        style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical; width:140px;padding-top:40px;text-align:center;">
                                        {!! $banner->descripcion !!}</td>
                                    <td style="text-align:center;">
                                        @if ($banner->ruta != null)
                                            {{ $banner->ruta }}
                                        @else
                                            <span class="badge badge-dark">Sin ruta</span>
                                        @endif
                                    </td>
                                    <td class="actions" style="padding: 20px !important;text-align:center;">
                                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info"
                                            title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>&nbsp;
                                        <a href="#" class="btn btn-danger js-sweetalert button"
                                            data-id="{{ $banner->id }}" title="Eliminar">
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
            var link = "/admin/banner/delete/";
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
