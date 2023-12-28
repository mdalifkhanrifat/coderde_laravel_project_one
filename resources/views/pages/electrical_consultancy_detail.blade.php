@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_electrical_consultancy_detail) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $ele_cons_detail->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.electrical-consultancy') }}"> {{"Electrical-Consultancy"}} </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $ele_cons_detail->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-section">
                        <div class="featured-photo">
                            <img src="{{ asset('uploads/'.$ele_cons_detail->photo) }}">
                        </div>
                        <div class="text">
                            <h2>{{ $ele_cons_detail->name }}</h2>
                            {!!  $ele_cons_detail->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <h3> ALL ELECTRICAL CONSULTANCY </h3>
                            <div class="type-2">
                                <ul>
                                    @foreach($ele_cons_items as $row)
                                    <li>
                                        <img src="{{ asset('uploads/'.$row->photo) }}">
                                        <a href="{{ url('electrical-consultancy/'.$row->slug) }}">{{ $row->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
