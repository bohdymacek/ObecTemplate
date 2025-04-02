<x-blog-layout title="Galerie obce">
    <center><h1 class="">Galerie</h1></center>
    <br>
    <div class="container">
        <div class="row row-cols-2 row-cols-md-4 g-3">
            @foreach ($galleries as $gallery)
                <div class="col text-center">
                    @if ($gallery->image_path)
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" 
                             class="img-thumbnail gallery-thumbnail uniform-image"
                             data-bs-toggle="modal" 
                             data-bs-target="#galleryModal"
                             data-image="{{ asset('storage/' . $gallery->image_path) }}"
                             style="cursor: pointer;">
                    @else
                        <span class="text-gray-500">Žádný obrázek</span>
                    @endif
                    
                    @can('delete', $gallery)
                        <form method="POST" style="margin-top: 5px;"
                              action="{{ route('admin.gallery.destroy', $gallery->id) }}"
                              onsubmit="return confirm('Opravdu chcete smazat obrázek?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">
                                Odstranit
                            </button>
                        </form>
                    @endcan
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center position-relative d-flex align-items-center justify-content-center">
                    <button class="carousel-control-prev custom-nav" id="prevImage" type="button">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Předchozí</span>
                    </button>

                    <div class="image-container">
                        <img id="modalImage" src="" class="rounded modal-img" alt="">
                    </div>

                    <button class="carousel-control-next custom-nav" id="nextImage" type="button">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Další</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-blog-layout>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const galleryImages = document.querySelectorAll(".gallery-thumbnail");
        const modalImage = document.getElementById("modalImage");
        const prevButton = document.getElementById("prevImage");
        const nextButton = document.getElementById("nextImage");
        
        let currentIndex = 0;
        let imagesData = [];

        galleryImages.forEach((image, index) => {
            imagesData.push(image.getAttribute("data-image"));

            image.addEventListener("click", function () {
                currentIndex = index;
                updateModal();
            });
        });

        function updateModal() {
            modalImage.src = imagesData[currentIndex];
        }

        prevButton.addEventListener("click", function () {
            currentIndex = (currentIndex - 1 + imagesData.length) % imagesData.length;
            updateModal();
        });

        nextButton.addEventListener("click", function () {
            currentIndex = (currentIndex + 1) % imagesData.length;
            updateModal();
        });

        document.addEventListener("keydown", function (event) {
            if (event.key === "ArrowLeft") {
                prevButton.click();
            } else if (event.key === "ArrowRight") {
                nextButton.click();
            }
        });
    });
</script>

<style>
    .custom-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 5%;
        height: 10%;
    }

    .modal-body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        max-height: 90vh;
    }

    .modal-img {
        max-width: 80vw;
        max-height: 80vh;
        width: auto;
        height: auto;
    }

    .uniform-image {
        width: 200px;
        height: 160px;
        object-fit: cover;
    }
</style>
