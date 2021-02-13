@extends('frontend.layouts.app')

@section('title', 'Skyborder' . ' | ' . __('navs.general.home'))

@section('content')
<!-- START LOADER -->
<div class="loader" id="loader-fade">
    <div class="linear-activity">
        <div class="indeterminate"></div>
    </div>
</div>
<!-- END LOADER -->

<!-- START HEADER -->
<header>
    <!--Navigation-->
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-standard">
        <div class="container-fluid">
            <a href="#page1" title="Logo" class="link logo scroll">
                <!--Logo Default-->
                <!-- <img src="hemes.com/creative-piling/images/logo-white.png" class="logo-dark" alt="logo"> -->
                <img src="images/main-logo.png" width="70" class="logo-dark" alt="logo"> 
            </a>
            <span class="lang">
            @if(config('locale.status') && count(config('locale.languages')) > 1)
                @foreach(array_keys(config('locale.languages')) as $lang)
                    @if($lang != app()->getLocale())
                        <h5><a href="{{ '/lang/'.$lang }}" class="link text-white">@lang('menus.language-picker.langs.'.$lang)</a></h5>
                    @endif
                @endforeach
            @endif
            </span>
            <!--Side Menu Button-->
            <div class="side-nav-btn animated-wrap" id="sidemenu_toggle">
                <div class="animated-element">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>

    <!-- side menu -->
    <div class="side-menu">
        <div class="inner-wrapper">
            <span class="btn-close link" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav">
                <ul class="navbar-nav" id="side-menu">
                    <li class="nav-item">
                        <a class="nav-link link" href="#page1">@lang('section1.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link" href="#page2">@lang('section1.about_us')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link" href="#page3">@lang('section1.our_work')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link" href="#page4">@lang('section1.services')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link" href="#page5">@lang('section1.contact_us')</a>
                    </li>
                    @auth
                        @can('view backend')
                            <li class="nav-item"><a href="{{route('admin.dashboard')}}" class="nav-link link">@lang('navs.frontend.user.administration')</a>
                            <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link link">@lang('navs.frontend.dashboard')</a></li>
                        @endcan
                        <li class="nav-item"><a href="{{ route('frontend.auth.logout') }}" class="nav-link link">@lang('navs.general.logout')</a></li>
                    @endauth
                    @guest
                        <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Route::is('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>
                    @endguest
                </ul>
            </nav>

            <div class="side-footer text-white w-100">
                <ul class="social-icons-simple">
                    <li class="animated-wrap"><a href="https://www.facebook.com/%D8%AD%D8%AF%D9%88%D8%AF-%D8%A7%D9%84%D8%B3%D9%85%D8%A7%D8%A1-%D9%84%D9%84%D8%AA%D8%B3%D9%88%D9%8A%D9%82-%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A-106539504671582/" class="animated-element"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
                    <li class="animated-wrap"><a href="https://mobile.twitter.com/sky_borders" class="animated-element"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                    <li class="animated-wrap"><a href="https://www.linkedin.com/authwall?trk=gf&trkInfo=AQGb7zbYyXI7JAAAAXaFPwrwnPCqgBE4SukUm0P2YdlUyRighXqKrDhfTf8cdYXp5cYpVcd-N0UaMwlZDoHWe0eG-tBt0VmTtiFfdpFUN1e6oTvtmb9KSESV5IBq1MYUkZVMmqk=&originalReferer=https://www.facebook.com/&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fsky-border-for-e-marketing%3Ffbclid%3DIwAR0GpfI-EhJTB2_ymjtykQxzhRog3v1OcJPeb-Wdg04bpQnL5pVIvaQmJX8" class="animated-element"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
                    <li class="animated-wrap"><a href="https://www.instagram.com/skyborder_sa/?igshid=jzh3h4cj8fyr&fbclid=IwAR3Jt3-SwvVz6jtSzSuxvrDNqEByOhAVkKmF5srMgo4DoixSpv12kNCxG6Y" class="animated-element"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
                </ul>
                <p class="whitecolor">&copy; 2021. Made With Love by <a class="web-link text-white" href="www.top4tech.net" >TopTech</a></p>
            </div>
        </div>
    </div>
    <!-- End side menu -->

    <!--slider social-->
    <div class="slider-social d-md-block d-none">
        <ul class="list-unstyled">
            <li class="animated-wrap"><a class="animated-element" href="https://www.facebook.com/%D8%AD%D8%AF%D9%88%D8%AF-%D8%A7%D9%84%D8%B3%D9%85%D8%A7%D8%A1-%D9%84%D9%84%D8%AA%D8%B3%D9%88%D9%8A%D9%82-%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A-106539504671582/"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
            <li class="animated-wrap"><a class="animated-element" href="https://mobile.twitter.com/sky_borders"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            <li class="animated-wrap"><a class="animated-element" href="https://www.linkedin.com/authwall?trk=gf&trkInfo=AQGb7zbYyXI7JAAAAXaFPwrwnPCqgBE4SukUm0P2YdlUyRighXqKrDhfTf8cdYXp5cYpVcd-N0UaMwlZDoHWe0eG-tBt0VmTtiFfdpFUN1e6oTvtmb9KSESV5IBq1MYUkZVMmqk=&originalReferer=https://www.facebook.com/&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fsky-border-for-e-marketing%3Ffbclid%3DIwAR0GpfI-EhJTB2_ymjtykQxzhRog3v1OcJPeb-Wdg04bpQnL5pVIvaQmJX8"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
            <li class="animated-wrap"><a class="animated-element" href="https://www.instagram.com/skyborder_sa/?igshid=jzh3h4cj8fyr&fbclid=IwAR3Jt3-SwvVz6jtSzSuxvrDNqEByOhAVkKmF5srMgo4DoixSpv12kNCxG6Y"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
    </div>

</header>
<!-- END HEADER -->

<div id="pagepiling">

<!-- START SLIDER -->
<section class="section slider" id="page1">
    <div id="rev_slider_346_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="beforeafterslider1" data-source="gallery" style="background:#252525;padding:0;">
        <!-- START REVOLUTION SLIDER 5.4.3.3 fullscreen mode -->
        <div id="main-slider-four" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.3.3">
            
            <ul>
                <!-- Slide 1 -->
                <li data-index="rs-964" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="../../assets/parallax/img/night-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-beforeafter='{"moveto":"50%|50%|50%|50%","bgColor":"","bgFit":"cover","bgPos":"center center","bgRepeat":"no-repeat","direction":"horizontal","easing":"Power2.easeInOut","delay":"500","time":"750","out":"fade","carousel":false}'>
                    <!-- MAIN IMAGE -->
                    <h2 class="d-none">sd</h2>
                    <img src="images/dark_sky.jpg" alt="" data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power4.easeOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="30" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:1; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid1.reaching_stars')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:1;  font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid1.reaching_stars')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                         data-fontsize="['60','60','60','50']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1200" data-splitin="none" data-splitout="none"
                         style="z-index:2;  font-weight: 700; letter-spacing: 1px; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid1.company_name')
                    </div><div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                               data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                               data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                               data-fontsize="['60','60','60','50']"
                               data-whitespace="nowrap" data-responsive_offset="on"
                               data-width="['none','none','none','none']" data-type="text"
                               data-textalign="['center','center','center','center']"
                               data-beforeafter="after"
                               data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                               data-start="1200" data-splitin="none" data-splitout="none"
                               style="z-index:2; font-weight: 700; letter-spacing: 1px; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid1.company_name')
                </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:3;  font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid1.with_us')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:3; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid1.with_us')
                    </div>
                    <div class="tp-caption tp-resizeme"
                         id="slide-24-layer-129" data-x="['center','center','center','center']"
                         data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']"
                         data-voffset="['140','70','70','130']"
                         data-width="['160','160','160','160']"
                         data-frames='[{"delay":600,"speed":2000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:40px;","to":"o:1;fb:0;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         style="z-index:99; max-width: 960px">
                        <!-- <a href="javascript:void(0);" class="scroll btn btn-large btn-rounded btn-blue color-white link">get started</a> -->
                    </div>

                </li>
                <!-- Slide 2 -->
                <li data-index="rs-965" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="../../assets/parallax/img/night-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-beforeafter='{"moveto":"50%|50%|50%|50%","bgColor":"","bgFit":"cover","bgPos":"center center","bgRepeat":"no-repeat","direction":"horizontal","easing":"Power2.easeInOut","delay":"500","time":"750","out":"fade","carousel":false}'>
                    <!-- MAIN IMAGE -->
                    <img src="images/sharp.jpg" alt="" data-bgposition="center center" data-kenburns="on" data-duration="5000" data-ease="Power4.easeOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="30" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:1; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid2.reaching_stars')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:1; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid2.reaching_stars')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                         data-fontsize="['60','60','60','50']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1200" data-splitin="none" data-splitout="none"
                         style="z-index:2; font-weight: 700; letter-spacing: 1px; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid2.company_name')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                         data-fontsize="['60','60','60','50']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1200" data-splitin="none" data-splitout="none"
                         style="z-index:2; font-weight: 700; letter-spacing: 1px; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid2.company_name')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:3; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid2.with_us')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:3; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid2.with_us')
                    </div>
                    <div class="tp-caption tp-resizeme"
                         id="slide-24-layer-130" data-x="['center','center','center','center']"
                         data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']"
                         data-voffset="['140','70','70','130']"
                         data-width="['160','160','160','160']"
                         data-frames='[{"delay":600,"speed":2000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:40px;","to":"o:1;fb:0;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         style="z-index:99; max-width: 960px">
                        <!-- <a href="javascript:void(0);" class="scroll btn btn-large btn-rounded btn-blue color-white link">get started
                        </a> -->
                    </div>
                </li>
                <!-- Slide 3 -->
                <li data-index="rs-966" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                    data-thumb="../../assets/image/night-100x50.jpg" data-rotate="0" data-saveperformance="off"
                    data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                    data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description=""
                    data-beforeafter='{"moveto":"50%|50%|50%|50%","bgColor":"","bgType":"image","bgImage":"creative-piling/images/banner-before.jpg","bgFit":"cover","bgPos":"center center","bgRepeat":"no-repeat","direction":"horizontal","easing":"Power2.easeInOut","delay":"500","time":"750","out":"fade","carousel":false}'>
                    <!-- MAIN IM AGE -->
                    <img src="images/creative.jpg" alt="" data-bgposition="center center" data-kenburns="on"
                         data-duration="5000" data-ease="Power4.easeOut" data-scalestart="150" data-scaleend="100"
                         data-rotatestart="0" data-rotateend="0" data-blurstart="30" data-blurend="0"
                         data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg"
                         data-no-retina>
                    <!-- LAYERS -->
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:1; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid3.reaching_stars')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-140','-140']"
                         data-fontsize="['30','30','30','25']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;"
                         data-transform_in="x:-50px;opacity:0;s:2000;e:Power3.easeOut;"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:1; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid3.reaching_stars')
                    </div>

                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                         data-fontsize="['60','60','60','50']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1200" data-splitin="none" data-splitout="none"
                         style="z-index:2; font-weight: 700; letter-spacing: 1px; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid3.company_name')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                         data-fontsize="['60','60','60','50']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1200" data-splitin="none" data-splitout="none"
                         style="z-index:2; font-weight: 700; letter-spacing: 1px; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid3.company_name')
                    </div>

                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['30','30','30','20']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="before"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:3; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid3.with_us')
                    </div>
                    <div class="tp-caption tp-resizeme rs-parallaxlevel-5"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['30','30','30','20']"
                         data-whitespace="nowrap" data-responsive_offset="on"
                         data-width="['none','none','none','none']" data-type="text"
                         data-textalign="['center','center','center','center']"
                         data-beforeafter="after"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                         data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-start="1000" data-splitin="none" data-splitout="none"
                         style="z-index:3; font-weight: 100; color: #ffffff; font-family: 'Poppins', sans-serif;text-transform:capitalize">@lang('section1.slid3.with_us')
                    </div>

                    <div class="tp-caption tp-resizeme"
                         id="slide-24-layer-128" data-x="['center','center','center','center']"
                         data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']"
                         data-voffset="['140','70','70','130']"
                         data-width="['160','160','160','160']"
                         data-frames='[{"delay":600,"speed":2000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:40px;","to":"o:1;fb:0;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                         data-textAlign="['center','center','center','center']"
                         style="z-index:99; max-width: 960px">
                        <!-- <a href="javascript:void(0);" class="scroll btn btn-large btn-rounded btn-blue color-white link">get started
                        </a> -->
                    </div>

                </li>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
