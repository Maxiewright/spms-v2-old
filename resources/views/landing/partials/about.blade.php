<section class="page-section bg-primary" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Built with you in mind!</h2>
                <hr class="divider light my-4"/>
                <p class="text-white-75 mb-4">
                    Here, those who spend their time taking care of others, are taken care of.
                    It is time to ensure that we properly look after of those who spend their time
                    looking after the interest of our beloved nation
                </p>
                @if (Route::has('login'))
                    @auth
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="{{route('dashboard')}}"> Dashboard</a>
                    @else
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="{{route('login')}}">Login</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</section>
