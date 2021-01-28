@props(['title' => null, 'advanceSearchToggle' => null])
    <!-- BEGIN: Data Search and Filter -->
    <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
        <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0 flex">
            <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300"
               data-feather="search"></i>
            <input wire:model="filters.search" type="text"
                   class="input w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13"
                   placeholder="Search {{Str::plural(ucfirst($title))}}">
            <div wire:click="$toggle('showFilters')" class="inset-y-0 ml-3 mr-3 right-0 flex items-center">
                <a href="#">{{$advanceSearchToggle}}</a>
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

    <div>
        {{$filters}}
    </div>

    <!-- START: Data Table Card-->
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <div class="xl:flex sm:mr-auto">
                {{--For Data table items --}}
            </div>
            <div class="flex mt-5 sm:mt-0">
                <button
                    class="button w-1/2 sm:w-auto flex items-center border text-gray-700 mr-2 dark:bg-dark-5 dark:text-gray-300"
                    id="tabulator-print">
                    <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print
                </button>
                <div class="dropdown w-1/2 sm:w-auto">
                    <button
                        class="dropdown-toggle button w-full sm:w-auto flex items-center border text-gray-700 dark:bg-dark-5 dark:text-gray-300">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export <i data-feather="chevron-down"
                                                                                        class="w-4 h-4 ml-auto sm:ml-2"></i>
                    </button>
                    <div class="dropdown-box w-40">
                        <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                            <a href="javascript:;"
                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                               id="tabulator-export-csv">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export CSV
                            </a>
                            <a href="javascript:;"
                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                               id="tabulator-export-json">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export JSON
                            </a>
                            <a href="javascript:;"
                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                               id="tabulator-export-xlsx">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export XLSX
                            </a>
                            <a href="javascript:;"
                               class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"
                               id="tabulator-export-html">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export HTML
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{$slot}}

        <!-- BEGIN: Pagination -->
        <div class="mt-5 intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
            <div class="container">
                {{$pagination}}
            </div>
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- END: Data Table-->

