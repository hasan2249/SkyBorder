@extends('backend.layouts.app')

@section('title', __('labels.backend.access.Plans.management') . ' | ' . __('labels.backend.access.Plans.edit'))

@section('breadcrumb-links')
    @include('backend.Plans.includes.breadcrumb-links')
@endsection

@section('content')
    {{ Form::model($plan, ['route' => ['admin.plans.update', $plan], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-role', 'files' => true]) }}

    <div class="card">
        @include('backend.Plans.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.plans.index', 'id' => $plan->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection