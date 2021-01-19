@extends('documentation::layout/' . $layout)

@section('subhead')
    <title>Servicepeople </title>
@endsection

@section('subcontent')
    <div class="intro-y box col-span-9 py-10 px-10 mt-8">
        <h1 class="intro-y text-2xl font-medium pb-8 mb-10 border-b border-gray-200">
            Getting Started
        </h1>
        <h2 class="intro-y text-xl font-medium pb-5 mb-5 border-b border-gray-200">
            Introduction
        </h2>
        <div class="intro-y leading-relaxed font-normal">

            <p class="mb-3 text-normal">
                You are the driving force within the TTR; how you are managed is a major deciding factor
                in the success of our organization. Your management does not only involve the engagement
                between an officer and yourself and the motivation which results; it also involves the proper recording,
                storage and subsequent retrieval of information regarding you.
            </p>
            <p class="mb-3 text-normal">
                The SpMS aims to replace the TTR existing manual paper-based system which will allow us to create,
                consolidate and update personnel information and documents into a centralized location.
                This system will help to increase your accessibility to data and allow you too quickly and effectively
                share and access data across all TTR locations. Your commanders will also now have an integrated picture
                of yourself and the TTR operations, thus allowing for better decision to be made regarding you.
            </p>
            <p>

            </p>
            <p class="text-normal">
                Thank you for using the Serviceperson Management System, we are happy to be of service to you.
            </p>

        </div>
        <h2 class="intro-y text-xl font-medium pb-5 mb-5 border-b border-gray-200 mt-10">
            Resources
        </h2>
        <div class="w-full grid grid-cols-12 gap-5">
            <x-link.xl-button route="getting_started.introduction" icon="airplay" title="The Legal Stuff" />
            <x-link.xl-button route="getting_started.system_access" icon="key" title="System Access" />
            <x-link.xl-button route="getting_started.views" icon="layout" title="Views" />
            <x-link.xl-button route="getting_started.adding_servicepeople" icon="user-plus" title="Adding Servicepeople" />
            <x-link.xl-button route="personnel.medical.classification" icon="plus" title="Medical Classification" />
            <x-link.xl-button route="personnel.leave" icon="briefcase" title="Leave" />
            <x-link.xl-button route="manpower.career_management" icon="chevron-down" title="Career Management" />
            <x-link.xl-button route="manpower.vacancies" icon="user-minus" title="Vacancies" />
            <x-link.xl-button route="administration.approval" icon="user-check" title="Approval System" />
            <x-link.xl-button route="system.metadata.record_card" icon="folder-plus" title="Record Card Metadata" />
            <x-link.xl-button route="system.security.access_control" icon="lock" title="Access Control" />
            <x-link.xl-button route="system.security.audit" icon="eye" title="Audit System" />
        </div>
    </div>
@endsection

