@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_engineering_work) }})">
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

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $eng_work->detail !!}
                </div>
            </div>
            <div class="row service pt_0 pb_0">
                @foreach($eng_work_items as $row)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item wow fadeInUp mb_30">
                    <div class="photo">
                        <a href="{{ url('engineering-work/'.$row->slug) }}"><img src="{{ asset('uploads/'.$row->photo) }}" alt=""></a>
                    </div>
                    <div class="text">
                        <h3><a href="{{ url('engineering-work/'.$row->slug) }}">{{ $row->name }}</a></h3>
                        <p>
                            {!! nl2br(e($row->short_description)) !!}
                        </p>
                        <div class="read-more d-inline">
                            <a class="d-inline" href="{{ url('engineering-work/'.$row->slug) }}">{{ READ_MORE }}</a>
                        </div>

                        @php
                        if($row->working_status  == 1 ){
                        @endphp
                        <a class="d-inline float-right btn btn-secondary btn-sm" style="border-radius: 45px; font-size: 12px;" valign="buttom" href="#"> {{'On going'}} </a>
                        @php
                        } else if($row->working_status == 2){
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
            <div class="row">
                <div class="col-md-12">
                    {{ $eng_work_items->links() }}
                </div>
            </div>
        </div>
    </div>



@endsection
