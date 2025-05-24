@extends('layout.layout')
@section('title', 'Hotel')
@section('content')

  <!-- Start Hero Section -->
  <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_single_bg.jpeg' title='Hotel' />
  <!-- End Hero Section -->

  <section>
    <div class="cs_height_50 cs_height_lg_80"></div>

      <div class="container">
        <div class="pb-2 center">
          <h2 style="text-align: center">Top Hotels for Every Journey</h2>
          <p style="text-align: center">Find the perfect place to stay, no matter where your travels take you. Our curated selection of hotels offers
               something for every <a href="{{route('destinations')}}" style="color: black;font-weight: 500;"> style and budget — from luxurious resorts and boutique</a> stays to cozy
                budget-friendly rooms. Browse top-rated properties, read real guest reviews, and unlock exclusive travel deals — all in one place. Wherever you go, your perfect stay starts here.
          </p>
        </div>
        <div class="row cs_gap_y_24">
          @if (isset($hotel) && count($hotel) > 0)
          @foreach ($hotel as $item)
              @php
                  // Ensure hotel_image is a valid JSON string before decoding
                  $images = is_string($item->hotel_image)
                      ? json_decode($item->hotel_image, true)
                      : $item->hotel_image;

                  // Check if images is a valid array and get the first image
                  $displayImage = is_array($images) && !empty($images) ? $images[0] : null;
              @endphp
          <div class="col-lg-4">
            <div class="cs_card cs_style_3 cs_white_bg">
              <a href="{{ route('hotelDetails', ['slug' => $item->hotel_name]) }}" class="cs_card_thumb position-relative cs_zoom">
                @if ($displayImage)
                                        {{-- <figure class="images"> --}}
                                        <img src="{{ asset($displayImage) }}" alt="{{ $item->hotel_name }}"
                                            class="gallery-image cs_zoom_in">
                                        {{-- </figure> --}}
                                    @else
                                        {{-- <figure class="images"> --}}
                                        <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image">
                                        {{-- </figure> --}}
                                    @endif



              <div class="cs_card_content">
                <h2 class="cs_card_title cs_fs_24 cs_semibold">{!! $item->hotel_name !!}</h2>
                <hr>
                <div class="cs_card_action">
                  <a href="{{ route('hotelDetails', ['slug' => $item->hotel_name]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> View Hotel</a>
                </div>
              </div>
            </a>
            </div>
          </div>
          @endforeach
          @else
          <div class="col-lg-4">
            <div class="cs_card cs_style_3 cs_white_bg">
              <a href="#" class="cs_card_thumb position-relative cs_zoom">
                <img src="assets/images/package_img_6.jpeg" alt="Package Thumb" class="cs_zoom_in">
                <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
              </a>
              <div class="cs_card_content">
                <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="#">Believe In Your Mexico</a></h2>
                <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Paris, France </p>
                <hr>

              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cs_card cs_style_3 cs_white_bg">
              <a href="" class="cs_card_thumb position-relative cs_zoom">
                <img src="assets/images/package_img_7.jpeg" alt="Package Thumb" class="cs_zoom_in">
                <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
              </a>
              <div class="cs_card_content">
                <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="">Proof That Bahamas Beauty</a></h2>
                <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Rome, Italy</p>
                <hr>
                <div class="cs_card_action">
                  {{-- <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span> --}}
                  <a href="" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> View Hotel</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cs_card cs_style_3 cs_white_bg">
              <a href="" class="cs_card_thumb position-relative cs_zoom">
                <img src="assets/images/package_img_8.jpeg" alt="Package Thumb" class="cs_zoom_in">
                <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
              </a>
              <div class="cs_card_content">
                <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="">Famous for its skyscrapers</a></h2>
                <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i>New York City, USA</p>
                <hr>

              </div>
            </div>
          </div>


          @endif
        </div>
      </div>
      <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <style>
        img.gallery-image.cs_zoom_in {
      max-height: 400px;
      min-height: 400px;
      max-width: 430px;
      min-width: 430px;
      object-fit: cover;
  }
      </style>
@endsection
