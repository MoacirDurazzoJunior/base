@extends('layouts.default')

@include('elements.modules.modulo', ['modulo' => 'sistema'])

@section('buttons')
    <div class="float-buttons">
        @include('elements.buttons.create', [ 'link' => route($route.'.create') ] )
    </div>
@endsection

@push('scripts')
    <!-- Vendors: Data tables -->
    <script src="{{ asset('vendors/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
@endpush

@section('breadcrumbs')
    @include('breadcrumbs.sistema.perfis.index')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        
        <div class="card">
            <div class="card-body">

                <table id="data-table" class="table table-bordered table-hover table-striped mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Nome</th>
                            <th>Apelido</th>
                            <th>Descrição</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($result as $item)
                        <tr onClick="location.href='{{ route($route.'.show', $item->id) }}'">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->display_name }}</td>
                            <td>{{ $item->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection