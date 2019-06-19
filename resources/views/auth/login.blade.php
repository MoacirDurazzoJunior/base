@extends('layouts.app')

@section('content')
<!-- Login -->
<div class="login__block__body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group form-group--float form-group--centered">
            <input id="login" type="text" class="form-control {{ $errors->has('login') ? 'is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>
            <label>Login</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('login'))
                <div class="invalid-feedback">{{ $errors->first('login') }}</div>
            @endif
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>
            <label>Senha</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!--div class="form-group">
            <div class="icon-toggle">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} data-toggle="tooltip" data-placement="top" data-original-title="Mantenha-me Conectado">
                <i class="zmdi zmdi-check-all"></i>
            </div>

            <a class="btn btn-link" href="{{ route('password.request') }}">Esqueceu sua senha?</a>
        </div-->
        <div class="botoes-login">
            <div>
                <a href="{{ route('password.request') }}" class="btn btn-dark login__block__btn btn--icon" data-toggle="tooltip" data-placement="top" data-original-title="Esqueci minha senha"><i class="zmdi zmdi-key"></i></a>
            </div>
            <div class="icon-toggle btn btn-dark btn--icon custom">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} data-toggle="tooltip" data-placement="top" data-original-title="Mantenha-me Conectado">
                <i class="zmdi zmdi-check-all"></i>
            </div>
            <div>
                <button type="submit" class="btn btn--icon login__block__btn" data-toggle="tooltip" data-placement="top" data-original-title="Entrar"><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection