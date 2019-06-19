@extends('layouts.app')

@section('content')
<div class="login__block__body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group form-group--float form-group--centered">
            <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>
            <label>Nome</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
            @endif
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            <label>Email</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="form-group form-group--float form-group--centered">
            <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" data-mask="999.999.999-99" required autofocus>
            <label>CPF</label>
            <i class="form-group__bar"></i>
            @if ($errors->has('cpf'))
                <div class="invalid-feedback">{{ $errors->first('cpf') }}</div>
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
                <button type="submit" class="btn btn--icon login__block__btn" data-toggle="tooltip" data-placement="top" data-original-title="Cadastrar"><i class="zmdi zmdi-mail-send"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection
