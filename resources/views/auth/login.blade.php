@extends('layout.login')

@section('head')
    <title> Login - SpMS</title>
@endsection

@section('content')
    <x-layout.auth-layout  title="Sign In">
        <x-slot name="events">
            <img src="{{asset('dist/images/ttr-logo.png')}}" alt="">
        </x-slot>
        <x-form.auth-form action="login" submitBtn="Login" btnSize="32">
            <x-form.input.auth-input type="text" name="identity" placeholder="Username or Email"/>
            <x-form.input.auth-input type="password" name="password" placeholder="Password"/>

            <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                <div class="flex items-center mr-auto">
                    <input type="checkbox" name="remember" class="input border mr-2" id="input-remember-me">
                    <label class="cursor-pointer select-none" for="input-remember-me">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>
        </x-form.auth-form>
    </x-layout.auth-layout>
@endsection

