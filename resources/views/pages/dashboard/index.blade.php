@extends('layouts.default')
@include('elements.modules.modulo', ['modulo' => 'dashboard'])
@section('breadcrumbs')
    @include('breadcrumbs.dashboard.index')
@endsection