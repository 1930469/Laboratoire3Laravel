
<!-- ============================================================== -->
<!-- navbar -->
<!-- ============================================================== -->
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-nav-brown fixed-top">
        <a class="navbar-brand" href="{{route('index')}}">Inventaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="{{route('ajout')}}" id="navbarDropdownMenuLink1"><i class="fas fa-plus-circle"></i> </a>
                </li>
                <li class="nav-item " >
                    <div id="custom-search" class="top-search-bar ">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>
                @guest
                    <li class="nav-login" >
                        <a class="login" style="font-size: 15px" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                        <a class="login" style="font-size: 15px" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </li>
                @endguest
                @auth
                <li class="nav-item" >
                        <a class="navbar-brand " style="font-size: 15px" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </li>
                @endauth



            </ul>
        </div>
    </nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->
<!-- ============================================================== -->
