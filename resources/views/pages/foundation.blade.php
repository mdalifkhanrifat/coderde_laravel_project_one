@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_about) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $foundation_page->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $foundation_page->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
<br>
    <div class="container">

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
                                <div class="row service pt_0 pb_0">
                                    @foreach($services as $row)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="service-item wow fadeInUp mb_30">
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
                                             <a class="d-inline float-right btn btn-secondary btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#">Ongoing </a>
                                             @php
                                            } else if($row->working_status  ==2){
                                             @endphp
                                             <a class="d-inline float-right btn btn-success btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#">Completed </a>
                                             @php
                                            } else{
                                             @endphp
                                             <a class="d-inline float-right btn btn-info btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#">Up comming </a>
                                            @php
                                            }
                                            @endphp

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
    </div>

@endsection
