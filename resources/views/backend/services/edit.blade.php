@extends('backend.layouts.app')

@section('title', __('labels.backend.access.services.management') . ' | ' . __('labels.backend.access.services.edit'))

@section('breadcrumb-links')
    @include('backend.services.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($service, ['route' => ['admin.services.update', $service], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.services.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.services.index', 'id' => $service->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection