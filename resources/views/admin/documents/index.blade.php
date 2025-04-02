<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Správa dokumentů</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-file-alt mr-3"></i> Seznam dokumentů
                </p>
                <button class="px-4 py-2 text-white font-light tracking-wider bg-blue-600 rounded mb-4"
                        onclick="location.href='{{ route('admin.documents.create') }}';">
                    Přidat nový dokument
                </button>
                <div class="bg-white shadow-md rounded overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b">Název</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b">Soubor</th>
                                <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600 border-b">Akce</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-4 px-6 border-b">{{ $document->title }}</td>
                                    <td class="py-4 px-6 border-b">
                                        @if ($document->file_path)
                                            <a href="{{ asset('storage/' . $document->file_path) }}" 
                                               target="_blank"
                                               class="text-blue-600 hover:underline">
                                                Stáhnout dokument
                                            </a>
                                        @else
                                            Žádný soubor
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 border-b">
                                        @can('delete', $document)
                                            <form method="POST" style="display: inline"
                                                action="{{ route('admin.documents.destroy', $document->id) }}"
                                                onsubmit="return confirm('Opravdu chcete smazat dokument?')">
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