<x-blog-layout title="Galerie obce">
    <center><h1 class="">Galerie</h1></center>
    <br>
    <div class="row g-4">
        @foreach ($galleries as $image)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}">
                <h3>{{ $image->title }}</h3>
                <p>{{ $image->description }}</p>
            </div>
        @endforeach
    </div>

    <!-- Modal s carouselem a podporou zvětšení a kláves -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 position-relative">
                    <div id="carouselGallery" class="carousel slide" data-bs-interval="false">
                        <div class="carousel-inner">
                            @foreach($galleries as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset($image['filename']) }}" class="d-block w-100" alt="">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselGallery" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Zpět</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselGallery" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Další</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-blog-layout>