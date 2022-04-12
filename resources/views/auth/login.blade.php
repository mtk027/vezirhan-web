<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img style="height: 60px;margin-bottom: 30px;" src="{{ asset(config('settings.theme.logo')) }}"
                    alt="">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" value="E-Posta Adresi" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Parola" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    Giriş Yap
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
