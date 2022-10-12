@section('titulo')
    - Verificar Email
@endsection
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¡Gracias por registrarte!, solo debes confirmar tu cuenta para que puedas acceder a todas la funcionalidades, por eso te hemos enviado un correo de verificación a tu Email. ¿Aún no te ha llegado el correo?, puedes volver enviar las instrucciones con el boton de abajo a la izquierda') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('El correo de verificación ha sido enviado a tu email.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Enviar Instrucciones') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Cerrar Sesión') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
