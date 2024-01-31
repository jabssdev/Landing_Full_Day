<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min-1.css') }}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/animate.min-1.css') }}" />
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/meanmenu-1.css') }}" />
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/boxicons.min-1.css') }}" />
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/flaticon-1.css') }}" />
    <!-- Odometer CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/odometer.min-1.css') }}" />
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/slick.min-1.css') }}" />
    <!-- Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min-1.css') }}" />
    <!-- Carousel Default CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/owl.theme.default.min-1.css') }}" />
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/magnific-popup.min-1.css') }}" />
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style-1.css') }}" />
    <!-- Dark CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/dark-1.css') }}" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/responsive-1.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <!-- whattsapp -->
    <link rel="stylesheet" href="{{ asset('web/js/plugin/whatsapp-chat-support.css') }}" />
    <link rel="stylesheet" href="{{ asset('web/js/plugin/components/Font Awesome/css/font-awesome.min.css') }}" />

    <title>AMV - Consultores Perú</title>

    <link rel="icon" type="image/png" href="{{ asset('web/images/web/favicon.png') }}" />

    @yield('css')
</head>

<body>
    <!-- Start Preloader Area -->
    <div class="preloader">
    </div>
    <!-- End Preloader Area -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="index.html">
                            <img src="{{ asset('web/images/web/logo superior.png') }}" class="black-logo"
                                alt="image" />
                            <img src="{{ asset('web/images/web/logo superior2.png') }}" class="white-logo"
                                alt="image" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{ asset('web/images/web/logo superior.png') }}" class="black-logo" alt="image" />
                        <img src="{{ asset('web/images/web/logo superior2.png') }}" class="white-logo"
                            alt="image" />
                    </a>

                    <div class="collapse navbar-collapse">
                        <div class="m-auto2"></div>
                        <div class="others-options d-flex align-items-center">
                            <div class="option-item op-menu2">
                                <button class="default-btn" data-toggle="modal" data-target="#exampleModal"
                                    style="margin-bottom: 2px;">
                                    <i class="bx bx-arrow-to-right"></i> Inscribete ahora<span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <!-- Start Speakers Details Area -->
    <div class="speakers-details-area ptb-100 events-schedules-area-with-color">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md12">
                    <div class="speakers-details-content" style="padding-left: 0px">
                        <div>
                            <div class="speakers-details-image" style="text-align: center">
                                @if ($participante->imagen == null)
                                    <img src="{{ asset('web/images/web/socio_1658020033.jpg') }}" alt="img"
                                        style="border-radius: 10px;width: 200px;">
                                @else
                                    <img src="{{ asset('/participante_img/' . $participante->imagen) }}" alt="img"
                                        style="border-radius: 10px;width: 200px;">
                                @endif
                            </div>
                            <br />
                            <div style="text-align: center">
                                <h4 class="vp-date">
                                    <b class="vp-date2">Nombres:</b> {{ $participante->nombre }}
                                </h4>
                                <h4 class="vp-date">
                                    <b class="vp-date2">Apellidos:</b>
                                    {{ $participante->apellido }}
                                </h4>
                                <h4 class="vp-date">
                                    <b class="vp-date2">Correo:</b>
                                    {{ $participante->correo }}
                                </h4>
                                <h4 class="vp-date">
                                    <b class="vp-date2">Celular:</b>
                                    {{ $participante->celular }}
                                </h4>
                            </div>
                            <br />
                            <div class="overview-btn" style="text-align: center">
                                <a href="https://fitpego.com/amv/administrador" class="default-btn"><i
                                        class="bx bx-user"></i>Ingresar<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="order-details">
                        <h3 class="title">Mis cursos</h3>

                        <div class="order-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">#</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Fecha</th>
                                        <th style="text-align: center">Hora</th>
                                        <th style="text-align: center">Expositor</th>
                                        <th style="text-align: center">Descripcion</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="product-name" style="text-align: center">1</td>
                                        <td class="product-name" style="text-align: center">Curso1</td>
                                        <td class="product-name" style="text-align: center">23/05/2022</td>
                                        <td class="product-name" style="text-align: center">9:00 am</td>
                                        <td class="product-name" style="text-align: center">Juan Fernandez</td>
                                        <td class="product-name" style="text-align: center">Descripcion1</td>
                                    </tr>
                                    <tr>
                                        <td class="product-name" style="text-align: center">2</td>
                                        <td class="product-name" style="text-align: center">Curso2</td>
                                        <td class="product-name" style="text-align: center">05/07/2022</td>
                                        <td class="product-name" style="text-align: center">9:00 am</td>
                                        <td class="product-name" style="text-align: center">Juan Fernandez</td>
                                        <td class="product-name" style="text-align: center">Descripcion3</td>
                                    </tr>
                                    <tr>
                                        <td class="product-name" style="text-align: center">3</td>
                                        <td class="product-name" style="text-align: center">Curso3</td>
                                        <td class="product-name" style="text-align: center">28/10/2022</td>
                                        <td class="product-name" style="text-align: center">9:00 am</td>
                                        <td class="product-name" style="text-align: center">Juan Fernandez</td>
                                        <td class="product-name" style="text-align: center">Descripcion3</td>
                                    </tr>
                                    <tr>
                                        <td class="product-name" style="text-align: center">4</td>
                                        <td class="product-name" style="text-align: center">Curso4</td>
                                        <td class="product-name" style="text-align: center">15/11/2022</td>
                                        <td class="product-name" style="text-align: center">9:00 am</td>
                                        <td class="product-name" style="text-align: center">Juan Fernandez</td>
                                        <td class="product-name" style="text-align: center">Descripcion4</td>
                                    </tr>
                                    <tr>
                                        <td class="product-name" style="text-align: center">5</td>
                                        <td class="product-name" style="text-align: center">Curso5</td>
                                        <td class="product-name" style="text-align: center">02/12/2022</td>
                                        <td class="product-name" style="text-align: center">9:00 am</td>
                                        <td class="product-name" style="text-align: center">Juan Fernandez</td>
                                        <td class="product-name" style="text-align: center">Descripcion5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Speakers Details Area -->

    <footer class="footer-area pt-100 pb-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="widget-logo">
                            <a href="index.html">
                                <img src="{{ asset('web/images/web/logo footer.png') }}" class="black-logo foo-logo"
                                    alt="image" />
                                <img src="{{ asset('web/images/web/logo footer.png') }}" class="white-logo foo-logo"
                                    alt="image" />
                            </a>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Quienes somos</h3>
                        <p>
                            Somos una empresa peruana, constituida en el 2013 y estamos inmersos en proporcionar un
                            servicio innovador y diferenciado que genere valor en cada uno de nuestros clientes y nos
                            permita ser sus socios estratégicos, trabajando de manera conjunta hasta alcanzar los
                            objetivos deseados.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Horario de Atención</h3>
                        <p>
                            <b>De Lunes – Viernes</b> <br>
                            Mañana: 9:00am a 1:00pm<br>
                            Tarde: 3:00pm a 7:00pm<br><br>
                            <b>Sábados</b><br>

                            Mañana: 9:00am a 1:00pm<br>
                            Tarde: 3:00pm a 6:00pm<br>
                        </p>

                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Quick Contact</h3>

                        <ul class="widget-info">
                            <li>
                                <i class="bx bxs-map"></i>
                                Jr. Pizarro N° 478 – Of. 103 – Plaza de Armas de Trujillo.
                            </li>
                            <li>
                                <i class="bx bxs-phone"></i>
                                <a href="tel:044776382">044 776382</a>
                            </li>
                            <li>
                                <i class="bx bxs-phone"></i>
                                <a href="tel:51992354927">992354927|983468139</a>
                            </li>
                            <li>
                                <i class="bx bx-envelope-open"></i>
                                <a
                                    href="/cdn-cgi/l/email-protection#9bebf7f4f5f0dbfcf6faf2f7b5f8f4f6"><span>info@amvconsultoresperu.com</span></a>
                            </li>
                        </ul>

                        <ul class="widget-social">

                            <li>
                                <a href="https://www.facebook.com/amvdiplomados/" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/amvconsultores/" target="_blank">
                                    <i class="bx bxl-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/amvconsultores/" target="_blank">
                                    <i class="bx bxl-instagram-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCXsQYrplv9WJvstP3v2w5TQ" target="_blank">
                                    <i class="bx bxl-youtube"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Start Copyright Area -->
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <p>
                            Copyright @
                            <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min-1.js"></script>
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            AMV CONSULTORES S.A.C. | Todos los derechos reservados
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->

    <!-- Start Modal Area -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header" style="background-color: #0f4db2;border-radius: 8px 8px 0 0;">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #fff">Inscripción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:#fff">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('participante.web.store') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-form-label" style="color: black">Nombre:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bxs-user"></i></span>
                                </div>
                                <input type="text" class="form-control time24" placeholder="Ejm: Juan Carlos"
                                    name="nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" style="color: black">Apellido:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bxs-user"></i></span>
                                </div>
                                <input type="text" class="form-control time24"
                                    placeholder="Ejm: Rodriguez Fernandez" name="apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" style="color: black">Correo:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bxs-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control time24"
                                    placeholder="Ejm:example@example.com" name="correo">
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 30px;">
                            <label class="col-form-label" style="color: black">Celular:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bxs-phone"></i></span>
                                </div>
                                <input type="number" class="form-control time24" placeholder="Ejm: +00 000 000 000"
                                    name="celular">
                            </div>
                        </div>
                        <div class="modal-footer"
                            style="justify-content: center;padding-bottom: 0px;padding-top: 13px;">
                            <button type="submit" class="btn btn-primary"
                                style="padding: 6px 30px;background-color: #fc5a1b;border-color: #fc5a1b;">Inscribirse</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                style="padding: 6px 30px">
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Area -->

    <!-- Start Whattsap Area -->
    <div class="whatsapp_chat_support wcs_fixed_right" id="example_3">
        <div class="wcs_button_label">Cuál es tu consulta?</div>
        <div class="wcs_button wcs_button_circle">
            <span class="fa fa-whatsapp"></span>
        </div>

        <div class="wcs_popup">
            <div class="wcs_popup_close">
                <span class="fa fa-close"></span>
            </div>

            <div class="wcs_popup_header">
                <span class="fa fa-whatsapp"></span>
                <strong>Atención al Cliente</strong>

                <div class="wcs_popup_header_description">Necesitas Ayuda?</div>
            </div>

            <div class="wcs_popup_input" data-number="51992354927">
                <input type="text" placeholder="Escribenos!" id="enviarMessage"
                    style="height: 30px; border: none" />
                <i class="fa fa-play"></i>
            </div>
            <div class="wcs_popup_avatar">
                <img src="{{ asset('web/images/web/person_5.jpg') }}" alt="" />
            </div>
        </div>
    </div>
    <!-- End Whattsap Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="bx bx-chevron-up"></i>
    </div>
    <!-- End Go Top Area -->

    <!-- Jquery Slim JS -->
    <script src="{{ asset('web/js/jquery.min-1.js') }}"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="{{ asset('web/js/bootstrap.bundle.min-1.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('web/js/jquery.meanmenu-1.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('web/js/owl.carousel.min-1.js') }}"></script>
    <!-- Jquery Appear JS -->
    <script src="{{ asset('web/js/jquery.appear-1.js') }}"></script>
    <!-- Odometer JS -->
    <script src="{{ asset('web/js/odometer.min-1.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('web/js/slick.min-1.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('web/js/jquery.magnific-popup.min-1.js') }}"></script>
    <!-- Ajaxchimp JS -->
    <script src="{{ asset('web/js/jquery.ajaxchimp.min-1.js') }}"></script>
    <!-- Form Validator JS -->
    <script src="{{ asset('web/js/form-validator.min-1.js') }}"></script>
    <!-- Contact JS -->
    <script src="{{ asset('web/js/contact-form-script-1.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('web/js/wow.min-1.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('web/js/main-1.js') }}"></script>
    <!-- Click derecho -->
    <script type="text/javascript">
        document.oncontextmenu = function() {
            return false;
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        $("#myModal").on("shown.bs.modal", function() {
            $("exampleModal").trigger("focus");
        });
    </script>
    <!-- whattsapp -->
    <script src="{{ asset('web/js/plugin/components/moment/moment.min.js') }}"></script>
    <script src="{{ asset('web/js/plugin/components/moment/moment-timezone-with-data-10-year-range.min.js') }}"></script>
    <script src="{{ asset('web/js/plugin/whatsapp-chat-support.js') }}"></script>
    <script>
        $("#example_3").whatsappChatSupport({
            defaultMsg: "",
        });
    </script>
    @yield('scripts')
</body>

</html>
