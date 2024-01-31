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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
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
                    <li class="breadcrumb-item active">Registrar Participante</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Registrar Participante</h2>
                </div>
                <div class="body">
                    <div class="form-group">
                        <div class="row clearfix">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label>Buscar por DNI:</label>
                                <input type="text" name="dni" class="form-control" placeholder="Digite el DNI..."
                                    id="denei" required>
                            </div>
                            <div class="col-md-3">
                                <label style="color: transparent">.</label> <br>
                                @csrf
                                <button class="btn btn-primary" onclick="consulta()" type="button">Buscar</button>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('participante.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <label>Curso</label>
                                    <select name="id_curso" class="form-control">
                                        @foreach ($cursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombres">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">

                                <div class="col-md-6">
                                    <label>Apellido</label>
                                    <input type="text" name="apellido" class="form-control" required id="apellidos">
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="correo" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">

                                <div class="col-md-6">
                                    <label>Celular</label>
                                    <input type="number" name="celular" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>DNI</label></label>
                                    <input type="number" name="dni" class="form-control" id="eldni" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">

                                <div class="col-md-6">
                                    <label>Direccion</label>
                                    <input type="text" name="direccion" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Lugar de Procedendia</label>
                                    <input type="text" name="lugar" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">

                                <div class="col-md-6">
                                    <label>Especialidad</label>
                                    <input type="text" name="especialidad" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label>Pagos</label>
                                    <select name="pagos" class="form-control">
                                        <option value="Sin pago">--Seleccionar--</option>
                                        <option value="Partes">Partes</option>
                                        <option value="Total">Totalidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <label>Fotografía</label>
                                    <input type="file" name="imagen" data-allowed-file-extensions='jpg png'
                                        id="input-file-now" class="dropify">
                                </div>

                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a type="button" href="{{ route('participante.finalizados') }}"
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
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function consulta() {
            var dni = $('#denei').val();
            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/admin/consultar-reniec/' + dni)
                .then(function(response) {

                    toastr.info('Persona encontrada');
                    $("#nombres").val(response.data.nombres);
                    $("#apellidos").val(response.data.apellidoPaterno + '' + response.data.apellidoMaterno);
                    $("#eldni").val(response.data.numeroDocumento);
                })
                .catch(function(error) {
                    console.log(error);
                    toastr.error('Persona no encontrada');
                });

        }
    </script>
@endsection
