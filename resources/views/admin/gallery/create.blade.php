<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-gray-800 font-bold mb-6">Přidat obrázek</h1>

            <div class="bg-white rounded-lg shadow-md p-8">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Title Field -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="title">
                            Název *
                        </label>
                        <input type="text" name="title" id="title" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                    </div>

                    <!-- Description Field -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="description">
                            Popis
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200"></textarea>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            Obrázek *
                        </label>
                        <div class="flex items-center space-x-4">
                            <div class="relative flex-1">
                                <input type="file" name="image" id="image" accept="image/*" required
                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <div class="px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 transition duration-200">
                                    <span class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span id="file-name">Vyberte soubor</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div id="image-preview" class="mt-4 hidden">
                            <img id="preview" class="max-h-60 rounded-lg border border-gray-200" src="#" alt="Náhled obrázku">
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end space-x-3 pt-4">
                        <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                            Zpět
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition duration-200">
                            Uložit obrázek
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File input handling
            const fileInput = document.getElementById('image');
            const fileName = document.getElementById('file-name');
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');

            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    fileName.textContent = this.files[0].name;
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    }
                    reader.readAsDataURL(this.files[0]);
                } else {
                    fileName.textContent = 'Vyberte soubor';
                    previewContainer.classList.add('hidden');
                }
            });
        });
    </script>

    <style>
        /* Custom styling for file input hover state */
        input[type="file"] + div:hover {
            border-color: #93c5fd;
            background-color: #f8fafc;
        }
        
        /* Focus ring for inputs */
        input:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</x-admin-layout>