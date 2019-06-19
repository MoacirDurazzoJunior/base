<li class="dropdown">
    <a href="" data-toggle="dropdown">
        <div id="perfil">
            <p>
                {{ Auth::user()->nome }}
                <i class="zmdi zmdi-account-circle"></i>
            </p>
            <!--img class="empresa" src="{{ url('img/logo/logo_cas.png') }}" alt="">
            <img class="usuario" src="{{ url('demo/img/profile-pics/8.jpg') }}" alt=""-->
        </div>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('dashboard.perfil') }}" class="dropdown-item">Meu Perfil</a>
        <hr/>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>