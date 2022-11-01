@extends('layouts.auth')
@section('title', 'Сброс пароля')
@section('content')
    <x-forms.auth-forms title='Сброс пароля' action="{{ route('password-reset.handle') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <x-forms.text-input
            type="email"
            name="email"
            placeholder="E-mail"
            :isError="$errors->has('email')"
            value="{{ request('email') }}"
            required></x-forms.text-input>
        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input
            type="password"
            name="password"
            placeholder="Пароль"
            :isError="$errors->has('password')"
            required></x-forms.text-input>
        @error('password')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror
        <x-forms.text-input
            type="password"
            name="password_confirmation"
            placeholder="Повторите пароль"
            :isError="$errors->has('password_confirmation')"
            required></x-forms.text-input>
        @error('password_confirmation')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.primary-button>
            Обновить пароль
        </x-forms.primary-button>
        <x-slot:socialAuth>
        </x-slot:socialAuth>
        <x-slot:buttons>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection
