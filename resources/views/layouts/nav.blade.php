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
    <a class="navbar-brand" href="#">
        <img src="{{ asset('uploads/' . $g_setting->logo) }}" width="50" height="35"
            class="d-inline-block align-top" alt="">
            Shawal Enterprise
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <div class="mr-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Home
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">About Us</a>
                    <a class="dropdown-item" href="#">Team Member</a>
                    <a class="dropdown-item" href="#">Conbet</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Our Service
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Eng. Arch Wings</a>
                    <a class="dropdown-item" href="#">Consultancy</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Alliance
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Foundation</a>
                    <a class="dropdown-item" href="#">Research</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Archive
                </a>
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Photos</a>
                    <a class="dropdown-item" href="#">Video</a>
                </div>
            </li>
        </ul>
    </div>

</nav>

<!-- End Navbar Area -->
