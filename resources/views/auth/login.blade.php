<!DOCTYPE html>
<html lang="en">
<!-- Copied from http://www.wrraptheme.com/templates/lucid/html/light/page-login.html by Cyotek WebCopy 1.8.0.652, martes, 28 de julio de 2020, 02:30:35 a.m -->

<head>
    <title>PYRUS</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template" />
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com" />

    <link rel="icon" href="{{ asset('admin/assets/icon.ico') }}" type="image/x-icon" />
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/color_skins.css') }}" />
</head>

<body class="theme-cyan">
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="{{ asset('admin/assets/imagenes/logoLogin.png') }}" alt="Pyrus"
                            style="width: 200px; height: auto" />
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Ingrese a su cuenta</p>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <select name="" id="rol" class="form-control">
                                    <option value="administrador">Administrador</option>
                                    <option value="usuario">Usuario</option>
                                    <option value="certificador">Certificador</option>
                                </select>
                            </div>
                            <form class="form-auth-small" method="POST" action="{{ route('admin.login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="text" class="form-control" id="correo" placeholder="Email"
                                        name="email" />
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="contrasena" placeholder="Password"
                                        name="password" />
                                </div>
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Dni</label>
                                    <input type="hidden" class="form-control" id="dni" placeholder="Dni"
                                        name="dni" />
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    INICIAR SESION
                                </button>
                                <br />

                                <div class="bottom">
                                    <span class="helper-text m-b-10">
                                        COPYRIGHT 2007 - 2021 <br />
                                        &copy; MARCA Y PERSONAJES
                                        REGISTRADOS
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $("#rol").change(function() {
            if (this.value == 'administrador' || this.value == 'usuario') {
                $('#correo').val('');
                $('#contrasena').val('');
                $('#correo').get(0).type = 'email';
                $('#contrasena').get(0).type = 'password';
                $('#dni').get(0).type = 'hidden';
            }
            if (this.value == 'certificador') {
                $('#correo').val('certificador@gmail.com');
                $('#contrasena').val('123456789');
                $('#correo').get(0).type = 'hidden';
                $('#contrasena').get(0).type = 'hidden';
                $('#dni').get(0).type = 'number';
            }
        });
    </script>

</body>
<!-- Copied from http://www.wrraptheme.com/templates/lucid/html/light/page-login.html by Cyotek WebCopy 1.8.0.652, martes, 28 de julio de 2020, 02:30:35 a.m -->

</html>
