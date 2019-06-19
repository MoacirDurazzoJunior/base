@if (session('success'))
    @include('elements.alert.success', ['message' => session('success')])
@endif
@if (session('warning'))
    @include('elements.alert.warning', ['message' => session('warning')])
@endif
@if (session('danger'))
    @include('elements.alert.danger', ['message' => session('danger')])
@endif
@if (session('info'))
    @include('elements.alert.info', ['message' => session('info')])
@endif
@if (session('default'))
    @include('elements.alert.default', ['message' => session('default')])
@endif
@if ( !empty( $errors->all() ) )
    @include('elements.alert.danger', ['message' => 'Verifique os campos inválidos'])
@endif