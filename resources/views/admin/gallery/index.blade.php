<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Správa galerie</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-images mr-3"></i> Seznam obrázků
                </p>
                <button class="px-4 py-2 text-white font-light tracking-wider bg-blue-600 rounded mb-4"
                        onclick="location.href='{{ route('admin.gallery.create') }}';">
                    Přidat nový obrázek
                </button>
                <div class="bg-white shadow-md rounded overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b">Název</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b">Obrázek</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b">Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($galleries as $gallery)
    <tr class="hover:bg-gray-100">
        <td class="py-4 px-6 border-b">{{ $gallery->title }}</td>
        <td class="py-4 px-6 border-b">
            @if ($gallery->image_path)
                <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                     alt="{{ $gallery->title }}" 
                     class="img-thumbnail gallery-thumbnail"
                     style="max-width: 100px; height: 80px; object-fit: cover;">
            @else
                <td class="py-4 px-6 border-b"></td>
            @endif
        </td>
        <td class="py-4 px-6 border-b">
            @can('delete', $gallery)
                <form method="POST" style="display: inline"
                    action="{{ route('admin.gallery.destroy', $gallery->id) }}"
                    onsubmit="return confirm('Opravdu chcete smazat obrázek?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded"
                        type="submit">
                        Odstranit
                    </button>
                </form>
            @endcan
        </td>
    </tr>
@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-admin-layout>