@extends('layouts.default')

@include('elements.modules.modulo', ['modulo' => 'sistema'])

@push('scripts')
    <script src="{{ asset('js/crud.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
@endpush

@section('buttons')
    <div class="float-buttons">
        @include('elements.buttons.back', [ 'link' => route($route.'.index') ] )
        @include('elements.buttons.update', [ 'link' => route($route.'.update', $result->id) ] )
    </div>
@endsection

@section('breadcrumbs')
    @include('breadcrumbs.sistema.acoes.edit')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">

                <form id="form-crud" method="post" action="{{ route( $route.'.update', $result->id ) }}" >
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="id" value="{{ $result->id }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sub Módulo *</label>
                                @php
                                    $class = 'select2 ';
                                    $class .= $errors->has('sub_modulo_id') ? ' is-invalid' : '';
                                @endphp
                                {{ Form::select( 'sub_modulo_id', $submodulo, $result->sub_modulo_id, ['class' => $class, 'style'=>'width:100%'] ) }}
                                @if ($errors->has('sub_modulo_id'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('sub_modulo_id') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome *</label>
                                <input type="text" name="nome" class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ $result->nome }}">
                                @if ($errors->has('nome'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rota *</label>
                                <input type="text" name="rota" class="form-control {{ $errors->has('rota') ? ' is-invalid' : '' }}" placeholder="Rota" value="{{ $result->rota }}">
                                @if ($errors->has('rota'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('rota') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ícone *</label>
                                <input type="text" name="icone" class="form-control {{ $errors->has('icone') ? ' is-invalid' : '' }}" placeholder="Ícone" value="{{ $result->icone }}">
                                @if ($errors->has('icone'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('icone') }}</div>
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