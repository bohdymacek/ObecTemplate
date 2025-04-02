<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow rounded-lg p-8">
            <div class="flex flex-col items-center">
                @can('admin-only')
                    <h1 class="text-3xl font-bold mb-4">Vítejte, administrátore webu!</h1>
                    <div class="mb-6">
                        <img src="{{ asset('import/assets/d0c60459431b6ffaecf92fc902ca996d.gif') }}" alt="Vítací obrázek super administrátora" class="w-56 h-auto mx-auto rounded-full">
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Máte plný přístup ke všem funkcím systému včetně uživatelských účtů.
                        </p>
                        <x-dropdown-link :href="route('admin.index')" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition duration-300">
                            Admin Panel
                        </x-dropdown-link>
                    </div>
                
                @elsecan('admin-login')
                    <h1 class="text-3xl font-bold mb-4">Vítejte, správče webu!</h1>
                    <div class="mb-6">
                        <img src="{{ asset('import/assets/b6a164fe3c74eeb8fae8de7ad4b1d3ef.gif') }}" alt="Vítací obrázek administrátora" class="w-56 h-auto mx-auto rounded-full">
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Klikněte na tento odkaz pro přechod do hlavního kontrolního panelu, kde můžete spravovat nastavení a obsah webu.
                        </p>
                        <x-dropdown-link :href="route('admin.index')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">
                            Kontrolní Panel
                        </x-dropdown-link>
                    </div>
                
                @else
                    <h1 class="text-3xl font-bold mb-4">Vítejte na našem webu, občane!</h1>
                    <div class="mb-6">
                        <img src="{{ asset('import/assets/b597a948096733.588edd574ae05.gif') }}" alt="Vítací obrázek pro návštěvníky" class="w-56 h-auto mx-auto rounded-full">
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mt-2 text-sm text-gray-600">
                            Pro pokračování do webu klikněte zde:
                        </p>
                        <x-dropdown-link :href="route('front.main')" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">
                            Zpět na hlavní stránku
                        </x-dropdown-link>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>