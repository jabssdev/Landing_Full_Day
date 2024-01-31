@extends('admin.layouts.permisos')
@section('styles')
<style>
    .input-orden {
        width: 50px;
        margin: 5px;
    }
</style>

@endsection
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2><a href="javascript:void(0);" id="botonmenu" class="btn btn-xs btn-link btn-toggle-fullwidth"><i id="otroboton" class="fa fa-arrow-left"></i></a> Dashboard</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Inicio</li>
                <li class="breadcrumb-item active">Registrar Contador</li>
            </ul>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Registrar Contador</h2>
            </div>
            <div class="body">
                <form action="{{ route('contador.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row clearfix">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label>Evento</label>
                                <select name="id_curso" class="form-control" id="curso">
                                    <option value="">--Seleccionar--</option>
                                    @foreach ($cursos as $curso)
                                    <option value="{{ $curso->id }}">{{ $curso->nombre }}
                                    </option>
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
                                <label>Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row clearfix">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <label>Hora</label>
                                <input type="time" name="hora" id="hora" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a type="button" href="{{ route('contador.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts') 


<script>
    $('#curso').change(function() {
        // Obtiene el valor seleccionado
        var id_curso = $(this).val();
        $.ajax({
            url: '/admin/obtener-curso/' + id_curso, // Reemplaza '/obtener-curso/' con la ruta correcta en tu aplicación
            method: 'GET',
            success: function(curso) {
                // Muestra el valor en la consola
                $('#fecha').val(curso['fecha']);
                $('#hora').val(curso['hora']);
                
            },
            error: function(error) {
                console.error('Error al obtener el curso:', error);
            }
        });


    });
</script>
@endsection