<li class="dropdown">
    <a href="" data-toggle="dropdown"><i class="zmdi zmdi-apps"></i></a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu--block" role="menu">
        <div class="row app-shortcuts">
            @foreach( Menu::getAllModulos() as $modulo )
            <a class="col-4 app-shortcuts__item" href="{{ route( $modulo->prefixo.'.index') }}">
                <i class="zmdi zmdi-{{ $modulo->icone }}"></i>
                <small class="">{{ $modulo->nome }}</small>
                <span class="app-shortcuts__helper bg-{{ $modulo->cor }}"></span>
            </a>
            @endforeach
        </div>
    </div>
</li>