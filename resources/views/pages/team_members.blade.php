@extends('layouts.app')

@section('content')
    <div class="page-banner" style="background-image: url({{ asset('uploads/'.$g_setting->banner_team_member) }})">
        <div class="bg-page"></div>
        <div class="text">
            <h1>{{ $team_member->name }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ HOME }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $team_member->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>


    <style>

        /* RESET STYLES & HELPER CLASSES
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
        :root {
            --level-1: #8dccad;
            --level-2: #f5cc7f;
            --level-3: #7b9fe0;
            --level-4: #f27c8d;
            --black: black;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        ol {
            list-style: none;
        }



        .rectangle {
            position: relative;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }


        /* LEVEL-1 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-1 {
            width: 50%;
            margin: 0 auto 40px;
            background: var(--level-1);
        }

        .level-1::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 20px;
            background: var(--black);
        }


        /* LEVEL-2 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-2-wrapper {
            position: relative;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .level-2-wrapper::before {
            content: "";
            position: absolute;
            top: -20px;
            left: 25%;
            width: 50%;
            height: 2px;
            background: var(--black);
        }

        .level-2-wrapper::after {
            display: none;
            content: "";
            position: absolute;
            left: -20px;
            bottom: -20px;
            width: calc(100% + 20px);
            height: 2px;
            background: var(--black);
        }

        .level-2-wrapper li {
            position: relative;
        }

        .level-2-wrapper > li::before {
            content: "";
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 20px;
            background: var(--black);
        }

        .level-2 {
            width: 70%;
            margin: 0 auto 40px;
            background: var(--level-2);
        }

        .level-2::before {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 20px;
            background: var(--black);
        }

        .level-2::after {
            display: none;
            content: "";
            position: absolute;
            top: 50%;
            left: 0%;
            transform: translate(-100%, -50%);
            width: 20px;
            height: 2px;
            background: var(--black);
        }


        /* LEVEL-3 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-3-wrapper {
            position: relative;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 20px;
            width: 90%;
            margin: 0 auto;
        }

        .level-3-wrapper::before {
            content: "";
            position: absolute;
            top: -20px;
            left: calc(25% - 5px);
            width: calc(50% + 10px);
            height: 2px;
            background: var(--black);
        }

        .level-3-wrapper > li::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -100%);
            width: 2px;
            height: 20px;
            background: var(--black);
        }

        .level-3 {
            margin-bottom: 20px;
            background: var(--level-3);
        }


        /* LEVEL-4 STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .level-4-wrapper {
            position: relative;
            width: 80%;
            margin-left: auto;
        }

        .level-4-wrapper::before {
            content: "";
            position: absolute;
            top: -20px;
            left: -20px;
            width: 2px;
            height: calc(100% + 20px);
            background: var(--black);
        }

        .level-4-wrapper li + li {
            margin-top: 20px;
        }

        .level-4 {
            font-weight: normal;
            background: var(--level-4);
        }

        .level-4::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0%;
            transform: translate(-100%, -50%);
            width: 20px;
            height: 2px;
            background: var(--black);
        }


        /* MQ STYLES
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        @media screen and (max-width: 700px) {
            .rectangle {
                padding: 20px 10px;
            }

            .level-1,
            .level-2 {
                width: 100%;
            }

            .level-1 {
                margin-bottom: 20px;
            }

            .level-1::before,
            .level-2-wrapper > li::before {
                display: none;
            }

            .level-2-wrapper,
            .level-2-wrapper::after,
            .level-2::after {
                display: block;
            }

            .level-2-wrapper {
                width: 90%;
                margin-left: 10%;
            }

            .level-2-wrapper::before {
                left: -20px;
                width: 2px;
                height: calc(100% + 40px);
            }

            .level-2-wrapper > li:not(:first-child) {
                margin-top: 50px;
            }
        }

    </style>



    <div class="container">
        <h1 style="text-align: center" class="level-1 rectangle">CEO</h1>
        <ol class="level-2-wrapper">
            <li>
                <h2 style="text-align: center" class="level-2 rectangle">Director A</h2>
                <ol class="level-3-wrapper">
                    <li>
                        <h3 class="level-3 rectangle">Manager A</h3>
                        <ol class="level-4-wrapper">
                            <li>
                                <h4 class="level-4 rectangle">Person A</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person B</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person C</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person D</h4>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <h3 class="level-3 rectangle">Manager B</h3>
                        <ol class="level-4-wrapper">
                            <li>
                                <h4 class="level-4 rectangle">Person A</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person B</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person C</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person D</h4>
                            </li>
                        </ol>
                    </li>

                </ol>
            </li>
            <li>
                <h2 style="text-align: center"  class="level-2 rectangle">Director B</h2>
                <ol class="level-3-wrapper">
                    <li>
                        <h3 class="level-3 rectangle">Manager C</h3>
                        <ol class="level-4-wrapper">
                            <li>
                                <h4 class="level-4 rectangle">Person A</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person B</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person C</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person D</h4>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <h3 class="level-3 rectangle">Manager D</h3>
                        <ol class="level-4-wrapper">
                            <li>
                                <h4 class="level-4 rectangle">Person A</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person B</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person C</h4>
                            </li>
                            <li>
                                <h4 class="level-4 rectangle">Person D</h4>
                            </li>
                        </ol>
                    </li>
                </ol>
            </li>
        </ol>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! $team_member->detail !!}
                </div>
            </div>
            <div class="row team pt_0 pb_40">
                @foreach($team_members as $row)
                    <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="team-item">
                            <div class="team-photo">
                                <a href="{{ url('team-member/'.$row->slug) }}" class="team-photo-anchor">
                                    <img style="border-radius: 50%;" src="{{ asset('uploads/'.$row->photo) }}" alt="Team Member Photo">
                                </a>
                            </div>
                            <div class="team-text">
                                <h4><a href="{{ url('team-member/'.$row->slug) }}">{{ $row->name }}</a></h4>
                                <p>{{ $row->designation }}</p>
                                @if($row->facebook != '' || $row->twitter != '' || $row->linkedin != '' || $row->youtube != '' || $row->instagram != '')
                                <div class="team-social">
                                    <ul>
                                        @if($row->facebook != '')
                                            <li><a href="{{ $row->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif

                                        @if($row->twitter != '')
                                            <li><a href="{{ $row->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        @endif

                                        @if($row->linkedin != '')
                                            <li><a href="{{ $row->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if($row->youtube != '')
                                            <li><a href="{{ $row->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        @endif
                                        @if($row->instagram != '')
                                            <li><a href="{{ $row->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        @endif

                                    </ul>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $team_members->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
