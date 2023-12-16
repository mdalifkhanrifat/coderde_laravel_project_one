@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_about) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $eng_work->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $eng_work->name }}</li>
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
                                            <div class="read-more">
                                                <a href="{{ url('service/'.$row->slug) }}">{{ READ_MORE }}</a>
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
