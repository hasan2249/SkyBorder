<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                Plans Management
                <small class="text-muted">{{ (isset($page)) ? 'Edit plan' : 'Create plan'}}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('title_ar', "اسم الباقة (بالعربية)", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('title_ar', null, ['class' => 'form-control', 'placeholder' => "", 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('title_en', "Plan name (English)", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('title_en', null, ['class' => 'form-control', 'placeholder' => "", 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('content_ar', "وصف الباقة (بالعربية)", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('content_ar', null, ['class' => 'form-control', 'placeholder' => ""]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('content_en', "Description (English)", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('content_en', null, ['class' => 'form-control', 'placeholder' => ""]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('price', "price (السعر)", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => ""]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->


            <div class="form-group row">
                {{ Form::label('img', "اختر صورة", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    <!-- {{ Form::file('img', null, ['class' => 'form-control', 'placeholder' => ""]) }} -->
                    <input type="file" name="img[]" multiple/>
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('status', "Status", ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    <div class="checkbox d-flex align-items-center">
                        @php
                        $status = isset($page) ? '' : 'checked';
                        @endphp
                        <label class="switch switch-label switch-pill switch-primary mr-2" for="role-1"><input class="switch-input" type="checkbox" name="status" id="role-1" value="1" {{ (isset($page->status) && $page->status === 1) ? "checked" : $status }}><span class="switch-slider" data-checked="on" data-unchecked="off"></span></label>
                    </div>
                </div>
                <!--col-->
            </div>
            <!--form-group-->



            <div class="form-group row">
                <div class="col-md-2 from-control-label">
                    Service
                </div>
                
                <div class="col-md-10">
                    <?php $ser =  array();
                        foreach($services as $service)
                        {
                            $ser[$service->id] = $service->title_en;
                        }
                    ?>
                    @isset($plan)
                        {{Form::select('service_id', $ser, $plan->service->id )}}
                    @else
                        {{Form::select('service_id', $ser)}}
                    @endisset
                </div>
            </div>

        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">
    FTX.Utils.documentReady(function() {
        FTX.Plans.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop