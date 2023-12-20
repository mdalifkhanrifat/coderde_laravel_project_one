@php
    $menus = DB::table('menus')->get();
    $menu_arr = [];
@endphp

@foreach ($menus as $row)
    @php
        $menu_arr[$row->menu_name] = $row->menu_status;
    @endphp
@endforeach


<!-- Navbar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('uploads/' . $g_setting->logo) }}" width="50" height="40"
            class="d-inline-block align-top" alt=""> <b>Shawal Enterprise</b>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <div class="mr-auto navbar-nav ms-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold; font-size: 18px; color: black;">
                    Home
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('front.about') }}">About Us</a>
                    <a class="dropdown-item" href="{{ route('front.team_members') }}">Team Member</a>
                    <a class="dropdown-item" href="{{ route('front.contact') }}">Contact</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkRight" role="button"
                    data-mdb-toggle="dropdown" aria-expanded="false" style="font-weight: bold; font-size: 18px; color: black;">
                    Our Service
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkRight">
                    <li>
                        <a class="dropdown-item" href="#">Eng. Arch Wings</a>

                        <ul class="dropdown-menu dropdown-submenu dropdown-submenu-right">
                            <li>
                                <a class="dropdown-item" href="{{ route('front.eng-work') }}">Engineering Works</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('front.architectural-work') }}">Architectural Works</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a class="dropdown-item" href="#"> Consultancy </a>
                        <ul class="dropdown-menu dropdown-submenu dropdown-submenu-right">
                            <li>
                                <a class="dropdown-item" href="{{ route('front.civil-consultancy') }}">Civil Consultancy</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('front.architecture-consultancy') }}">Architecture Consultancy</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('front.electrical-consultancy') }}">Electrical Consultancy</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold; font-size: 18px; color: black;">
                    Alliance
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('front.foundation') }}">Foundation</a>
                    <a class="dropdown-item" href="{{ route('front.research') }}">Research</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold; font-size: 18px; color: black;">
                    Archive
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('front.photo_gallery') }}">Photos</a>
                    <a class="dropdown-item" href="{{ route('front.video_gallery') }}">Videos</a>
                </div>
            </li>

        </ul>

    </div>

</nav>

<!-- End Navbar Area -->
