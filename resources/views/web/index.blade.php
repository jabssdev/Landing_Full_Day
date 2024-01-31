@extends('web.layouts.principal')

@section('css')
@endsection

@section('content')
@include('flash::message')
<!-- Start Main Banner Area -->
<div class="main-banner-area" id="slider">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12">
                <div class="main-banner-content">
                    <div class="banner-btn wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                        <button class="default-btn" data-toggle="modal" data-target="#exampleModal" style="margin-left:25px;">
                            <i class="bx bx-calendar"></i> Inscribete ahora<span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="text" value="{{ $slider->imagen_web }}" id="imagen_web" style="display: none;">
<!-- End Main Banner Area -->

<!-- Start About Us Area -->
<div class="about-us-area op-blogt50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-us-image">
                    <div class="image-one">
                        <img src="{{ asset('/banner_img/' . $banner->imagen) }}" alt="image" />
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about-us-content">
                    <span>{{ $banner->subtitulo }}</span>
                    <h3 style="font-weight:600">{{ $banner->titulo }}</h3>
                    <p style="font-size:14px;">
                        {!! $banner->descripcion !!}
                        {{-- Cuenta con una amplia experiencia laboral a nivel internacional en el campo de los negocios,
                            planeamiento estratégico, administración de empresas, sistemas logísticos, ingeniería
                            industrial, negocios internacionales y six sigma.<br><br>
                            Asimismo, posee una extensa experiencia en el rubro de la cadena de suministros,
                            específicamente en las áreas de Transporte, Oferta y Demanda, Gestión de Inventario,
                            Almacenamiento y Distribución, Servicios de Terceros (Outsourcing) y Gestión de
                            Contratos.<br><br>
                            Fue catedrático de varias universidades del Estado de Illinois y de La Florida University en
                            las áreas de las Cadenas de Suministro y Negocios Internacionales. --}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Us Area -->

<!-- Start Blog Area -->
<div class="blog-area events-schedules-area-with-color op-blogt50">
    <div class="container">
        <div class="section-title">
            <span>Ultimas Noticias</span>
            <h2><b>Nuestros Cursos</b></h2>
            <p>
                AMV Consultores, te brinda una variedad de programas de capacitación que son dictados por un staff
                de especialistas con más de 15 años de experiencia en campo. Nuestro objetivo es formar
                profesionales que hagan la diferencia y lograr tu éxito laboral.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="single-blog-box">
                    <div class="blog-image">
                        <a href="#">
                            <img src="{{ asset('./noticia_img/' . $noticiareciente->imagen) }}" alt="image" />
                        </a>
                        <div class="tag"><a href="#">En vivo</a></div>
                    </div>

                    <div class="blog-content">
                        <h3>
                            <a href="#">{{ $noticiareciente->titulo }}</a>
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                @foreach ($noticias as $noticia)
                @if ($noticiareciente->id != $noticia->id)
                <div class="single-side-blog">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <?php
                            $estilo = 'background-image: url(../amv/noticia_img/' . $noticia->imagen . ') !important;';
                            ?>
                            <div class="blog-image bg-1" style="{{ $estilo }}">
                                <a href="#">
                                    <img src="{{ asset('./amv/noticia_img/' . $noticia->imagen) }}" alt="image" />
                                </a>
                                <div class="tag">
                                    <a href="#">{{ $noticia->autor }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="blog-content">
                                <h3>
                                    <a href="#">{{ $noticia->titulo }}</a>
                                </h3>
                                <p>
                                    {!! $noticia->descripcion !!}
                                </p>

                                <ul class="blog-box-footer d-flex justify-content-between align-items-center">
                                    <li><i class="bx bx-calendar"></i> {{ $noticia->fecha }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="overview-btn" style="text-align:center;">
            <a href="#" class="default-btn"><i class="bx bx-chevron-right"></i> Ver más<span></span></a>
        </div>
    </div>
</div>
<!-- End Blog Area -->

<!-- Start Partner Area -->
<div class="partner-area ptb-50">
    <div class="container">
        <div class="partner-box">
            <div class="partner-slides owl-carousel owl-theme">
                @foreach ($sponsors as $sponsor)
                <div class="single-partner">
                    @if ($sponsor->ruta != null)
                    <a href="{{ $sponsor->ruta }}" target="_blank"><img src="{{ asset('./sponsor_img/' . $sponsor->imagen) }}" alt="image" /></a>
                    @else
                    <a href="#"><img src="{{ asset('./sponsor_img/' . $sponsor->imagen) }}" alt="image" /></a>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Partner Area -->

<!-- Start Overview Area -->
<div class="overview-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="overview-content">
                    <h3> <b>Diplomados Internacionales </b></h3>
                    <p>
                        Teóricos Prácticos
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="overview-btn">
                    <a href="#" class="default-btn"><i class="bx bx-arrow-to-right"></i>Ingresar<span></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Overview Area -->
<input type="hidden" value="{{ $validar }}" id="validar">
<input type="hidden" value="{{ $ano }}" id="ano">
<input type="hidden" value="{{ $dia }}" id="dia">
<input type="hidden" value="{{ $mes }}" id="mes">
<input type="hidden" value="{{ $hora }}" id="hora">
@endsection

@section('scripts')
<script>
    let imagen = $('#imagen_web').val();
    // let ruta = '../amv/slider_img/' + imagen;
    let ruta = '../slider_img/' + imagen
    $("#slider").css("background-image", `url(${ruta})`);
    console.log(ruta);
</script>

<!-- Contador -->
<script>
    function makeTimer() {
        var auxiliar = $('#validar').val();
        console.log(auxiliar);
        if (auxiliar == 'existe') {
            var nano = $('#ano').val();
            var ndia = $('#dia').val();
            var nmes = $('#mes').val();
            var nhora = $('#hora').val() + ":00";
            var endTime = new Date(nmes + ndia + ", " + nano + " " + nhora); // fecha y hora
            var endTime = Date.parse(endTime) / 1000;
            var now = new Date();
            var now = Date.parse(now) / 1000;
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - days * 86400) / 3600);
            var minutes = Math.floor(
                (timeLeft - days * 86400 - hours * 3600) / 60
            );
            var seconds = Math.floor(
                timeLeft - days * 86400 - hours * 3600 - minutes * 60
            );
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $("#days").html(days + "<span>Dias</span>");
            $("#hours").html(hours + "<span>Horas</span>");
            $("#minutes").html(minutes + "<span>Minutos</span>");
            $("#seconds").html(seconds + "<span>Segundos</span>");
        } else {
            $("#days").html(0 + "<span>Dias</span>");
            $("#hours").html(0 + "<span>Horas</span>");
            $("#minutes").html(0 + "<span>Minutos</span>");
            $("#seconds").html(0 + "<span>Segundos</span>");
        }
    }
    setInterval(function() {
        makeTimer();
    }, 0);
</script>
@endsection