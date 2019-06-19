<ul class="navigation">
    @foreach( $modulo->submodulos->sortBy('nome') as $submodulo )
        @if( !empty($submodulo->rota) )
            <li {{ ( Menu::acaoAtual( $submodulo->rota ) ? 'class=navigation__active' : '' ) }}>
                <a href="{{ route( $submodulo->rota ) }}"><i class="zmdi zmdi-{{ $submodulo->icone }}"></i> {{ $submodulo->nome }}</a>
            </li>
        @else
            <li class="navigation__sub {{ ( Menu::submoduloAtual( $submodulo->acoes->pluck('rota')->toArray() ) ? 'navigation__sub--active' : '' ) }}">
                <a href="javascript:void(0)"><i class="zmdi zmdi-{{ $submodulo->icone }}"></i> {{ $submodulo->nome }}</a>
                <ul>
                @foreach( $submodulo->acoes->sortBy('nome') as $acao )
                    <li {{ ( Menu::acaoAtual( $acao->rota ) ? 'class=navigation__active' : '' ) }} >
                        <a href="{{ route( $acao->rota ) }}">{{ $acao->nome }}</a>
                    </li>
                @endforeach
                </ul>
            </li>
        @endif
    @endforeach
</ul>