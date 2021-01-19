<div>
    @extends('../layout/' . $layout)

    @section('subhead')
        <title>{{$subHead}}</title>
    @endsection

    @section('subcontent')
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">{{$subHead}}</h2>
        </div>
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Menu -->
            <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                <div class="intro-y box mt-5">
                    <div class="relative flex items-center p-5">
                        <div class="ml-4 mr-auto">
                            <div class="font-medium text-base">{{$title}}</div>
                        </div>
                    </div>
                    <div class="nav-tabs px-5 pb-5 border-t border-gray-200 dark:border-dark-5">
                        {{$tabs}}
                    </div>
                </div>
            </div>
            <!-- END: Menu -->

            <!-- BEGIN: Tabs -->
            <div class="tab-content col-span-12 lg:col-span-8 xxl:col-span-9">
                {{$tabContent}}
            </div>
            <!-- END: Tabs -->
        </div>
    @endsection
</div>
