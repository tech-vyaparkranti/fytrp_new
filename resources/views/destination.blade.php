@extends('layout.layout')
@section('title', 'Destinations')
@section('content')

    <!-- Start Hero Section -->
    <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_single_bg.jpeg' title='Destinations' />
    <!-- End Hero Section -->

    <!-- Start destination Section -->
    <section>
        <div class="cs_height_50 cs_height_lg_80"></div>
        <div class="container">
          <div class="pb-2 center">
            <h2 style="text-align: center"> Discover Your Next Destination</h2>
            <p style="text-align: center">From sun-soaked beaches to bustling cityscapes, the world is full of unforgettable
               places waiting to be explored. Whether you're seeking <a href="{{url('packages')}}" style="color: black;font-weight: 500;">adventure, relaxation, or cultural 
               immersion</a>, we bring you the most captivating destinations across the globe. Let your
                journey begin here — explore where your heart takes you.</p>
          </div>
            <div class="cs_grid detsination-page">
              
                {{-- @if (isset($destinations) && count($destination) > 0)
                 
                    @foreach ($destination as $item) --}}
                {{-- @php
                            $images = is_string($item->package_image)
                                ? json_decode($item->package_image, true)
                                : $item->package_image;
                            $displayImage = is_array($images) && !empty($images) ? $images[0] : null;
                        @endphp --}}
                @if (!empty($homedestinations) && count($homedestinations))
                    @foreach ($homedestinations as $item)
                        <div class="cs_grid_item pb-4">
                            <a href="{{ route('destinationDetailpage', ['destination_slug' => $item->destination_slug]) }}"
                                class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                                <div class="cs_card_thumb destination-image">
                                    <img src="{{ asset($item->destination_image) }}" alt="{{ $item->destination }}"
                                        class="gallery-image cs_zoom_in">
                                </div>
                                <div class="cs_card_content position-absolute">
                                    <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color"> {!! $item->destination !!}
                                    </h2>
                                    {{-- <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">Paris, 24 Trips</p> --}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="cs_grid_item p-2">
                        <a href="destination-details.html" class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                            <div class="cs_card_thumb w-100 h-100">
                                <img src="assets/images/popular_destination_2.jpeg" alt="Card Image"
                                    class="w-100 h-100 cs_zoom_in">
                            </div>
                            <div class="cs_card_content position-absolute">
                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">
                                    Pryde Mountains</h2>
                                <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">
                                    Prydelands, 100 Trips</p>
                            </div>
                        </a>
                    </div>
                    <div class="cs_grid_item p-2">
                        <a href="destination-details.html" class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                            <div class="cs_card_thumb w-100 h-100">
                                <img src="assets/images/popular_destination_3.jpeg" alt="Card Image"
                                    class="w-100 h-100 cs_zoom_in">
                            </div>
                            <div class="cs_card_content position-absolute">
                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">Lao Lading Island</h2>
                                <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">Krabal, 12 Trips</p>
                            </div>
                        </a>
                    </div>
                    <div class="cs_grid_item p-2">
                        <a href="destination-details.html" class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                            <div class="cs_card_thumb w-100 h-100">
                                <img src="assets/images/popular_destination_4.jpeg" alt="Card Image"
                                    class="w-100 h-100 cs_zoom_in">
                            </div>
                            <div class="cs_card_content position-absolute">
                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">Ton Kwen Temple</h2>
                                <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">Thailand, 20 Trips</p>
                            </div>
                        </a>
                    </div>
                    <div class="cs_grid_item p-2">
                        <a href="destination-details.html" class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                            <div class="cs_card_thumb w-100 h-100">
                                <img src="assets/images/popular_destination_5.jpeg" alt="Card Image"
                                    class="w-100 h-100 cs_zoom_in">
                            </div>
                            <div class="cs_card_content position-absolute">
                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">Taj Mahal</h2>
                                <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">Thailand, 50 Trips</p>
                            </div>
                        </a>
                    </div>
                    <div class="cs_grid_item p-2">
                        <a href="destination-details.html" class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                            <div class="cs_card_thumb w-100 h-100">
                                <img src="assets/images/popular_destination_9.jpeg" alt="Card Image"
                                    class="w-100 h-100 cs_zoom_in">
                            </div>
                            <div class="cs_card_content position-absolute">
                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">
                                    Pryde Mountains</h2>
                                <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">
                                    Prydelands, 120 Trips</p>
                            </div>
                        </a>
                    </div>
                    <div class="cs_grid_item p-2">
                        <a href="destination-details.html" class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                            <div class="cs_card_thumb w-100 h-100">
                                <img src="assets/images/popular_destination_1.jpeg" alt="Card Image"
                                    class="w-100 h-100 cs_zoom_in">
                            </div>
                            <div class="cs_card_content position-absolute">
                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">Eiffel Tower</h2>
                                <p class="cs_card_subtitle cs_fs_18 cs_medium cs_white_color mb-0">Paris, 24 Trips</p>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End destination Section -->
    <style>
        .cs_card_thumb.destination-image img {
            max-width: 400px;
            min-width: 400px;
            min-height: 400px;
            max-height: 400px;
            object-fit: cover;
        }

        .cs_grid.detsination-page {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        @media(max-width:768px) {
            .cs_grid.detsination-page {
                display: block !important;
                /* grid-template-columns: repeat(3,1fr); */
            }
        }
    </style>
@endsection