</section>
<!-- END SLIDER -->

<!-- START SERVICES -->
    <section class="section bg-services" id="page2">
        <div class="bg-overlay bg-black opacity-4"></div>
        <!-- <div class="container h-100">
        <div class="row h-100">
            <div class="offset-md-6 col-md-6 my-auto"> -->
                <div id="services_slider" class="owl-carousel owl-theme">

                    <!-- Item 1 -->
                    <div class="services-item item text-center text-md-right">
                        <div class="services-icon per-slide">
                            <i class="lni-cup wow fadeInUp"></i>
                        </div>
                        <h1 class="mb-4 text-white per-slide wow fadeInRight font-weight-light shining-text">@lang('section1.slid2.company_name')</h1>
                        <!--line-->
                        <div  class="testimonial-line wow fadeInRight"></div>
                        <p data-aos="fade-left" class="mb-5 per-slide text-white wow fadeInLeft">@lang('section1.slid1.description')</p>
                    </div>

                    <!-- Item 2 -->
                    <div class="services-item item text-center text-md-right">
                        <div class="services-icon per-slide">
                            <i class="lni-world wow fadeInUp"></i>
                        </div>
                        <h1 class="mb-4 text-white per-slide wow fadeInRight font-weight-light shining-text">@lang('section1.slid2.company_name')</h1>
                        <!--line-->
                        <div  class="testimonial-line wow fadeInRight"></div>
                        <p data-aos="fade-left" class="mb-5 per-slide text-white wow fadeInLeft">@lang('section1.slid2.description')</p>
                    </div>

                    <!-- Item 3 -->
                    <div class="services-item item text-center text-md-right">
                        <div class="services-icon per-slide">
                            <i class="lni-emoji-smile wow fadeInUp"></i>
                        </div>
                        <h1 class="mb-4 text-white per-slide wow fadeInRight font-weight-light shining-text">@lang('section1.slid2.company_name')</h1>
                        <!--line-->
                        <div  class="testimonial-line wow fadeInRight"></div>
                        <p data-aos="fade-left" class="mb-5 per-slide text-white wow fadeInLeft">@lang('section1.slid3.description')</p>
                    </div>

                <!-- </div>
            </div>
        </div> -->
    </div>
