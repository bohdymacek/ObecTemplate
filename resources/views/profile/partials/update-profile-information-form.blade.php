<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informace účtu') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Aktualizujte informace o profilu svého účtu a e-mailovou adresu.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Jméno')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Vaše e-mailová adresa není ověřena.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Kliknutím sem znovu odešlete ověřovací e-mail.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Na vaši e-mailovou adresu byl odeslán nový ověřovací odkaz.') }}
                        </p>
                    @endif
                </div>
            @endif

        </div>
        <div class="gap-4">
        <label for="newsletter" class="block mb-2 text-sm font-medium text-gray-900 ">{{ __('Přihlásit se k novinkám') }}</label>
        <select class="mt-1 block g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" id="newsletter" name="news_letter">
            <option value="1" {{ $user->news_letter == true ? 'selected' : '' }}>{{ __('Ano') }}</option>
            <option value="0"  {{ $user->news_letter == false ? 'selected' : '' }}>{{ __('Ne') }}</option>
          </select>
        </div>

        <div class="flex items-center gap-4">

            <x-primary-button>{{ __('Uložit') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Uloženo.') }}</p>
            @endif
        </div>
    </form>
</section>
