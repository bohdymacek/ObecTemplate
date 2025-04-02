<x-blog-layout>
    <!-- Úvodní sekce -->
    <div class="container mx-auto flex flex-wrap py-6">

    <section class="w-full flex flex-col items-center px-3">

        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full md:w-2/3 my-6">
            <center><h1 class="text-4xl font-bold mb-4 text-gray-800 p-6">Vítejte na stránkách obce!</h1></center>
            <section class="w-full flex justify-center my-6">
                <img src="{{ asset('import/assets/obec.jpg') }}" alt="Obec" class="rounded-lg shadow-lg">
            </section>
            <div class="p-6">
                <p class="text-lg text-gray-700 mb-6">
                    Objevte nejnovější informace o životě v naší obci, nadcházející události a aktuality.
                </p>
                <a href="{{ route('webhome', 'hlavni') }}" lass="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Zobrazit aktuality
                </a>
            </div>
        </div>
        <!-- Další sekce, například o obci -->
        <div class="w-full bg-white shadow-lg rounded-lg p-6 my-6 md:w-2/3">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">O Obci</h2>
            <p class="text-gray-600">
                Naše obec je známá svou bohatou historií a přátelskou komunitou. Připojte se k nám na společných akcích a sledujte aktuality!
            </p>
        </div>
        <div class="container mx-auto p-6">
            <div id="map" class="w-full h-96 rounded-lg shadow-lg"></div>
        </div>
    </div>
    </section>
</x-blog-layout>
