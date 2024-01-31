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
                    <li class="breadcrumb-item active">Historial de Participante</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="header row">
                <div class="col-lg-6 col-sm-8">
                    <h2 style="padding-top:5px;">Historial de Participante</h2>
                </div>
                <div class="col-lg-6 col-sm-4" style="text-align: right; padding-top:5px;">
                    <a href="{{ route('curso.create.participante', Auth::user()->id_user) }}" class="btn btn-success"><i
                            class="fa fa-plus"></i><span>
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
                                <th style="text-align: center">Cert. AMV</th>
                                <th style="text-align: center">Cert. C. I.</th>
                                <th style="text-align: center">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $i => $dato)
                                <tr class="gradeA">
                                    <td class="product-name" style="text-align: center">{{ $i + 1 }}</td>
                                    <td class="product-name" style="text-align: center">{{ $dato->curso->nombre }}</td>
                                    <td class="product-name" style="text-align: center">{{ $dato->curso->fecha }}</td>
                                    <td class="product-name" style="text-align: center">{{ $dato->curso->hora }}
                                        {{ $dato->curso->periodo }}</td>
                                    <td class="product-name" style="text-align: center">{{ $dato->curso->expositor }}</td>
                                    <td
                                        style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical; width:215px;padding-top:16px;text-align:center;">
                                        {!! $dato->curso->descripcion !!}</td>
                                    <td style="text-align: center">
                                        @if ($dato->curso->pdf != null)
                                            <div class="media-object">
                                                <a href="{{ '/amv/pdf_img/' . $dato->curso->pdf }}" target="_blank"><img
                                                        src="{{ asset('admin/assets/imagenes/pdf.png') }}" alt=""
                                                        width="30px"></a>
                                            </div>
                                        @else
                                            <span class="badge badge-dark">Sin pdf</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($dato->curso->video != null)
                                            <div class="media-object">
                                                <a href="{{ '/amv/video_img/' . $dato->curso->video }}"
                                                    target="_blank"><img
                                                        src="{{ asset('admin/assets/imagenes/video.png') }}" alt=""
                                                        width="30px"></a>
                                            </div>
                                        @else
                                            <span class="badge badge-dark">Sin video</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        <div class="media-object">
                                            <a href="javascript:;"><img
                                                    src="{{ asset('admin/assets/imagenes/certificado.png') }}"
                                                    alt="" width="30px"></a>
                                        </div>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="media-object">
                                            <a href="javascript:;"><img
                                                    src="{{ asset('admin/assets/imagenes/certificado.png') }}"
                                                    alt="" width="30px"></a>
                                        </div>
                                    </td>
                                    <td style="text-align: center"> <span class="badge badge-success">Terminado</span></td>
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
@endsection
