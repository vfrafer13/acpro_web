<div class="sidebar-wrapper">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text">
            ACPRO Admin
        </a>
    </div>

    <ul class="nav">
        <li
            @if (Request::is('/'))
                class="active"
            @endif
        >
            <a href="{{ url('/') }}">
                <i class="ti-home"></i>
                <p>Inicio</p>
            </a>
        </li>
        <li
            @if (Request::is('events') || Request::is('events/*'))
                class="active"
            @endif
        >
            <a href="{{ url('events') }}">
                <i class="ti-calendar"></i>
                <p>Eventos</p>
            </a>
        </li>
        <li
            @if (Request::is('appointments') || Request::is('appointments/*'))
                class="active"
            @endif
        >
            <a href="{{ url('appointments') }}">
                <i class="ti-alarm-clock"></i>
                <p>Citas</p>
            </a>
        </li>
        <li
            @if (Request::is('dogs') || Request::is('dogs/*'))
                class="active"
            @endif
        >
            <a href="{{ url('/dogs') }}">
                <i class="ti-agenda"></i>
                <p>Perros</p>
            </a>
        </li>
        <li
            @if (Request::is('eventHistory') || Request::is('eventHistory/*'))
                class="active"
            @endif
        >
            <a href="{{ url('/eventHistory') }}">
                <i class="ti-archive"></i>
                <p>Historial de Eventos</p>
            </a>
        </li>
        <li
            @if (Request::is('vetHistory') || Request::is('vetHistory/*'))
                class="active"
            @endif
        >
            <a href="{{ url('/vetHistory') }}">
                <i class="ti-pulse"></i>
                <p>Historial Veterinario</p>
            </a>
        </li>
    </ul>
</div>