</section>
<!-- END SERVICES -->

<!-- START TEAM -->
<section class="section bg-team" id="page3">
    <div class="bg-overlay bg-black opacity-4"></div>
    <div class="container h-100">
        <!-- <div class="row h-100"> -->
            <!-- <div class="col-md-6 my-auto"> -->
                <div id="testimonial-quote"  class="owl-carousel">
                    <!-- Item 1 -->
                    @foreach($our_works as $key => $our_work)
                    <?php
                            $arr = explode("   ", $our_work->img);
                            $first = $arr[0];
                    ?>
                    <div class="item text-center ">
                        <div class="testimonial-quote whitecolor" style="margin-top:134px;margin-bottom:50px;">
                            <div class="team-img mb-4" style="margin:auto;"><img src="{{asset('storage/'. substr($first, '7'))}}" alt="img"></div>
                            @langrtl
                            <h1 class="font-weight-light main-title mb-3 alt-font" style="margin:10px">{!!$our_work->title_ar!!}</h1>
                            <!-- <div class="mb-3 text-center  testimonial-line wow fadeInleft"></div> -->
                            <!-- <div class="team-description mb-1 mb-md-5"><p class="m-0">{!!$our_work->content_ar!!}</p></div> -->
                                 @else
                                 <h1 class="font-weight-light main-title mb-3 alt-font" style="margin:10px">{!!$our_work->title_en!!}</h1>
                            <!-- <div class="mb-3 testimonial-line wow fadeInleft"></div> -->
                            <!-- <div class="team-description mb-1 mb-md-5"><p class="m-0">{!!$our_work->content_en!!}</p></div> -->
                                @endlangrtl
                                <a  href="{{route('our_work.desc' , ['id' => $our_work->id])}}"  class=" btn btn-large btn-rounded btn-blue color-white ">@lang('section1.more_details')</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Owl Dots -->
                <div id="owl-thumbs" class="owl-dots" style="margin-top:20px;">
                @foreach($our_works as $our_work)
                    <?php
                            $arr = explode("   ", $our_work->img);
                            $first = $arr[0];
                    ?>
                    <button class="owl-dot active link"><img src="{{asset('storage/'. substr($first, '7'))}}"  alt="img"></button>
                @endforeach
                </div>
                <div class="team-item d-none"></div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</section>
