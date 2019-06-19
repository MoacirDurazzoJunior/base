@php
    $modulo = Menu::getModulo( $modulo );
@endphp

@section('theme', $modulo->tema)

@section('module')
    <div class="logo-modulo">
        <div class="item">
            <i class="zmdi zmdi-{{ $modulo->icone }} zmdi-hc-3x"></i>
        </div>
        <div class="item">
            <span>{{ $modulo->nome }}</span>
        </div>
    </div>
@endsection

@section('menu')
    @include('elements.menu.menu', ['modulo' => $modulo])
@endsection