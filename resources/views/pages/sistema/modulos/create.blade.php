@extends('layouts.default')

@include('elements.modules.modulo', ['modulo' => 'sistema'])

@push('scripts')
    <script src="{{ asset('js/crud.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

@section('buttons')
    <div class="float-buttons">
        @include('elements.buttons.back', [ 'link' => route($route.'.index') ] )
        @include('elements.buttons.update', [ 'link' => route($route.'.store') ] )
    </div>
@endsection

@section('breadcrumbs')
    @include('breadcrumbs.sistema.modulos.create')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">

                <form id="form-crud" method="post" action="{{ route( $route.'.store' ) }}" >
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome *</label>
                                <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ old('nome') }}">
                                @if ($errors->has('nome'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ícone *</label>
                                <input type="text" name="icone" class="form-control {{ $errors->has('icone') ? ' is-invalid' : '' }}" placeholder="Ícone" value="{{ old('icone') }}">
                                @if ($errors->has('icone'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('icone') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tema *</label>
                                @php
                                    $class = 'select2 ';
                                    $class .= $errors->has('tema') ? ' is-invalid' : '';
                                @endphp
                                {{ Form::select( 'tema', $temas, '', ['class' => $class, 'style'=>'width:100%'] ) }}
                                @if ($errors->has('tema'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('tema') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cor *</label>
                                @php
                                    $class = 'select2 ';
                                    $class .= $errors->has('cor') ? ' is-invalid' : '';
                                @endphp
                                {{ Form::select( 'cor', $cores, '', ['class' => $class, 'style'=>'width:100%'] ) }}
                                @if ($errors->has('cor'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('cor') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Prefixo *</label>
                                <input type="text" name="prefixo" class="form-control {{ $errors->has('prefixo') ? ' is-invalid' : '' }}" placeholder="Prefixo" value="{{ old('prefixo') }}">
                                @if ($errors->has('prefixo'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('prefixo') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection