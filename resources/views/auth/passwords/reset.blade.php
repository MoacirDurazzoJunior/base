@extends('layouts.app')

@section('content')
<div class="login__block__body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group form-group--float form-group--centered">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            <label>Email</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            <label>Senha</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="password-confirm" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
            <label>Confirmar Senha</label>
            <i class="form-group__bar"></i>
        </div>
        
        <div class="botoes-login">
            <div>
                <a href="{{ route('inicial') }}" class="btn btn-light login__block__btn btn--icon" data-toggle="tooltip" data-placement="top" data-original-title="Voltar"><i class="zmdi zmdi-arrow-left"></i></a>
            </div>
            <div>
                <button type="submit" class="btn btn--icon login__block__btn" data-toggle="tooltip" data-placement="top" data-original-title="Redefinir Senha"><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection
