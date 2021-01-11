@extends('backend.layouts.app')

@section('title', __('labels.backend.access.Plans.management') . ' | ' . __('labels.backend.access.Plans.create'))

@section('breadcrumb-links')
    @include('backend.Plans.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.plans.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.Plans.form')
        @include('backend.components.footer-buttons', ['cancelRoute' => 'admin.plans.index'])
    </div><!--card-->
    {{ Form::close() }}
@endsection