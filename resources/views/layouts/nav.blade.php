@php
    $menus = DB::table('menus')->get();
    $menu_arr = [];
@endphp

@foreach ($menus as $row)
    @php
        $menu_arr[$row->menu_name] = $row->menu_status;
    @endphp
@endforeach

<!-- Start Navbar Area -->
<!-- Navbar-->
<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="" class="logo">
            <img src="{{ asset('uploads/' . $g_setting->logo) }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        {{-- <div class="container"> --}}
            <nav class="navbar navbar-expand-md navbar-light">
                <a style="float:left" class="navbar-brand" href="{{ url('/') }}">
                    <img  style="height: 60px; width: 100px;margin-left: 20px; float: left;
                    "
                        src="{{ asset('uploads/' . $g_setting->logo) }}" alt="logo">
                        <a href="{{ url('/') }}">
                            <p style="font-size: 20px; margin-top: 8px;font-family: 'Arial', sans-serif;font-weight: bold;">
                                Shawal Enterprise</p>
                        </a>
                </a>
                

                <div style="float:right" class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        @if ($menu_arr['Home'] == 'Show')
                            <li class="nav-item" style="font-size:12px">
                                <a  href="{{ url('/') }}" class="nav-link dropdown-toggle">{{ MENU_HOME }}</a>

                                <ul class="dropdown-menu">

                                    <li class="nav-item">
                                        <a href="{{ route('front.about') }}" class="nav-link">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('front.group-info') }}" class="nav-link">Group Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('front.contact') }}" class="nav-link">Contact</a>
                                    </li>
                                </ul>

                            </li>
                        @endif

                        @if ($menu_arr['About'] == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.about') }}" class="nav-link ">{{ MENU_ABOUT }}</a>
                            </li>
                        @endif


                        <li class="nav-item">
                            <a href="https://shawalbd.com/projects" class="nav-link dropdown-toggle ">Eng & Arch
                                Wings</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Engineering Works</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Architectural Works</a>
                                </li>
                            </ul>
                        </li>


                        @if ($menu_arr['Services'] == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.services') }}" class="nav-link ">Research</a>
                            </li>
                        @endif

                        @if ($menu_arr['Contact'] == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.contact') }}" class="nav-link ">Foundation</a>
                            </li>
                        @endif



                        {{--                            @if ($menu_arr['Contact'] == 'Show') --}}
                        {{--                                <li class="nav-item"> --}}
                        {{--                                    <a href="{{ route('front.contact') }}" class="nav-link ">Consultancy</a> --}}
                        {{--                                    <ul class="dropdown-menu"> --}}


                        {{--                                        <li class="nav-item"> --}}
                        {{--                                            <a href="#" class="nav-link">Civil Consultancy</a> --}}
                        {{--                                        </li> --}}
                        {{--                                        <li class="nav-item"> --}}
                        {{--                                            <a href="#" class="nav-link">Architectural Consultancy</a> --}}
                        {{--                                        </li> --}}
                        {{--                                        <li class="nav-item"> --}}
                        {{--                                            <a href="#" class="nav-link">Electrical Consultancy</a> --}}
                        {{--                                        </li> --}}

                        {{--                                    </ul> --}}
                        {{--                                </li> --}}
                        {{--                            @endif --}}



                        @if ($menu_arr['Shop'] == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.shop') }}" class="nav-link ">{{ MENU_SHOP }}</a>
                            </li>
                        @endif

                        @if ($menu_arr['Blog'] == 'Show')
                            <li class="nav-item">
                                <a href="{{ route('front.blogs') }}" class="nav-link ">{{ MENU_BLOG }}</a>
                            </li>
                        @endif

                        @php
                            $dynamic_pages = DB::table('dynamic_pages')->get();
                        @endphp

                        @if (
                            $menu_arr['Career'] == 'Hide' &&
                                $menu_arr['Project'] == 'Hide' &&
                                $menu_arr['Photo Gallery'] == 'Hide' &&
                                $menu_arr['Video Gallery'] == 'Hide' &&
                                $menu_arr['FAQ'] == 'Hide' &&
                                $menu_arr['Team Members'] == 'Hide' &&
                                !$dynamic_pages)
                        @else
                            <li class="nav-item">
                                {{--                            <a href="javascript:void(0);" class="nav-link dropdown-toggle">{{ MENU_PAGES }}</a> --}}
                                <a href="javascript:void(0);" class="nav-link dropdown-toggle">Consultancy</a>
                                <ul class="dropdown-menu">




                                    {{--                                @if ($menu_arr['Career'] == 'Show') --}}
                                    {{--                                <li class="nav-item"> --}}
                                    {{--                                    <a href="#" class="nav-link">Civil Consultancy</a> --}}
                                    {{--                                </li> --}}
                                    {{--                                @endif --}}

                                    @if ($menu_arr['Project'] == 'Show')
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="{{ route('front.projects') }}" class="nav-link">{{ MENU_PROJECTS }}</a>-->
                                        <!--</li>-->
                                    @endif

                                    @if ($menu_arr['Photo Gallery'] == 'Show')
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">Civil Consultancy</a>
                                        </li>
                                    @endif

                                    @if ($menu_arr['Video Gallery'] == 'Show')
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">Architectural Consultancy</a>
                                        </li>
                                    @endif

                                    @if ($menu_arr['Video Gallery'] == 'Show')
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">Electrical Consultancy</a>
                                        </li>
                                    @endif

                                    @if ($menu_arr['FAQ'] == 'Show')
                                        <li class="nav-item">
                                            <a href="{{ route('front.faq') }}"
                                                class="nav-link">{{ MENU_FAQ }}</a>
                                        </li>
                                    @endif

                                    @if ($menu_arr['Team Members'] == 'Show')
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="{{ route('front.team_members') }}" class="nav-link">{{ MENU_TEAM_MEMBERS }}</a>-->
                                        <!--</li>-->
                                    @endif

                                    {{--                                @foreach ($dynamic_pages as $row) --}}
                                    {{--                                    <li class="nav-item"> --}}
                                    {{--                                        <a href="#" class="nav-link">Civil Consultancy</a> --}}
                                    {{--                                    </li> --}}
                                    {{--                                @endforeach --}}

                                </ul>


                            </li>

                        @endif
                        <li class="nav-item">
                            <a href="https://shawalbd.com/team-members" class="nav-link ">Team Members</a>
                        </li>

                        <li class="nav-item">
                            <a href="https://shawalbd.com/team-members" class="nav-link dropdown-toggle">Business
                                Development</a>
                            <ul class="dropdown-menu">


                                <li class="nav-item">
                                    <a href="#" class="nav-link">Sales & Marketing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Purchase & Production</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    {{-- </div> --}}
</div>
  <!-- Navbar -->
<!-- End Navbar Area -->
