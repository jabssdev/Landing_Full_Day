<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('admin/assets/imagenes/perfil.jpg') }}" class="rounded-circle user-photo"
                alt="User Profile Picture" />
            <div class="dropdown">
                <span>Bienvenido,</span>
                <a href="javascript:void(0);" class="user-name"
                    data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong>
                </a>
            </div>
            <hr />

        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#question"><i class="icon-question"></i></a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                @yield('menu')
            </div>
        </div>
    </div>
</div>
