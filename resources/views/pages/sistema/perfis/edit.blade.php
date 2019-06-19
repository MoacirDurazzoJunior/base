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
    @include('breadcrumbs.sistema.perfis.edit')
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
                                <label>Nome *</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ $result->name }}">
                                @if ($errors->has('name'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apelido</label>
                                <input type="text" name="display_name" class="form-control {{ $errors->has('display_name') ? ' is-invalid' : '' }}" placeholder="Apelido" value="{{ $result->display_name }}">
                                @if ($errors->has('display_name'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('display_name') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Descrição">{{ $result->description }}</textarea>
                                @if ($errors->has('description'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                                @endif
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Permissões *</label>
                                @php
                                    $class = 'select2 ';
                                    $class .= $errors->has('permission_id') ? ' is-invalid' : '';
                                @endphp
                                {{ Form::select( 'permission_id[]', $permissao, $result->perms->pluck('id'), ['class' => $class, 'style'=>'width:100%', 'multiple' => 'multiple'] ) }}
                                @if ($errors->has('permission_id'))
                                    <i class="form-group__feedback zmdi zmdi-close-circle"></i>
                                    <div class="invalid-feedback">{{ $errors->first('permission_id') }}</div>
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