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
    <!-- VENDOR CSS -->

    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/color_skins.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/morrisjs/morris-1.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/chartist/css/chartist.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}" />
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
                    <li class="breadcrumb-item active">Reportes</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">


            <div class="body" style="margin-top: -15px">

                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                        class="fa fa-arrow-left"></i></a>Reportes</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index-1.html"><i class="icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Reportes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- GRAFICO -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2> <b>Participantes por mes</b></h2>
                            </div>
                            <div class="body">
                                <div id="bar-chart" class="ct-chart"></div>
                            </div>
                        </div>
                    </div>
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
    <!-- Javascript -->
    <script src="{{ asset('admin/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('admin/assets/bundles/chartist.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chartist/polar_area_chart.js') }}"></script>
    <!-- Polar Area Chart Js -->

    <script src="{{ asset('admin/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/charts/chartjs.js') }}"></script>
@endsection
