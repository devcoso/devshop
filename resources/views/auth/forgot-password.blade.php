@section('titulo')
    - Recuperar Password
@endsection
<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidate tu password? No hay problema. Solo escribe tu correo, y te enviaremos las instrucciones para restablecerlo.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between my-5">
                <x-link :href="route('register')">
                    ¿Aún no tienes cuenta?
                </x-link>
                <x-link :href="route('login')">
                    ¿Ya tienes cuenta?
                </x-link>
            </div>
            <x-primary-button>
                {{ __('Enviar Instrucciones') }}
            </x-primary-button>
        </form>
    </x-auth-card>
</x-app-layout>
