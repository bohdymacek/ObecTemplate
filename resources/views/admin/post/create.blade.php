<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Přidat Aktualitu</h1>

            <div class="bg-white rounded-lg shadow-sm p-8 border border-gray-100">
                <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <!-- Title Field -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Název *</label>
                            <input type="text" id="title" value="{{ old('title') }}" name="title" 
                                   class="w-full px-4 py-2.5 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all"
                                   placeholder="Název Aktuality" required
                                   oninput="generateSlug(this.value)">
                        </div>
                        
                        <!-- Slug Field -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Zkráceně *</label>
                            <input type="text" id="slug" value="{{ old('slug') }}" name="slug"
                                   class="w-full px-4 py-2.5 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all"
                                   placeholder="zkratka" required>
                        </div>

                        <!-- Category Select -->
                        <div>
                            <label for="selectType" class="block text-sm font-medium text-gray-700 mb-2">Kategorie *</label>
                            <select id="selectType" name="category_id"
                                    class="w-full px-4 py-2.5 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Select -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Publikovat *</label>
                            <select id="status" name="status"
                                    class="w-full px-4 py-2.5 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
                                <option value="1" selected>Ano</option>
                                <option value="0">Ne</option>
                            </select>
                        </div>

                        <!-- Tags Multi-select -->
                        <div>
                            <label for="tag_multiple" class="block text-sm font-medium text-gray-700 mb-2">Tagy</label>
                            <select name="tags[]" multiple id="tag_multiple"
                                    class="w-full px-4 py-2.5 text-gray-700 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition-all">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image Upload with Preview -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Obrázek *</label>
                            <div class="relative">
                                <input type="file" id="myimage" name="image" class="hidden" onchange="previewImage(this)">
                                <label for="myimage" class="flex items-center px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer transition-all">
                                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span id="file-name" class="text-gray-700">Vyberte obrázek</span>
                                </label>
                            </div>
                            <div id="image-preview" class="mt-3 hidden">
                                <img id="preview" class="max-h-48 w-auto rounded-lg border border-gray-200 shadow-sm" src="#" alt="Náhled obrázku">
                                <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-800 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                    Odstranit obrázek
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Content Editor -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Obsah *</label>
                        <textarea id="summernote" name="content" class="hidden">{{ old('content') }}</textarea>
                        <div id="editor" class="border border-gray-300 rounded-lg min-h-[300px]"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg focus:ring-4 focus:ring-blue-200 transition-all">
                            Publikovat aktualitu
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/summernote-cs.js') }}"></script>
    <script>
        // Image preview functionality
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');
            const fileName = document.getElementById('file-name');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    fileName.textContent = input.files[0].name;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            document.getElementById('myimage').value = '';
            document.getElementById('preview').src = '#';
            document.getElementById('image-preview').classList.add('hidden');
            document.getElementById('file-name').textContent = 'Vyberte obrázek';
        }

        // Initialize Summernote (basic version without toolbar)
        $(document).ready(function() {
            $('#editor').summernote({
                placeholder: 'Zde napište obsah aktuality...',
                height: 300,
                toolbar: false, // Disable toolbar
                callbacks: {
                    onChange: function(contents) {
                        $('#summernote').val(contents);
                    }
                }
            });
        });
    </script>

    <style>
        /* Custom styling for select elements */
        select[multiple] {
            background-image: none;
            min-height: 100px;
        }
        
        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
        
        /* Focus styles */
        input:focus, select:focus, textarea:focus, button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
    <script>
        let manualSlugEdit = false;
        
        function generateSlug(title) {
            if (!manualSlugEdit) {
                const slug = title.toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove special chars
                    .replace(/[\s_-]+/g, '-') // Replace spaces and underscores with hyphens
                    .replace(/^-+|-+$/g, ''); // Trim hyphens from start/end
                
                document.getElementById('slug').value = slug;
            }
        }
        
        // Track manual edits to slug field
        document.getElementById('slug').addEventListener('input', function() {
            manualSlugEdit = this.value.length > 0;
        });
    </script>
</x-admin-layout>