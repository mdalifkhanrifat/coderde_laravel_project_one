@extends('layouts.app')

@section('content')
<div class="slider">
    <div class="slide-carousel owl-carousel">
        @foreach($sliders as $row)
        <div class="slider-item" style="background-image:url({{ asset('uploads/'.$row->slider_photo) }});">
            <div class="slider-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="slider-table">
                            <div class="slider-text">
                                <div class="text-animated">
                                    <h1>{{ $row->slider_heading }}</h1>
                                </div>
                                <div class="text-animated">
                                    <p>
                                        {!! nl2br(e($row->slider_text)) !!}
                                    </p>
                                </div>
                                <div class="text-animated">
                                    <ul>
                                        <li><a href="{{ $row->slider_button_url }}">{{ $row->slider_button_text }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


{{-- <h2 style="font-weight: bold;background-color: #35363a;color: white;"> Letest News:</h2> --}}
{{--
<div class="container-fluid" style="background-color: #35363a;color: white; margin: 0; padding: 0; border: 0; height: 35px ">
   <div class="row">
    <div class="col-md-2" style="font-weight: bold;" >
       <p style="margin-left: 5px; font-size: 20px;"> {{'Letest News:'}}</p>
    </div>
    <div class="col-md-10" class="">
        <marquee scrollamount="15"  direction="left" style="margin: 0; padding: 0;">
            <div class="" style="margin: 0; padding: 0;">
                Comming soon.....
            </div>
        </marquee>
    </div>
   </div>
</div> --}}



<style>

    .latest-news-container {
        display: flex;
        height: 30px;
    }


    #fixed-column {
        flex: 0 0 auto;
        background-color: #f0f0f0;
        padding: 10px;
        display: flex;
        align-items: center;
        font-weight: bold;
        font-size: 20px;
    }


    #marquee-column {
        flex: 1;
        overflow: hidden;
        background-color: #3a3b45;
    }

    #marquee-text {
        white-space: nowrap;
        display: inline-block;
        animation: marqueeAnimation 18s linear infinite;
        width: 100%;
        color: white;
        font-size: 20px;
    }

    @keyframes marqueeAnimation {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
</style>

@if($marquee->status == 'Show')
    <div class="latest-news-container">
        <div id="fixed-column" style="color: #2e59d9">
            Trending :
        </div>
        <div id="marquee-column">
            <span id="marquee-text">
                {{$marquee->detail}}
            </span>
        </div>
    </div>
@endif





{{--@if($page_home->why_choose_status == 'Show')--}}
{{--<div class="feature">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="heading wow fadeInUp">--}}
{{--                    <h2>{{ $page_home->why_choose_title }}</h2>--}}
{{--                    <h3>{{ $page_home->why_choose_subtitle }}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @foreach($why_choose_items as $row)--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="feature-item wow fadeInUp">--}}
{{--                    <div class="icon">--}}
{{--                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="">--}}
{{--                    </div>--}}
{{--                    <h4>{{ $row->name }}</h4>--}}
{{--                    <p>--}}
{{--                        {!! nl2br(e($row->description)) !!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endif--}}


@if($page_home->special_status == 'Show')
<div class="special" style="background-image: url({{ asset('uploads/'.$page_home->special_bg) }});">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow fadeInLeft">
                <h2>{{ $page_home->special_title }}</h2>
                <h3>{{ $page_home->special_subtitle }}</h3>
                <p>
                    {!! nl2br(e($page_home->special_content)) !!}
                </p>
                <div class="read-more">
                    <a href="{{ $page_home->special_btn_url }}" class="btn btn-primary btn-arf">{{ $page_home->special_btn_text }}</a>
                </div>
            </div>
            <div class="col-md-6 wow fadeInRight">
                <div class="video-section" style="background-image: url({{ asset('uploads/'.$page_home->special_video_bg) }})">
                    <div class="bg video-section-bg"></div>
                    <div class="video-button-container">
                        <a class="video-button" href="https://www.youtube.com/watch?v={{ $page_home->special_yt_video }}"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->service_status == 'Show')
<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->service_title }}</h2>
                    <h3>{{ $page_home->service_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="service-carousel owl-carousel">
                    @foreach($services as $row)
                    <div class="service-item wow fadeInUp">
                        <div class="photo">
                            <a href="{{ url('service/'.$row->slug) }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ url('service/'.$row->slug) }}">{{ $row->name }}</a></h3>
                            <p>
                                {!! nl2br(e($row->short_description)) !!}
                            </p>
                            <div class="read-more d-inline">
                                <a class="d-inline" href="{{ url('service/'.$row->slug) }}">{{ READ_MORE }}</a>
                            </div>

                            @php
                            if($row->working_status  == 1 ){
                            @endphp
                             <a class="d-inline float-right btn btn-secondary btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#">Processing </a>
                             @php
                            } else if($row->working_status  ==2){
                             @endphp
                             <a class="d-inline float-right btn btn-success btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#">Active </a>
                             @php
                            } else{
                             @endphp
                             <a class="d-inline float-right btn btn-info btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#">Up comming </a>
                            @php
                            }
                            @endphp
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->testimonial_status == 'Show')
<div class="testimonial" style="background-image: url({{ asset('uploads/'.$page_home->testimonial_bg) }});">
    <div class="testimonial-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->testimonial_title }}</h2>
                    <h3>{{ $page_home->testimonial_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="testimonial-carousel owl-carousel">
                    @foreach($testimonials as $row)
                    <div class="testimonial-item wow fadeInUp">
                        <div class="photo">
                            <img src="{{ asset('uploads/'.$row->photo) }}" alt="">
                        </div>
                        <div class="text">
                            <p>
                                {!! nl2br(e($row->comment)) !!}
                            </p>
                            <h3>{{ $row->name }}</h3>
                            <h4>{{ $row->designation }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->project_status == 'Show')
<div class="project">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->project_title }}</h2>
                    <h3>{{ $page_home->project_subtitle }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="project-carousel owl-carousel">
                    @foreach($projects as $row)
                    <div class="project-item wow fadeInUp">
                        <div class="photo">
                            <a href="{{ url('project/'.$row->project_slug) }}"><img src="{{ asset('uploads/'.$row->project_featured_photo) }}" alt=""></a>
                        </div>
                        <div class="text">
                            <h3><a href="{{ url('project/'.$row->project_slug) }}">{{ $row->project_name }}</a></h3>
                            <p>
                                {!! nl2br(e($row->project_content_short)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('project/'.$row->project_slug) }}">{{ READ_MORE }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif


{{--@if($page_home->team_member_status == 'Show')--}}
{{--<div class="team bg-lightblue">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="heading wow fadeInUp">--}}
{{--                    <h2>{{ $page_home->team_member_title }}</h2>--}}
{{--                    <h3>{{ $page_home->team_member_subtitle }}</h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="team-carousel owl-carousel">--}}
{{--                    @foreach($team_members as $row)--}}
{{--                    <div class="team-item wow fadeInUp">--}}
{{--                        <div class="team-photo">--}}
{{--                            <a href="{{ url('team-member/'.$row->slug) }}" class="team-photo-anchor">--}}
{{--                                <img src="{{ asset('uploads/'.$row->photo) }}" alt="Team Member Photo">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="team-text">--}}
{{--                            <h4><a href="{{ url('team-member/'.$row->slug) }}">{{ $row->name }}</a></h4>--}}
{{--                            <p>{{ $row->designation }}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endif--}}




<h3 style="font-size: 24px; font-family: inherit;font-weight: bold;line-height: 1.1;color: inherit;margin-left: 670px;">OUR CLIENTS</h3> <hr>
<style>
    .column {
        float: left;
        width: 25%;
        padding: 10px;
    }


    /*.column img {*/
    /*    opacity: 0.8;*/
    /*    cursor: pointer;*/
    /*}*/

    /*.column img:hover {*/
    /*    opacity: 1;*/
    /*}*/


    .row:after {
        content: "";
        display: table;
        clear: both;
    }



</style>

<marquee scrollamount="18"  direction="left" >
    <div class="container">

        <div class="row">
            @foreach ($client as $row)

            <div class="column">
                <img height="40" width="40" src="{{ asset('uploads/'.$row->client_photo) }}"alt="DWASA" onclick="myFunction(this);">
            </div>
                
            @endforeach
            
        </div>
    </div>
</marquee>

</section>

@if($page_home->appointment_status == 'Show')
<div class="cta" style="background-image: url({{ asset('uploads/'.$page_home->appointment_bg) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cta-box text-center">
                    <h2>{{ $page_home->appointment_title }}</h2>
                    <p class="mt-3">
                        {!! nl2br(e($page_home->appointment_text)) !!}
                    </p>
                    <a href="{{ $page_home->appointment_btn_url }}" class="btn btn-primary">{{ $page_home->appointment_btn_text }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($page_home->latest_blog_status == 'Show')
<div class="blog-area">
    <div class="container wow fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="heading wow fadeInUp">
                    <h2>{{ $page_home->latest_blog_title }}</h2>
                    <h3>{{ $page_home->latest_blog_subtitle }}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="blog-carousel owl-carousel">

                    @foreach($blogs as $row)
                    <div class="blog-item wow fadeInUp">
                        <a href="{{ url('blog/'.$row->blog_slug) }}">
                            <div class="blog-image">
                                <img src="{{ asset('uploads/'.$row->blog_photo) }}" alt="Blog Image">
                                <div class="date">
                                    <h3>{{ \Carbon\Carbon::parse($row->created_at)->format('d') }}</h3>
                                    <h4>{{ \Carbon\Carbon::parse($row->created_at)->format('M') }}</h4>
                                </div>
                            </div>
                        </a>
                        <div class="blog-text">
                            <h3><a href="{{ url('blog/'.$row->blog_slug) }}">{{ $row->blog_title }}</a></h3>
                            <p>
                                {!! nl2br(e($row->blog_content_short)) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{ url('blog/'.$row->blog_slug) }}">{{ READ_MORE }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if($page_home->newsletter_status == 'Show')
<div class="newsletter-area" style="background-image: url({{ asset('uploads/'.$page_home->newsletter_bg) }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 newsletter">
                <div class="newsletter-text wow fadeInUp">
                    <h2>{{ $page_home->newsletter_title }}</h2>
                    <p>
                        {!! nl2br(e($page_home->newsletter_text)) !!}
                    </p>
                </div>
                <div class="newsletter-button wow fadeInUp">
                    <form action="{{ route('front.subscription') }}" method="post" class="frm_newsletter justify-content-center">
                        @csrf
                        <input type="text" placeholder="{{ EMAIL_ADDRESS }}" name="subs_email">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
