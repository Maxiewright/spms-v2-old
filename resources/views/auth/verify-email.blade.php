@extends('layout.login')

@section('head')
    <title> Login - SpMS</title>
@endsection

@section('content')
    <x-layouts.auth-layout  title="Verify Email">
        <x-slot name="events"></x-slot>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            <br>
            {{ __('If you did not receive the email, please click below and one will be resent.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided to us.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div>
                    <button id="btn-login"
                            class="button button--lg w-full  text-white bg-theme-1 xl:mr-3 align-top">
                            {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </x-layouts.auth-layout>
@endsection
