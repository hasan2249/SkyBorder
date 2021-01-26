@extends('backend.layouts.app')

@section('title', __('labels.backend.access.services.management') . ' | ' . __('labels.backend.access.services.create'))

@section('breadcrumb-links')
    @include('backend.our_works.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.our_works.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.our_works.form')
        @include('backend.components.footer-buttons', ['cancelRoute' => 'admin.our_works.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection