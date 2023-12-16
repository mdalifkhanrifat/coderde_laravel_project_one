@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_about) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $about->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $about->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
<br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="box">
                    <a href="#" class="block-20 rounded"><img style="width: 100%; height: 100%;" src="{{ asset('uploads/blog-3.png') }}" alt="Shawal Enterprise">
                    </a>
                </div>
                <br>

            </div>
            <div class="col-sm-8">
                <h2 style="font-weight: bold">About Shawal Enterprise</h2>


                <p>We, Shawal Enterprise are one of the finest and fastest growing business organization in Bangladesh and a successful and reputable brand name in the national level that has built up a reputation in delivering project and partnering with only the best market leader within their spectrum. We are actively involved with the architectural, structural, electrical, plumbing, fire- fighting system design & consultancy, all type of survey & soil test, etc.
                    We are working as a 1st class Govt. contractor & supplier of Civil, Electrical, Mechanical, IT Sector, etc.
                    We also active Apartment/Flat Sales Center.
                    We are  not only concern about our business growth but also at the same time we are highly devoted to social welfare and philanthropic activities. Our Daulat  Saleha Welfare Foundation constantly working in the area of education by providing stipends to the meritorious students, in medical services by treating the rural poor people. It also extends aids during any natural calamities and national crisis situations like covid 19 etc.</p>


            </div>
        </div>
    </div>

@endsection
