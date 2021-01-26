@extends('backend.layouts.app')

@section('title', __('labels.backend.access.services.management') . ' | ' . 'Our works')

@section('breadcrumb-links')
    @include('backend.our_works.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($ourWork, ['route' => ['admin.our_works.update', $ourWork], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.our_works.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.our_works.index', 'id' => $ourWork->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection