
@extends('frontend.layouts.service_plan')

@section('title', 'SkyBorder' . ' | ' . $our_work->content_en)

@section('content')


<div class="head">
    @lang('section1.company_name')
    <a href="{{route('frontend.index')}}"><img src="{{asset('images/main-logo.png')}}"  width="70" ></a>
<div>

<div class="description">
        @langrtl
            <h3>{!!$our_work->title_ar!!} </h3>
            <span>{!!$our_work->content_ar!!} </span>
        @else
            <h3>{!!$our_work->title_en!!} </h3>
            <span>{!!$our_work->content_en!!} </span>
        @endlangrtl 
        <a href="{{ URL::previous() }}" class=" btn btn-large btn-rounded btn-blue color-white ">Back</a>
</div>

<div class="container">

    <div class="gallery" id="gallery">
        <?php 
            $images_path = explode("   ", $our_work->img);
        ?>
        @foreach($images_path as $image_path)
            <div class="gallery-item">
                <div class="content"><img src="{{asset('storage/'. substr($image_path, '7'))}}" alt=""></div>
            </div>
        @endforeach
    </div>
     
</div>
@endsection
