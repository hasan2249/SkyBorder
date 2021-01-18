
@extends('frontend.layouts.service_plan')

@section('title', app_name() . ' | ' .'Service Description')

@section('content')


<!-- START SERVICES -->

         <!-- description start -->
        <!-- <div>
            @langrtl
                {!!$service->content_ar!!} 
            @else
                {!!$service->content_en!!} 
            @endlangrtl 
        </div> -->
        <!-- description end -->

<!-- END SERVICES -->
<!-- 
<div class="plan_container">

    <div class="card">
        <div class="plan_head">
            head
        </div>

        <div class="plan_body">
            body
        </div>
    </div>


    <div class="card">
        <div class="plan_head">
            head
        </div>

        <div class="plan_body">
            body
        </div>
    </div>
</div> -->


    <div class="head">
        @lang('section1.company_name')
        <a href="{{route('frontend.index')}}"><img src="{{asset('images/main-logo.png')}}"  width="70" ></a>
    <div>

   <div class="container">
         <img class="" src="{{asset('storage/'. substr($service->img, '7'))}}" alt="">
    </div>

<div class="description">
        @langrtl
            <h3>{!!$service->title_ar!!} </h3>
            <span>{!!$service->content_ar!!} </span>
        @else
            <h3>{!!$service->title_en!!} </h3>
            <span>{!!$service->content_en!!} </span>
        @endlangrtl 
</div>

<div class="container">
    @foreach($service->plans as $ser_plan)
    <?php
    $arr = explode("   ", $ser_plan->img, 2);
    $first = $arr[0];
    ?>
  <div class="card">
      @langrtl
      <h1 class="big-text">{{$ser_plan->title_ar}}</h1>
    <div class="content_plan">
        <img class="service_cycle_image" width="100%" src="{{asset('storage/'. substr($first, '7'))}}" alt="">
    </div> 
    @else  
    <h1 class="big-text">{{$ser_plan->title_en}}</h1>
    <div class="content_plan">
        <img class="service_cycle_image" width="100%" src="{{asset('storage/'. substr($first, '7'))}}" alt="">
    </div> 
    @endlangrtl
<a href="{{route('plan.desc',['id' => $ser_plan->id])}}">@lang('section1.more_details')</a>
  </div>
  @endforeach
</div>
@endsection
