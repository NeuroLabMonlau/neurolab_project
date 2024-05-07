<x-guest-layout >
    <div class="flex flex-row w-full p-4">
        <div class="w-1/2 ">
            {{-- <img src="../../public/assets/img/logoOscar.jpg" alt=""> --}}
            <x-authentication-card-logo /> 
        </div>
        <div class="w-1/2 flex justify-end">
          
        </div>
    </div>
    <x-authentication-card>
      
                <x-slot name="logo">
                    {{-- <x-authentication-card-logo />  --}}
                </x-slot>
          

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-white/50 shadow-xl p-12 rounded-xl ">
            <form class="flex flex-col justify-center opacity-100" method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="flex flex-col justify-center" >
                        {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                        <x-input id="email" class="block mt-1 w-full text-green-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Usuario" />
                    </div>
    
                    <div class="mt-4 flex flex-col justify-center">
                        {{-- <x-label for="password" value="{{ __('Password') }}" /> --}}
                        <x-input id="password" class="block mt-1 w-full text-green-400" type="password" name="password" required autocomplete="current-password"  placeholder="Contraseña" />
                    </div>
    
                    <div class="flex flex-col items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="{{ route('password.request') }}">
                                {{ __('¿Has olvidado la contraseña?') }}
                            </a>
                        @endif
    
                        <x-button class="ms-4 mt-4 py-1 bg-red-600 border-0">
                            {{ __('Iniciar sesión') }}
                        </x-button>
                    </div>

                    
                    <div class="text-center mt-8 text-sm">
                        <p class="terms_link font-semibold">Al continuar, estás aceptando los  <a href="" class="underline decoration-solid">Términos y condiciones</a> y la <a href="" class="text-red-500 font-bold">polítca de privacidad</a> de <span class="text-blue-700">Meraki</span></p>
                    </div>
            </form>
        </div>

        
    </x-authentication-card>
</x-guest-layout>
