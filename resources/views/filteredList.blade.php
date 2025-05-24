@extends('layout.layout')
@section('title', 'Our Packages')
@section('content')
    <div class="filtered-packages">

        {{-- <div class="row">
            @if ($packages && count($packages) > 0)
                @foreach ($packages as $item)
                    @php
                        $images = is_string($item->package_image) ? json_decode($item->package_image, true) : $item->package_image;
                        $displayImage = is_array($images) && !empty($images) ? $images[0] : null;
                    @endphp
                    <div class="col-xl-4 col-md-6">
                        <div class="destination-item tour-grid style-three bgc-lighter" data-aos="fade-up"
                            data-aos-duration="1500" data-aos-offset="50">
                            <div class="image">
                                @if ($displayImage)
                                    <img src="{{ asset('storage/' . $displayImage) }}" alt="{{ $item->package_name }}"
                                        class="gallery-image">
                                @else
                                    <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image">
                                @endif
                                <div class="ratting">{{ $item->package_type }}</div>
                            </div>
                            <div class="content">
                                <div class="destination-header">
                                    <span class="location"><i class="fal fa-map-marker-alt"></i>
                                        {{ $item->package_country }}</span>
                                </div>
                                <h5 class="card-heading">{{ $item->package_name }}</h5>
                                <ul class="blog-meta">
                                    <li><i class="far fa-clock"></i> {{ $item->package_duration_days }} Days /
                                        {{ $item->package_duration_nights }} Nights</li>
                                </ul>
                                <div class="destination-footers">
                                    <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}"
                                        class="theme-btn style-two style-three">
                                        <span data-hover="View More">View More</span>
                                        <i class="fal fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Packages Found.</p>
            @endif
        </div> --}}
        <x-hero subTitle='Modern & Beautiful' img='assets/images/tour_header_bg.jpeg' title='Tours Packages' />
        <section>
            <div class="cs_height_140 cs_height_lg_80"></div>
              <div class="container">
                <div class="row cs_gap_y_24">
                  @if (isset($packages) && count($packages) > 0)
                  @foreach ($packages as $item)
                      @php
                          // Ensure package_image is a valid JSON string before decoding
                          $images = is_string($item->package_image)
                              ? json_decode($item->package_image, true)
                              : $item->package_image;
        
                          // Check if images is a valid array and get the first image
                          $displayImage = is_array($images) && !empty($images) ? $images[0] : null;
                      @endphp
                  <div class="col-lg-4">
                    <div class="cs_card cs_style_3 cs_white_bg">
                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_card_thumb position-relative cs_zoom">
                        @if ($displayImage)
                                                {{-- <figure class="images"> --}}
                                                <img src="{{ asset('storage/' . $displayImage) }}" alt="{{ $item->package_name }}"
                                                    class="gallery-image cs_zoom_in">
                                                {{-- </figure> --}}
                                            @else
                                                {{-- <figure class="images"> --}}
                                                <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image">
                                                {{-- </figure> --}}
                                            @endif
        
                        <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">{!! $item->package_duration_days !!} Days /
                          {!! $item->package_duration_nights !!} Nights</div>
                      </a>
                      <div class="cs_card_content">
                        <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">{!! $item->package_name !!}</a></h2>
                        <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i>  {{ $item->package_country }}</p>
                        <hr>
                        <div class="cs_card_action">
                          <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0"><i class="fa-solid fa-indian-rupee-sign"></i>  {!! ($item->package_price) !!}</span>
                          <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="col-lg-4">
                    <div class="cs_card cs_style_3 cs_white_bg">
                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_card_thumb position-relative cs_zoom">
                        <img src="assets/images/package_img_6.jpeg" alt="Package Thumb" class="cs_zoom_in">
                        <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
                      </a>
                      <div class="cs_card_content">
                        <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">Believe In Your Mexico</a></h2>
                        <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Paris, France </p>
                        <hr>
                        <div class="cs_card_action">
                          <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
                          <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="cs_card cs_style_3 cs_white_bg">
                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_card_thumb position-relative cs_zoom">
                        <img src="assets/images/package_img_7.jpeg" alt="Package Thumb" class="cs_zoom_in">
                        <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
                      </a>
                      <div class="cs_card_content">
                        <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">Proof That Bahamas Beauty</a></h2>
                        <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Rome, Italy</p>
                        <hr>
                        <div class="cs_card_action">
                          <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
                          <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="cs_card cs_style_3 cs_white_bg">
                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_card_thumb position-relative cs_zoom">
                        <img src="assets/images/package_img_8.jpeg" alt="Package Thumb" class="cs_zoom_in">
                        <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
                      </a>
                      <div class="cs_card_content">
                        <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">Famous for its skyscrapers</a></h2>
                        <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i>New York City, USA</p>
                        <hr>
                        <div class="cs_card_action">
                          <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
                          <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="cs_card cs_style_3 cs_white_bg">
                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_card_thumb position-relative cs_zoom">
                        <img src="assets/images/package_img_9.jpeg" alt="Package Thumb" class="cs_zoom_in">
                        <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
                      </a>
                      <div class="cs_card_content">
                        <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">An ancient Incan city</a></h2>
                        <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Machu Picchu, Peru</p>
                        <hr>
                        <div class="cs_card_action">
                          <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
                          <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="cs_card cs_style_3 cs_white_bg">
                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_card_thumb position-relative cs_zoom">
                        <img src="assets/images/package_img_4.jpeg" alt="Package Thumb" class="cs_zoom_in">
                        <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
                      </a>
                      <div class="cs_card_content">
                        <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">Famous for its whitewashed</a></h2>
                        <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Santorini, Greece</p>
                        <hr>
                        <div class="cs_card_action">
                          <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
                          <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <div class="cs_height_140 cs_height_lg_80"></div>
            </section>
    </div>
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
