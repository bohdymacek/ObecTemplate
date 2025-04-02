<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Děkujeme za přihlášení! Než začnete, mohli byste ověřit svou e-mailovou adresu kliknutím na odkaz, který jsme vám právě poslali e-mailem? Pokud jste e-mail neobdrželi, rádi vám zašleme další.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Na e-mailovou adresu, kterou jste uvedli při registraci, byl odeslán nový ověřovací odkaz.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Poslat email verifikace znovu') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Odhlásit se') }}
            </button>
        </form>
    </div>
</x-guest-layout>
