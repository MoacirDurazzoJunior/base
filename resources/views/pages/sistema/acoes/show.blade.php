@extends('layouts.default')

@include('elements.modules.modulo', ['modulo' => 'sistema'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.css') }}" />
@endpush

@section('buttons')
    <div class="float-buttons">
        @include('elements.buttons.back', [ 'link' => route($route.'.index') ] )
        @include('elements.buttons.edit', [ 'link' => route($route.'.edit', $result->id) ] )
        @include('elements.buttons.destroy', [ 'link' => route($route.'.destroy', $result->id) ] )
    </div>
@endsection

@section('breadcrumbs')
    @include('breadcrumbs.sistema.acoes.show')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">

                <div class="listview listview--hover">
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Sub Módulo</div>
                            <p>{{ $result->submodulo->nome_pai }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Nome</div>
                            <p>{{ $result->nome }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Rota</div>
                            <p>{{ $result->rota }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Ícone</div>
                            <p>{{ $result->icone }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection