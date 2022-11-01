@extends('layouts.auth')
@section('title', 'Регистрация')
@section('content')
    <x-forms.auth-forms title='Регистрация'
                        action="{{ route('register.handle') }}"
                        method="POST"
    >
        @csrf
        <x-forms.text-input
            name="name"
            placeholder="Имя"
            :isError="$errors->has('name')"
            required
            value="{{old('name')}}"
        ></x-forms.text-input>
        @error('name')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror

        <x-forms.text-input
            type="email"
            name="email"
            placeholder="E-mail"
            :isError="$errors->has('email')"
            required
            value="{{old('email')}}"
        ></x-forms.text-input>
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
            Зарегистрироваться
        </x-forms.primary-button>
        <x-slot:socialAuth>
            <ul class="space-y-3 mt-3">
                <li>
                    <a href="{{ route('socialite.redirect', ['driver'=> 'github']) }}"
                       class="relative flex items-center h-14 px-12 rounded-lg border border-[#A07BF0] bg-white/20 hover:bg-white/20 active:bg-white/10 active:translate-y-0.5">
                        <svg class="shrink-0 absolute left-4 w-5 sm:w-6 h-5 sm:h-6" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M10 0C4.475 0 0 4.475 0 10a9.994 9.994 0 0 0 6.838 9.488c.5.087.687-.213.687-.476 0-.237-.013-1.024-.013-1.862-2.512.463-3.162-.612-3.362-1.175-.113-.287-.6-1.175-1.025-1.412-.35-.188-.85-.65-.013-.663.788-.013 1.35.725 1.538 1.025.9 1.512 2.337 1.087 2.912.825.088-.65.35-1.088.638-1.338-2.225-.25-4.55-1.112-4.55-4.937 0-1.088.387-1.987 1.025-2.688-.1-.25-.45-1.274.1-2.65 0 0 .837-.262 2.75 1.026a9.28 9.28 0 0 1 2.5-.338c.85 0 1.7.112 2.5.337 1.912-1.3 2.75-1.024 2.75-1.024.55 1.375.2 2.4.1 2.65.637.7 1.025 1.587 1.025 2.687 0 3.838-2.337 4.688-4.562 4.938.362.312.675.912.675 1.85 0 1.337-.013 2.412-.013 2.75 0 .262.188.574.688.474A10.017 10.017 0 0 0 20 10c0-5.525-4.475-10-10-10Z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span class="grow text-xxs md:text-xs font-bold text-center">GitHub</span>
                    </a>
                </li>
            </ul>
        </x-slot:socialAuth>
        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="space-y-3 mt-5">
                    <div class="text-xxs md:text-xs">
                        <a href="{{ route('login')  }}"
                           class="text-white hover:text-white/70 font-bold">Войти в
                            аккаунт</a>
                    </div>
                </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection
