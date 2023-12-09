@extends('layouts.app')

@section('content')
    <div class="page-banner" >
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $group_info->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $group_info->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $group_info->detail !!}
                </div>
            </div>
        </div>
    </div>
@endsection
