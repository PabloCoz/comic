<div class="w-full">
    <div class="shrink-0 flex items-center justify-center">
        <a href="{{ route('home') }}">
            <img class="h-20 w-20 object-contain" src="{{ asset('img/logo.png') }}" alt="">
        </a>
    </div>
    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label class="font-bold text-sm uppercase tracking-wider">Nombre de Usuario</label>
            <input id="username"
                class="block mt-1 w-full rounded-full border focus:border-black ring-0 focus:ring-black" type="text"
                name="username" required />

        </div>


        <div class="mt-4">
            <label class="font-bold text-sm uppercase tracking-wider">Contraseña</label>
            <input id="password"
                class="block mt-1 w-full rounded-full border focus:border-black ring-0 focus:ring-black" type="password"
                name="password" required autocomplete="new-password" />
        </div>

        <div class="mt-4">
            <label class="font-bold text-sm uppercase tracking-wider">Confirmar contraseña</label>
            <input id="password_confirmation"
                class="block mt-1 w-full rounded-full border focus:border-black ring-0 focus:ring-black" type="password"
                name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' =>
                                    '<a target="_blank" href="' .
                                    route('terms.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                    __('Terms of Service') .
                                    '</a>',
                                'privacy_policy' =>
                                    '<a target="_blank" href="' .
                                    route('policy.show') .
                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                    __('Privacy Policy') .
                                    '</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">
            
            <button
                class="ml-4 bg-rose-500 px-3 py-3 text-xs uppercase text-white tracking-wider font-extrabold rounded-full">
                Registrarse
            </button>
        </div>
    </form>
</div>
