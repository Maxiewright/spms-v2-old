@extends('layout.login')

@section('head')
    <title> Login - SpMS</title>
@endsection

@section('content')
    <x-layouts.auth-layout  title="">
        <x-slot name="events"></x-slot>
        <x-form.auth-form action="password.update" submitBtn="Reset Password">
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <x-form.input.auth-input type="text" name="identity" placeholder="Email" required autofocus/>

            <x-form.input.auth-input type="password" name="password" placeholder="Password" required />

            <x-form.input.auth-input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />

        </x-form.auth-form>
    </x-layouts.auth-layout>
@endsection

