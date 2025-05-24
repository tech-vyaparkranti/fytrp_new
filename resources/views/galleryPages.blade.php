@extends('layout.layout')

@section('title', 'Gallery')
@section('content')
<x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='Gallery' />

<!-- Gallery Section -->
<section class="gallery-two-area py-100 pt-120 rel z-1">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-12">
                <div class="section-title text-center counter-text-wrap mb-50" data-aos="fade-up"
                    data-aos-duration="1500" data-aos-offset="50">
                    <h2 class="mt-5">Explore Our Photo Gallery</h2>
                    <p>Browse and enjoy our beautiful images.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Dynamic Gallery Images -->
            @if (!empty($galleryImages) && count($galleryImages))
                @foreach ($galleryImages as $item)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="gallery-two-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <!-- Fancybox Trigger -->
                                <a href="{{ asset($item->local_image) }}" data-fancybox="gallery"
                                    data-caption="{{ $item->title }}">
                                    <img src="{{ asset($item->local_image) }}" alt="{{ $item->alternate_text }}"
                                        class="img-fluid rounded shadow">
                                </a>
                            </div>
                            <div class="content text-center mt-3">
                                <h5 class="fw-bold text-secondary">{{ $item->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Placeholder Images -->
                @for ($i = 0; $i < 6; $i++)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="gallery-two-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                <a href="./assets/images/package_img_7.jpeg" data-fancybox="gallery"
                                    data-caption="Sample Image Title">
                                    <img src="./assets/images/package_img_7.jpeg" alt="Gallery"
                                        class="img-fluid rounded shadow">
                                </a>
                            </div>
                            <div class="content text-center mt-3">
                                <h5 class="fw-bold text-secondary">Sample Image Title</h5>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>
</section>
<style>
    .gallery-two-item .image img {
        max-height: 400px;
        min-height: 400px !important;
        width: 100%;
        object-fit: cover;
    }
</style>
<!-- Fancybox Script -->
<script>
    // Initialize Fancybox
    Fancybox.bind("[data-fancybox='gallery']", {
        Thumbs: {
            autoStart: true, // Display thumbnail navigation
        },
        Toolbar: {
            display: ["zoom", "slideshow", "fullscreen", "thumbs", "close"], // Toolbar options
        },
        Carousel: {
            transition: "slide", // Smooth sliding transition between images
        },
        caption: function (fancybox, carousel, slide) {
            return slide.$trigger.dataset.caption || "No caption"; // Dynamic caption support
        },
    });
</script>

@endsection