<!-- END TEAM -->

<!-- START PORTFOLIO -->
<section class="section portfolio-sec" id="page4">
    <div id="content-scroll">
        <h2 class="d-none">services</h2>
        <!-- Showcase Holder -->
        <div id="showcase-holder">
            <div id="showcase-tilt-wrap">
                <div id="showcase-tilt">
                    <div id="showcase-slider" class="swiper-container">
                        <div class="swiper-wrapper">

                            @foreach($services as $key => $service)
                                <!-- First Slide -->
                                @langrtl
                                <div class="swiper-slide"  data-title="{{$service->title_ar}}" data-subtitle="خدمة" data-number="{{++$key}}">
                                    @else
                                <div class="swiper-slide"  data-title="{{$service->title_en}}" data-subtitle="Service" data-number="{{++$key}}">
                                @endlangrtl  
                                    <div class="img-mask">
                                        <img class="section-image" src="{{asset('storage/'. substr($service->img, '7'))}}"></img>
                                        <a style="z-index: 1; position: absolute; bottom: 22%; right: 45%;" href="{{route('service.desc' , ['id' => $service->id])}}" class=" btn btn-large btn-rounded btn-blue color-white ">@lang('section1.more_details')</a>
                                    </div>
                                    <a class="showcase-link-project" data-type="page-transition" href="{{asset('storage/'. substr($service->img, '7'))}}"></a>
                                </div>
                                <!-- /First Slide -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="showcase-pagination-wrap">
                <div class="showcase-counter">
                    <span data-total="{{sizeof($services)}}"></span>
                </div>
                <div class="showcase-pagination"></div>
                <div class="caption-border left"></div>
                <div class="caption-border right"></div>
                <!-- <div class="arrows-wrap ">
                    <div class="prev-wrap animated-wrap swiper-button-prev">up</div>
                    <div class="next-wrap animated-wrap swiper-button-next">down</div>
                </div> -->
            </div>
        </div>
        <!-- Showcase Holder -->

        <!-- Swiper thumbnails -->
        <div class="swiper-thumbnails link">
            @foreach($services as $service)
                <button class="bullet"><img src="{{asset('storage/'. substr($service->img, '7'))}}" > </button>
            @endforeach
        </div>
        <!-- Swiper thumbnails -->
    </div>
