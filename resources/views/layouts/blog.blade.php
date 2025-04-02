<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @isset($title)
            {{ ucfirst($title) }} -
        @endisset {{ config('app.name') }}
    </title>
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
    <!-- AlpineJS -->
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Wait for both DOM and Leaflet to be ready
        function initMap() {
            // Coordinates for Nevšová
            var map = L.map('map', {
                center: [49.1075, 17.6811],
                zoom: 13,
                zoomControl: false
            });
    
            // Add zoom control with proper position
            L.control.zoom({
                position: 'topright'
            }).addTo(map);
    
            // OSM Base Layer - most reliable
            var baseLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '© OpenStreetMap, CARTO'
}).addTo(map);
    
            // Marker with shadow
            var defaultIcon = L.icon({
                iconUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-icon.png',
                shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34]
            });
    
            L.marker([49.1075, 17.6811], {icon: defaultIcon}).addTo(map)
                .bindPopup('<b>Nevšová</b><br>Česká republika')
                .openPopup();
    
            // Fix map display issues
            setTimeout(function() {
                map.invalidateSize();
            }, 100);
        }
    
        // Initialize map when everything is loaded
        if (document.readyState === 'complete') {
            initMap();
        } else {
            document.addEventListener('DOMContentLoaded', initMap);
        }
    </script>

</head>

<body class="bg-white font-family-karla">
    @if (Session::has('message'))
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ Session::get('message') }}.</p>
        </div>
    @elseif (Session::has('error'))
        {
        <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>{{ Session::get('error') }}.</p>
        </div>
        }
    @endif
    <!-- Top Bar Nav -->
    <nav class="bg-gradient-to-r from-blue-500 to-blue-700 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('import/assets/znak-petrov-min.png') }}" alt="Logo" class="h-10">
                </a>
            </div>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ url('/') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-900 transition duration-300">Domů</a>
                <a href="{{ route('webhome') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Aktuality</a>
                <a href="{{ route('gallery') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Galerie</a>
                <a href="{{ route('contacts') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Kontakty</a>
                <a href="{{ route('documents.index') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Dokumenty</a>
                @foreach ($pages_nav as $page)
                    <a href="{{ route('page.show', $page->slug) }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">{{ $page->name }}</a>
                @endforeach
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white font-bold rounded-lg">Odhlásit se</button>
                    </form>
                @else
                    
                @endauth
            </div>
            <div class="md:hidden flex items-center">
                <button id="menu-btn" class="text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-2 bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg p-4 backdrop-blur-lg bg-opacity-80">
        <a href="{{ url('/') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Domů</a>
        <a href="{{ route('webhome') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Aktuality</a>
        <a href="{{ route('gallery') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Galerie</a>
        <a href="{{ route('contacts') }}" class="text-white font-bold bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">Kontakty</a>
        @foreach ($pages_nav as $page)
            <a href="{{ route('page.show', $page->slug) }}" class="text-white font-bold bg-yellow-500 px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300">{{ $page->name }}</a>
        @endforeach
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full py-2 px-4 bg-red-500 hover:bg-red-700 text-white font-bold rounded-lg">Odhlásit se</button>
            </form>
        @else
            
        @endauth
    </div>
</nav>

@if (!request()->routeIs('page.show')  && !request()->routeIs('gallery') && !request()->routeIs('webhome') && !request()->routeIs('post.show'))
    <!-- Text Header -->
    
    <div class="relative inset-0 w-full h-72 overflow-hidden">
    <video class="absolute inset-0 w-full h-full object-cover" autoplay loop muted playsinline>
        <source src="{{ asset('import/assets/zlin-2023.mp4') }}" type="video/mp4">
        Váš prohlížeč nepodporuje přehrávání videa.
    </video>
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-50 flex flex-col items-center justify-center text-center">
        <a class="font-bold text-white uppercase text-4xl hover:text-gray-300" href="{{ route('webhome') }}">
            {{ $setting->site_name }}
        </a>
        <p class="text-lg text-gray-200">
            {{ $setting->description }}
        </p>
    </div>
</div>
    
    @endif
    @if (!request()->routeIs('page.show') && !request()->routeIs('gallery') && !request()->routeIs('webhome') && !request()->routeIs('front.main') && !request()->routeIs('contacts') && !request()->routeIs('post.show'))
    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open">
                Nápověda <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div
                class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <p>blablabalanalsnsnakxnnc a!f</p>
            </div>
        </div>
    </nav>
    @endif
    <div class="container mx-auto flex flex-wrap py-6">

    {{ $slot }}

    <!-- Sidebar Section -->
    @if (!request()->routeIs('page.show') && !request()->routeIs('front.main') && !request()->routeIs('contacts') && !request()->routeIs('documents.index') && !request()->routeIs('gallery'))
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">O Obci</p>
                <p class="pb-2">{{ $setting->about }}</p>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Tagy</p>
                <div class="flex flex-wrap">
                    @foreach ($tags as $tag)
                        <a href="{{ route('tag.show', $tag->name) }}"
                            class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-blue-700 bg-blue-100 border border-blue-300 ">
                            <div class="p-1.5 text-xs font-normal leading-none max-w-full flex-initial">
                                {{ $tag->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Aktivní Správci</p>
                @forelse ($top_users as $top)
                    <div class="my-1.5 py-3 px-4 flex justify-center rounded-lg shadow-lg bg-white w-full">
                        <img class="w-10 h-10 rounded-full" src="{{ $top->avatar }}" alt="">
                        <div class="content flex justify-between py-2 w-full">
                            <div class="px-2 justify-between">{{ $top->name }}</div>
                            <div class="justify-between">{{ $top->posts_count }}</div>
                        </div>
                    </div>
                @empty
                    Žádní členové!
                @endforelse
            </div>

        </aside>
    @endif

    </div>

    <footer class="w-full border-t bg-white pb-12">

        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                @foreach ($pages_footer as $page)
                    <a href="{{ route('page.show', $page->slug) }}" class="uppercase px-3 hover:text-blue-700">{{ $page->name }}</a>
                @endforeach
                @auth
                <form method="POST" action="{{ route('logout') }}" class="inline-block">
                    @csrf
                    <button class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white font-bold rounded-lg">Odhlásit se</button>
                </form>
            @else
            <a href="{{ route('register') }}" class="text-white font-bold bg-yellow-700 px-4 py-2 rounded-lg hover:bg-green-800 transition duration-300">registrovat se</a>
            @endauth
            </div>
            <div class="uppercase pb-6">&copy; {{ $setting->copy_rights }}</div>
        </div>
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let menuBtn = document.getElementById('menu-btn');
        let mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', function () {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add('flex');
                mobileMenu.classList.remove('translate-y-[-10px]', 'opacity-0');
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove('flex');
                mobileMenu.classList.add('translate-y-[-10px]', 'opacity-0');
                mobileMenu.classList.remove('translate-y-0', 'opacity-100');
            }
        });
    });
</script>

    @yield('scripts')
</body>
</html>