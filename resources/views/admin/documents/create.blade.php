<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Nový dokument</h1>

            <div class="bg-white shadow-md rounded p-6">
                <form method="POST" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Název dokumentu *
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                               type="text" 
                               name="title" 
                               id="title"
                               required
                               placeholder="Zadejte název dokumentu">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                            Popisek
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                  name="content" 
                                  id="content"
                                  rows="4"
                                  placeholder="Volitelný popisek dokumentu"></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                            Soubor *
                        </label>
                        <div id="file-upload-container" class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors duration-200">
                            <input type="file" 
                                   name="file" 
                                   id="file"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                   required
                                   onchange="displayFileName(this)">
                            <div id="upload-content" class="flex flex-col items-center justify-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">
                                    <span class="font-medium text-blue-600 hover:text-blue-500">Klikněte pro nahrání</span> nebo přetáhněte soubor
                                </p>
                                <p class="mt-1 text-xs text-gray-500">
                                    PDF, DOCX, XLSX (Max. 10MB)
                                </p>
                            </div>
                            <div id="file-info" class="hidden mt-4">
                                <p class="text-sm font-medium text-gray-700">Vybraný soubor:</p>
                                <p id="file-name" class="text-sm text-gray-500 truncate max-w-xs mx-auto"></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('admin.documents.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-4">
                            Zpět
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Vytvořit dokument
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        function displayFileName(input) {
            const fileUploadContainer = document.getElementById('file-upload-container');
            const uploadContent = document.getElementById('upload-content');
            const fileInfo = document.getElementById('file-info');
            const fileName = document.getElementById('file-name');
            
            if (input.files && input.files.length > 0) {
                // Show selected file
                fileName.textContent = input.files[0].name;
                uploadContent.classList.add('hidden');
                fileInfo.classList.remove('hidden');
                
                // Change container style
                fileUploadContainer.classList.remove('border-gray-300');
                fileUploadContainer.classList.add('border-blue-500', 'bg-blue-50');
            } else {
                // Reset to default state
                uploadContent.classList.remove('hidden');
                fileInfo.classList.add('hidden');
                fileUploadContainer.classList.remove('border-blue-500', 'bg-blue-50');
                fileUploadContainer.classList.add('border-gray-300');
            }
        }

        // Optional: Handle drag and drop visual feedback
        const fileUploadContainer = document.getElementById('file-upload-container');
        const fileInput = document.getElementById('file');

        fileUploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUploadContainer.classList.add('border-blue-500', 'bg-blue-50');
        });

        fileUploadContainer.addEventListener('dragleave', () => {
            if (!fileInput.files || fileInput.files.length === 0) {
                fileUploadContainer.classList.remove('border-blue-500', 'bg-blue-50');
            }
        });

        fileUploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            fileInput.files = e.dataTransfer.files;
            displayFileName(fileInput);
        });
    </script>
</x-admin-layout>