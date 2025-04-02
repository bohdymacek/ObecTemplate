<x-blog-layout>
    <div class="container mt-5">
        <h1 class="h3 mb-3">Dokumenty</h1>
        <div class="card">
            <div class="card-body">
                <ul class="list-group">
                    @foreach($documents as $document)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $document->title }}
                            <a href="{{ asset('storage/'.$document->file_path) }}" class="btn btn-success btn-sm">Stáhnout</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-blog-layout>

