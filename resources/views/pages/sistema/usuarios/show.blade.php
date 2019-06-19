@extends('layouts.default')

@include('elements.modules.modulo', ['modulo' => 'sistema'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/sweetalert2/dist/sweetalert2.min.css') }}" />
@endpush

@section('buttons')
    <div class="float-buttons">
        @include('elements.buttons.back', [ 'link' => route($route.'.index') ] )
        @if ( !$result->super )
            @include('elements.buttons.edit', [ 'link' => route($route.'.edit', $result->id) ] )
            @include('elements.buttons.destroy', [ 'link' => route($route.'.destroy', $result->id) ] )
        @endif
    </div>
@endsection

@section('breadcrumbs')
    @include('breadcrumbs.sistema.usuarios.show')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">

                <div class="listview listview--hover">
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Nome</div>
                            <p>{{ $result->nome }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Login</div>
                            <p>{{ $result->login }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Email</div>
                            <p>{{ $result->email }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Cadastrado em</div>
                            <p>{{ date('d/m/Y H:i:s', strtotime( $result->created_at )) }}</p>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Perfis</div>
                            <ul>
                                @foreach( $result->roles->sortBy('name') as $perm )
                                <li>{{ $perm->detalhes }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="listview__item">
                        <div class="listview__content">
                            <div class="listview__heading">Super</div>
                            <p>{{ $result->super ? 'Sim' : 'Não' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection