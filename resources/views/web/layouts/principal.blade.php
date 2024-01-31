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

    @include('web.layouts.header')
    @yield('content')
    @include('web.layouts.footer')

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
                    <form action="{{ route('participante.web.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control time24" placeholder="Ejm: Rodriguez Fernandez"
                                    name="apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" style="color: black">Correo:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bxs-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control time24" placeholder="Ejm:example@example.com"
                                    name="correo">
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
                            @if ($evento == 'No')
                                <label class="col-form-label" style="color: black">No existe un evento
                                    actualmente...</label>
                            @else
                                <input type="hidden" value="{{ $evento->id }}" name="id_curso">
                                <label class="col-form-label" style="color: black;display:none;">Evento actual:
                                    <b>{{ $evento->nombre }}</b>
                                </label>
                                <button type="submit" class="btn btn-primary"
                                    style="padding: 6px 30px;background-color: #fc5a1b;border-color: #fc5a1b;">Inscribirse</button>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="padding: 6px 30px">
                                    Cancelar
                                </button>
                            @endif
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
