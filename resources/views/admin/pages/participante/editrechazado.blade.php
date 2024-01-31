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
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropify/css/dropify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/summernote/dist/summernote.css') }}" />
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
                    <li class="breadcrumb-item active">Editar Participante</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Editar Participante</h2>
                </div>
                <div class="body">
                    <form action="{{ route('participante.rechazado.update', $participante->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Curso</label>
                                    <select name="id_curso" class="form-control">
                                        <option value="{{ $participante->curso->id }}" selected>
                                            {{ $participante->curso->nombre }}</option>
                                        @foreach ($cursos as $curso)
                                            @if ($curso->nombre != $participante->curso->nombre)
                                                <option value="{{ $curso->id }}">{{ $curso->nombre }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required
                                        value="{{ $participante->nombre }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Apellido</label>
                                    <input type="text" name="apellido" class="form-control" required
                                        value="{{ $participante->apellido }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="correo" class="form-control" required
                                        value="{{ $participante->correo }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Celular</label>
                                    <input type="number" name="celular" class="form-control"
                                        value="{{ $participante->celular }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>DNI</label></label>
                                    <input type="number" name="dni" class="form-control" required
                                        value="{{ $participante->dni }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Direccion</label>
                                    <input type="text" name="direccion" class="form-control"
                                        value="{{ $participante->direccion }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Lugar de Procedendia</label>
                                    <input type="text" name="lugar" class="form-control"
                                        value="{{ $participante->lugar }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Especialidad</label>
                                    <input type="text" name="especialidad" class="form-control"
                                        value="{{ $participante->especialidad }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Fotografía</label>
                                    <input type="file" name="imagen" data-allowed-file-extensions='jpg png'
                                        id="input-file-now" class="dropify"
                                        data-default-file="{{ asset('/participante_img/' . $participante->imagen) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label>Pagos</label>
                                    <select name="pagos" class="form-control">
                                        <option value="{{ $participante->pagos }}" selected>{{ $participante->pagos }}
                                        </option>
                                        <option value="Partes">Partes</option>
                                        <option value="Total">Totalidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a type="button" href="{{ route('participante.rechazados') }}"
                            class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/assets/vendor/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/forms/dropify.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/summernote/dist/summernote.js') }}"></script>
@endsection
