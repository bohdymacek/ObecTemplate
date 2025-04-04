<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Aktuality</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Záznamy Aktuality
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.post.create') }}';">Přidat Aktualitu</button>
                @endcan
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ID</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Název</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Kategorie</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Tagy</th>
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Zhlédnutí</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Přidáno</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Spraveno</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->title }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->category->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <div class="flex flex-wrap">
                                            @forelse ($post->tags as $tag)
                                                <a href="{{ route('tag.show', $tag->name) }}"
                                                    class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-blue-700 bg-blue-100 border border-blue-300 ">
                                                    <div
                                                        class="text-xs font-normal leading-none max-w-full flex-initial">
                                                        {{ $tag->name }}</div>
                                                </a>
                                            @empty
                                                Žádné Tagy !
                                            @endforelse
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                    {{$post->views}}
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->user->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $post)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.post.edit', $post->id) }}';">Upravit</button>
                                        @endcan
                                        @can('delete', $post)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.post.destroy', $post->id) }}"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded"
                                                    type="submit">Odstranit</button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $posts->links() !!}
        </main>
    </div>
</x-admin-layout>
