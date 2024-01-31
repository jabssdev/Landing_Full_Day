<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas">
                <i class="lnr lnr-menu fa fa-bars"></i>
            </button>
        </div>

        <div class="navbar-brand">
            <a href="{{ route('home.index') }}"><img src="{{ asset('admin/assets/imagenes/logoadmin.png') }}"
                    class="img-responsive logo" style="width:100%;height:100%;" /></a>
        </div>

        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('admin.login.get') }}" class="icon-menu"><i class="icon-login"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
