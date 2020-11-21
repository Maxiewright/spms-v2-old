<div>
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    {{--                    <img alt="SpMS" class="w-6" src="">--}}
                    <span class="text-white text-lg ml-3">
                        SpMS
                    </span>
                </a>
                <div class="my-auto">
                    {{$events}}
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">{{$title}}</h2>
                    <div class="intro-x mt-8">
                        @if ($errors->any())
                            <div>
                                <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{$slot}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
