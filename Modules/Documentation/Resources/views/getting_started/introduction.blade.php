@extends('documentation::layout/' . $layout)

@section('subhead')
    <title>SpMS Docs | Introduction</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Introduction to SpMS</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Introduction Table of Contents -->
        <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
            <div class="box mt-5">
                <div class="px-4 pb-3 pt-5">
                    <x-link.table-of-content href="#intro" title="Introduction" icon="activity"/>
                    <x-link.table-of-content href="#audience" title="Intended Audience" icon="users"/>
                    <x-link.table-of-content href="#legislation" title="Legislation" icon="info"/>
                </div>
            </div>
        </div>
        <!-- END: IntroductionTable of Contents -->

        <!-- BEGIN: Introduction -->
        <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
            <x-cards.content-card title="Introduction" id="intro">
                <div class="font-normal">
                    <p class="">
                        Serviceperson Management System (SpMS) User Guide provides the necessary information for the
                        users of this system to effectively perform their current job functions.
                        SpMS is an online application that provides advanced capabilities that maintains
                        the highest degree of personnel management for the Trinidad and Tobago Regiment.
                        This guide is intended for the general users of the SpMS. Additionally,
                        your different roles and permission will determine what a user can view and edit
                    </p>
                </div>
            </x-cards.content-card>
            <x-cards.content-card title="Intended Audience" id="audience">
                <div class="font-normal">
                    <p class="mb-2">
                        In order to ensure the smooth operation this application on a day-to-day basis,
                        the intended audiences of this guide are users who are tasked with using the SpMS.
                        All information held by the TTR, in all formats, represents an essential asset and therefore,
                        must be used maintained and stored securely.
                    </p>
                    <p class="mb-2">
                        <strong>ALL SpMS Users are</strong> are reasonably expected to be familiar with or knowledgeable
                        about the following policies and processes.
                        <strong>They are also expected to respect and comply with these policies.</strong>
                    </p>
                    <p class="mb-2">
                        No provision contained in the policies shown below is intended to contradict or contravene
                        any legislation and regulations. Neither are these policies meant to restrict legitimate and
                        authorised TTR activity.
                    </p>
                </div>
            </x-cards.content-card>
            <x-cards.content-card title="Legislation" id="legistation">
                <div class="font-normal">
                    <p>
                        Some aspects of the Information Security Polices are governed by legislation;
                        the most notable Acts and legislation are listed below. These policies respect
                        and comply with the applicable laws and regulations including
                        (but not limited to other Acts which may include):
                    </p>
                    <ol class="list-decimal p-3">
                        <li>Trinidad and Tobago Regiment Standing Orders</li>
                        <li>Defence Act 2000</li>
                        <li>Computer Misuse Act 2000</li>
                        <li>Copyright Act 1997</li>
                        <li>Freedom of Information Act 1999</li>
                        <li>Electronic Transaction Act 2011</li>
                        <li>Cyber Security Act 2015</li>
                        <li>Data Protection Act 2011</li>
                    </ol>
                </div>
            </x-cards.content-card>

    </div>
    <!-- END: Introduction -->
    </div>
@endsection
