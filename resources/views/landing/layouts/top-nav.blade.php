<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <img src="{{asset('assets/landing/ttr-Logo.png')}}" style="width: 50px" alt="">
            <span class="ml-2">Trinidad and Tobago Regiment</span>
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                @if (auth()->check())
                    @auth
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                @endif
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a></li>
                @if (auth()->check())
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </a>
                        </li>
                    </form>
                @endif
            </ul>
        </div>
    </div>
</nav>
