<x-guest-layout >
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form class="flex flex-col justify-center" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col justify-center" >
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-2/3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4 flex flex-col justify-center">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-2/3" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 flex justify-center">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste la contraseña?') }}
                    </a>
                @endif

                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="{{ route('register')}}">
                    {{__('¿No tienes una cuenta?')}}
                </a>


                <x-button class="ms-4 mt-4">
                    {{ __('Iniciar sesión') }}
                </x-button>
                <x-button class="ms-4 mt-4">
                    <a href="{{ route('microsoft.redirect') }}">
                        {{ __('Login with Microsoft') }}
                    </a>
                </x-button>
            </div>
            <div class="text-center mt-8">
                <p class="terms_link font-semibold">Al continuar, estás aceptando los  <a href="" class="underline decoration-solid">Terminos y condiciones</a> y la <a href="" class="text-red-500 font-bold">politca de privacidad</a> de NeuraCrib</p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
