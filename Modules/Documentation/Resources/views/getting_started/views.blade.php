@extends('documentation::layout/' . $layout)

@section('subhead')
    <title>SpMS Docs | Views</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Views</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Table of Contents -->
        <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
            <div class="box mt-5">
                <div class="px-4 pb-3 pt-5">
                    <x-link.table-of-content href="#title" title="For Title" icon="activity"/>
                </div>
            </div>
        </div>
        <!-- END: Table of Contents -->

        <!-- BEGIN: Content -->
        <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
            <x-cards.content-card title="Title" id="title">


            </x-cards.content-card>
    </div>
    <!-- END: Content -->
    </div>
@endsection
