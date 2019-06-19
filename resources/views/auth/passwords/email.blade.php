@extends('layouts.app')

@section('content')
<div class="login__block__body">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group form-group--float form-group--centered">
            <input id="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" required>
            <label>Email</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>
        
        <div class="botoes-login">
            <div>
                <a href="{{ route('inicial') }}" class="btn btn-light login__block__btn btn--icon" data-toggle="tooltip" data-placement="top" data-original-title="Voltar"><i class="zmdi zmdi-arrow-left"></i></a>
            </div>
            <div>
                <button type="submit" class="btn btn--icon login__block__btn" data-toggle="tooltip" data-placement="top" data-original-title="Enviar Link para Redefinir Senha"><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection