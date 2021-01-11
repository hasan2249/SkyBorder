
@extends('frontend.layouts.service_plan')

@section('title', app_name() . ' | ' .'Plan Description')

@section('content')


<div class="head">
    @lang('section1.company_name')
    <a href="{{route('frontend.index')}}"><img src="{{asset('images/main-logo.png')}}"  width="70" ></a>
<div>

<div class="description">
        @langrtl
            <h3>{!!$plan->title_ar!!} </h3>
            <span>{!!$plan->content_ar!!} </span>
        @else
            <h3>{!!$plan->title_en!!} </h3>
            <span>{!!$plan->content_en!!} </span>
        @endlangrtl 
        <a href="{{ URL::previous() }}" class=" btn btn-large btn-rounded btn-blue color-white ">Back</a>
</div>

<div class="container">

  <h1>Masonry Gallery</h1>

    <div class="gallery" id="gallery">
        <?php 
            $images_path = explode(" ", $plan->img);
        ?>
        @foreach($images_path as $image_path)
            <div class="gallery-item">
                <div class="content"><img src="{{asset('storage/'. substr($image_path, '7'))}}" alt=""></div>
            </div>
        @endforeach
        <!-- <div class="gallery-item">
            <div class="content"><img src="https://source.unsplash.com/random/?tech,care" alt=""></div>
        </div>-->
    </div>
     
</div>
@endsection
