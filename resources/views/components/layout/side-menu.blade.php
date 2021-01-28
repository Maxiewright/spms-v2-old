@props(['title'=>null])

<div class="grid grid-cols-12 gap-6 mt-8">
    <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">{{$title}}</h2>
        <!-- BEGIN: Menu -->
        <div class="intro-y box p-5 mt-6">
            <nav class="mt-1">
                {{$menuItems}}
            </nav>
        </div>
        <!-- END: Menu -->
    </div>
    <!-- BEGIN: content -->
    <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
        {{$content}}
    </div>
    <!-- END: Content -->
</div>
