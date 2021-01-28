
    @extends('../layout/' . $layout)

    @section('subhead')
        <title>{{$subHead}}</title>
    @endsection

    @section('subcontent')
        <div class="grid grid-cols-12 gap-6 mt-8">
            <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
                <h2 class="intro-y text-lg font-medium mr-auto mt-2">{{$subHead}}</h2>
                <!-- BEGIN: Menu -->
                <div class="intro-y box bg-theme-1 p-5 mt-6" id="side-nav-tabs">
                    <button type="button" class="button button--lg flex items-center justify-center text-gray-700 dark:text-gray-300 w-full bg-white dark:bg-theme-1 mt-2">
                        {{Str::plural(ucfirst($title))}}
                    </button>
                        <div class=" nav-tabs border-t border-theme-3 dark:border-dark-5 mt-6 pt-6 text-white">
                            {{$tabs}}
                        </div>
                </div>
                <!-- END: Menu -->
            </div>
            <!-- BEGIN: Tabs -->
            <div class="tab-content col-span-12 lg:col-span-9 xxl:col-span-10">
                {{$tabContent}}
            </div>
            <!-- END: Tabs -->
        </div>
    @endsection

