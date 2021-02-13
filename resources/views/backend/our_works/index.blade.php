@extends('backend.layouts.app')

@section('title', 'SkyBorder' . ' | ' . 'Our Works')

@section('breadcrumb-links')
@include('backend.our_works.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Our Works <small class="text-muted">list</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="our_works-table" class="table" data-ajax_url="{{ route("admin.our_works.get") }}">
                        <thead>
                            <tr>
                                <th>Arabic Tilte</th>
                                <th>English Tilte</th>
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
        FTX.Our_works.list.init();
    });
</script>
@endsection