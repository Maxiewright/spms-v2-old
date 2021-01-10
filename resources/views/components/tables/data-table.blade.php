<div class="intro-y box mt-5">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
        <h2 class="font-medium text-base mr-auto">{{Str::plural(ucfirst($title))}}</h2>
        {{$slot}}
        <div class="flex flex-row mr-2">
            {{$filters}}
        </div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 mr-2">

            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input wire:model="search" type="text" class="input w-56 box pr-10 placeholder-theme-13"
                       placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
        <a wire:click="create()"
           class="flex items-center text-theme-7"
           href="javascript:;"
           data-toggle="modal"
           data-target="#delete-confirmation-modal">
            <i data-feather="plus-square" class="w-4 h-4 mr-1"></i> Add {{ucfirst($title)}}
        </a>

    </div>
    <!-- END: Data table -->
    <div class="p-5" id="responsive-table">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
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
    <!-- END: Data table -->
    <!-- BEGIN: Pagination -->
    <div class="px-5 pb-5 intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <div class="container">
            {{$pagination}}
        </div>
    </div>
    <!-- END: Pagination -->
</div>
