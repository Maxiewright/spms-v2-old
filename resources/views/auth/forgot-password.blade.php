@extends('layout.login')

@section('head')
    <title> Login - SpMS</title>
@endsection

@section('content')
    <x-layouts.auth-layout  title="">
        <x-slot name="events"></x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <x-form.auth-form action="password.email" submitBtn="Email Password Reset Link" btnSize="auto">
            <x-form.input.auth-input type="text" name="email" placeholder="Email" required autofocus/>
        </x-form.auth-form>
    </x-layouts.auth-layout>
@endsection

