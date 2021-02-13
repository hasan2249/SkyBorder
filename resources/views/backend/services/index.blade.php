@extends('backend.layouts.app')

@section('title', 'SkyBorder' . ' | ' . 'Services Management')

@section('breadcrumb-links')
@include('backend.services.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Services Management <small class="text-muted">Services list</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="services-table" class="table" data-ajax_url="{{ route("admin.services.get") }}">
                        <thead>
                            <tr>
                                <th>Arabic Tilte</th>
                                <th>English Tilte</th>
                                <th data-orderable="false">Price</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->

    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection

@section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Services.list.init();
    });
</script>
@endsection