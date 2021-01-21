<div>


<!-- BEGIN: Data Search and Filter -->
<div class="intro-y flex flex-col-reverse sm:flex-row items-center">
    <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
        <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" data-feather="search"></i>
        <input wire:model="search" type="text"
               class="input w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13"
               placeholder="Search {{Str::plural(ucfirst($title))}}">
        <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-placement="bottom-start">
            <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700 dark:text-gray-300" data-feather="chevron-down"></i>
            <div class="inbox-filter__dropdown-box dropdown-box pt-2">
                <div class="dropdown-box__content box p-5">
                    <div class="grid grid-cols-12 gap-4 gap-y-3">
                        {{$filters}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full sm:w-auto flex">
        <a wire:click="create()"
           class="button text-white bg-theme-1 shadow-md mr-2"
           href="javascript:;"
           data-toggle="modal"
           data-target="#delete-confirmation-modal"> Add {{ucfirst($title)}}
        </a>
         {{--Additional Options - Print etc --}}
        <div class="dropdown">
            <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-feather="plus"></i>
                </span>
            </button>
            <div class="dropdown-box w-40">
{{--                <div class="dropdown-box__content box dark:bg-dark-1 p-2">--}}
{{--                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">--}}
{{--                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Contacts--}}
{{--                    </a>--}}
{{--                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">--}}
{{--                        <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<!-- END: Data Search and Filter -->

<!-- START: Data Table -->
<div class="intro-y box p-5 mt-5">
    {{$slot}}
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
        <div class="xl:flex sm:mr-auto">
            {{--For Data table items --}}
        </div>
        <div class="flex mt-5 sm:mt-0">
            <button class="button w-1/2 sm:w-auto flex items-center border text-gray-700 mr-2 dark:bg-dark-5 dark:text-gray-300" id="tabulator-print">
                <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print
            </button>
            <div class="dropdown w-1/2 sm:w-auto">
                <button class="dropdown-toggle button w-full sm:w-auto flex items-center border text-gray-700 dark:bg-dark-5 dark:text-gray-300">
                    <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export <i data-feather="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i>
                </button>
                <div class="dropdown-box w-40">
                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" id="tabulator-export-csv">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export CSV
                        </a>
                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" id="tabulator-export-json">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export JSON
                        </a>
                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" id="tabulator-export-xlsx">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export XLSX
                        </a>
                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" id="tabulator-export-html">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export HTML
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START: Table -->
    <div class="mt-5" id="responsive-table">
        <div class="overflow-x-auto">
            <table class="table">
                <thead class="border-t">
                <tr>
                    {{$thead}}
                </tr>
                </thead>
                <tbody>
                {{$tbody}}
                </tbody>
            </table>
        </div>
    </div>
    <!-- END: Table -->

    <!-- BEGIN: Pagination -->
    <div class="mt-5 intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <div class="container">
            {{$pagination}}
        </div>
    </div>
    <!-- END: Pagination -->
</div>
<!-- END: Data Table-->
</div>

{{--<div class="intro-y box mt-5">--}}
{{--    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">--}}
{{--        <h2 class="font-medium text-base mr-auto">{{Str::plural(ucfirst($title))}}</h2>--}}
{{--        {{$slot}}--}}
{{--        <div class="flex flex-row mr-2">--}}
{{--            {{$filters}}--}}
{{--        </div>--}}
{{--        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-2">--}}

{{--            <div class="w-56 relative text-gray-700 dark:text-gray-300">--}}
{{--                <input wire:model="search" type="text" class="input w-56 box pr-10 placeholder-theme-13"--}}
{{--                       placeholder="Search...">--}}
{{--                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <a wire:click="create()"--}}
{{--           class="flex items-center text-theme-7"--}}
{{--           href="javascript:;"--}}
{{--           data-toggle="modal"--}}
{{--           data-target="#delete-confirmation-modal">--}}
{{--            <i data-feather="plus-square" class="w-4 h-4 mr-1"></i> Add {{ucfirst($title)}}--}}
{{--        </a>--}}

{{--    </div>--}}
{{--    <!-- END: Data table -->--}}
{{--    <div class="p-5" id="responsive-table">--}}
{{--        <div class="overflow-x-auto">--}}
{{--            <table class="table">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    {{$thead}}--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                {{$tbody}}--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- END: Data table -->--}}
{{--    <!-- BEGIN: Pagination -->--}}
{{--    <div class="px-5 pb-5 intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">--}}
{{--        <div class="container">--}}
{{--            {{$pagination}}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- END: Pagination -->--}}
{{--</div>--}}
