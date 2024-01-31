<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">
        @php
            $x = $_SERVER['REQUEST_URI'];
            $a = 'home';
            $b = stripos($x, $a);
            $c = 'slider';
            $d = stripos($x, $c);
            $e = 'noticia';
            $f = stripos($x, $e);
            $g = 'banner';
            $h = stripos($x, $g);
            $i = 'sponsor';
            $j = stripos($x, $i);
            $k = 'curso';
            $l = stripos($x, $k);
            $m = 'contador';
            $n = stripos($x, $m);
            $o = 'aceptados';
            $p = stripos($x, $o);
            $q = 'pendientes';
            $r = stripos($x, $q);
            $s = 'rechazados';
            $t = stripos($x, $s);
            $u = 'historial';
            $v = stripos($x, $u);
            
            if ($d !== false || $f !== false || $h !== false || $j !== false) {
                $activoWeb = 'active';
                $activoEvento = '';
                $activoParticipante = '';
                $activoHome = '';
            } elseif ($l !== false || $n !== false) {
                $activoWeb = '';
                $activoEvento = 'active';
                $activoParticipante = '';
                $activoHome = '';
            } elseif ($p !== false || $r !== false || $t !== false || $v !== false) {
                $activoWeb = '';
                $activoEvento = '';
                $activoParticipante = 'active';
                $activoHome = '';
            } else {
                $activoWeb = '';
                $activoEvento = '';
                $activoParticipante = 'active';
                $activoHome = '';
            }
            
        @endphp
        @if (Auth::user()->rol == 'administrador')
            <li class="{{ $activoHome }}">
                <a href="{{ route('home.index') }}"><i class="icon-home"></i>
                    <span>INICIO</span></a>
            </li>

            <li class="{{ $activoWeb }}">
                <a href="javascript:;" class="has-arrow"><i class="icon-grid"></i><span>GESTION WEB</span></a>
                <ul>
                    <li>
                        <a href="{{ route('slider.index') }}"><span>Sliders</span></a>
                    </li>
                    <li>
                        <a href="{{ route('banner.index') }}"><span>Descripcion - Evento</span></a>
                    </li>
                    <li>
                        <a href="{{ route('noticia.index') }}"><span>Noticias</span></a>
                    </li>
                    <li>
                        <a href="{{ route('sponsor.index') }}"><span>Sponsor</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ $activoEvento }}">
                <a href="javascript:;" class="has-arrow"><i class="icon-graduation"></i><span>EVENTOS</span></a>
                <ul>
                    <li>
                        <a href="{{ route('curso.index') }}"><span>Evento</span></a>
                    </li>
                    <li>
                        <a href="{{ route('contador.index') }}"><span>Contador - evento</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ $activoParticipante }}">
                <a href="javascript:;" class="has-arrow"><i class="icon-users"></i><span>PARTICIPANTES</span></a>
                <ul>
                    <li>
                        <a href="{{ route('participante.finalizados') }}"><span>Registrados
                                ({{ App\Models\Participante::where('estado', 'aceptado')->count() }})</span></a>
                    </li>
                    <li>
                        <a href="{{ route('participante.pendientes') }}"><span>Pendientes
                                ({{ App\Models\Participante::where('estado', 'pendiente')->count() }})</span></a>
                    </li>
                    <li>
                        <a href="{{ route('participante.rechazados') }}"><span>Rechazados
                                ({{ App\Models\Participante::where('estado', 'rechazado')->count() }})</span></a>
                    </li>
                    <li>
                        <a href="{{ route('participante.historial') }}"><span>Reportes</span></a>
                    </li>
                </ul>
            </li>
        @elseif(Auth::user()->rol == 'participante')
            <li class="active">
                <a href="javascript:;" class="has-arrow"><i class="icon-grid"></i><span>Participante</span></a>
                <ul>
                    <li>
                        <a href="{{ route('participante.datos', Auth::user()->id_user) }}"><span>Información</span></a>
                    </li>
                    <li>
                        <a href="{{ route('participante.cursos', Auth::user()->id_user) }}"><span>Historial</span></a>
                    </li>
                </ul>
            </li>
        @elseif(Auth::user()->rol == 'certificador')
            <li class="active">
                <a href="javascript:;" class="has-arrow"><i class="icon-grid"></i><span>Participante</span></a>
                <ul>
                    <li>
                        <a href="{{ route('participante.certificados') }}"><span>Información</span></a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</nav>