</section>
<!-- END PORTFOLIO -->


<!-- START CONTACT -->
<section id="page5" class="section bg-contact bg-dark position-relative" >
    <div class="bg-overlay bg-black opacity-2"></div>
    <div class="bg-overlay bg-black2 opacity-9"></div>
    <div class="container full-screen center-block">
        <div class="contact-body">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12 col-sm-12 contact-form-center wow fadeInUp" data-wow-delay="400ms">
                    <div class="col-sm-12 p-0" id="result"></div>
                    <div class="company-contact-form">
                        <!-- encription for maiilto:info@skyborder.com -->
                        <form action="&#109;&#65;&#73;&#76;&#116;&#79;&#58;&#105;&#110;&#102;&#111;&#64;&#115;&#107;&#121;&#98;&#111;&#114;&#100;&#101;&#114;&#46;&#99;&#111;&#109;" method="post" enctype="text/plain" class="contact-form-outer contact-form" id="contact-form-data">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 md max-width">
                                    <div class="contact-form-textfield pb-4">
                                        <input type="text" placeholder="@lang('section1.name')" class="form-control link" required="" id="name" name="userName">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 max-width">
                                    <div class="contact-form-textfield pb-4">
                                        <input type="text" placeholder="@lang('section1.email')" class="form-control link" required="" id="email" name="userEmail">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-form-textfield pb-4">
                                        <textarea placeholder="@lang('section1.message')" class="form-control message link" id="message" name="userMessage"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-xs-25px text-center">
                                    <button type="submit" class="btn btn-blue btn-large btn-rounded text-uppercase contact_btn"><i class="fa fa-spinner fa-spin mr-2 d-none" aria-hidden="true"></i><b class="font-weight-normal">@lang('section1.send')</b>
                                    </button>
                                </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-title wow fadeIn" data-wow-delay="300ms">
                        <h1 style="font-size: 20px; color:white; margin:10px">  @lang('section1.company_identity') </h1>
                        <h1 style="font-size: 20px; color:white; margin:10px"> <i class="fa fa-map-marker" aria-hidden="true"></i> @lang('section1.company_location') </h1>
                        <h1 style="font-size: 20px; color:white; margin:10px"> <i class="fa fa-phone" aria-hidden="true"></i> <span> </span>0966 50 808 3383 </h1>
                    </div>
                    <div class="main-title wow fadeIn" data-wow-delay="300ms">
                        <!-- <a href="mailto:info@skyborder-sa.com">info@skyborder-sa.com</a> -->
                        <a href="&#109;&#65;&#73;&#76;&#116;&#79;&#58;&#105;&#110;&#102;&#111;&#64;&#115;&#107;&#121;&#98;&#111;&#114;&#100;&#101;&#114;&#46;&#99;&#111;&#109;">info@skyborder-sa.com</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <iframe src="http://maroof.sa/Business/GetStamp?bid=172140" style=" width: auto; height: 280px; overflow-y:hidden; margin-right:-15%;" frameborder="0" seamless='seamless' scrollable="no"></iframe>                
                </div>
            </div>
            </div>
    </div>
</section>
<!-- END CONTACT -->

</div>

<!-- START ANIMATED CURSOR -->
<div id="aimated-cursor">
    <div id="cursor">
        <div id="cursor-loader"></div>
    </div>
</div>
<!-- END ANIMATED CURSOR -->
@endsection
