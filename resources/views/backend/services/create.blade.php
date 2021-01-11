@extends('backend.layouts.app')

@section('title', __('labels.backend.access.services.management') . ' | ' . __('labels.backend.access.services.create'))

@section('breadcrumb-links')
    @include('backend.services.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.services.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.services.form')
        @include('backend.components.footer-buttons', ['cancelRoute' => 'admin.services.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection