@extends('layout.layout')
@section('title', 'Book365days')
@section('content')
    {{-- <body> --}}

    <x-preloader />

    <!-- Start Header Section -->
    {{-- <x-header/>
    <x-header_search/> --}}
    <!-- End Header Section -->

    <!-- Start Hero Section -->
    <section class="cs_hero cs_style_1 cs_center cs_ripple_activate cs_primary_bg" data-src="./assets/images/banner.png">
        <div class="container">
            <div class="cs_hero_text text-center">
                <h3 class="cs_hero_subtitle cs_white_color cs_ternary_font cs_fs_25 cs_normal text-uppercase">Let's Travel
                    The World With Us</h3>
                <h1 class="cs_hero_title cs_white_color cs_fs_100 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    Travel Top Destination <br>of The World</h1>
            </div>
            <div class="cs_find_form_wrap">
                {{-- <form action="{{ route('filterPackages') }}" method="POST" class="cs_find_form">
                    @csrf
                    <div>
                        <h2 class="cs_fs_18 cs_normal mb-0">Where to?</h2>
                    </div>
                    <div>

                        <select name="city" id="city" class="st_select">

                            <option value="Destination">Destination</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination }}" {{ request('city') == $destination ? 'selected' : '' }}>
                                    {{ $destination }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select name="cars" class="st_select">
                            <option value="Guests">Guests</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div>
                        <button class="cs_find_btn cs_bold cs_primary_font cs_center"><i
                                class="fa-solid fa-magnifying-glass"></i> Find Now</button>
                    </div>
                </form> --}}

                <form action="{{ route('filterPackages') }}" method="POST" class="search-form">
                    @csrf
                    <div class="search-container">
                        {{-- Where to? label --}}
                        <div class="search-label">
                            <h2>Where to?</h2>
                        </div>

                        {{-- Destination dropdown --}}
                        <div class="select-container" style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif;">
                            <select name="city" id="city" style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif;">
                                <option value="" disabled {{ old('city') ? '' : 'selected' }} style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif;">Destination</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination }}" {{ old('city') == $destination ? 'selected' : '' }}>
                                        {{ $destination }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        {{-- Guests dropdown --}}
                        <div class="select-container" style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif;">
                            <select name="guests" style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif;">
                                <option value="" disabled {{ old('guests') ? '' : 'selected' }} style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif;">Guests</option>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>

                        {{-- Submit button --}}
                        <button type="submit" class="search-button" style="font-size: 20px;font-weight: 500;color: #1f2937; font-family: 'Playfair Display', serif; height: 72px;">
                            <i class="fas fa-search"></i>
                            Find Now
                        </button>
                    </div>
                </form>
                <!-- CSS Fix -->


                <style>
                   .search-form {
                    width: 100%;
                    max-width: 1200px;
                    margin: 0 auto;
                }

                .search-container {
                    display: flex;
                    align-items: center;
                    background-color: white;
                    border-radius: 12px;
                    overflow: hidden;
                }

                .search-label {
                    padding: 16px;
                    width: 200px;
                    border-right: 1px solid #e5e7eb;
                }

                .search-label h2 {
                    font-size: 20px;
                    font-weight: 500;
                    color: #1f2937;
                    margin: 0;
                }

                .select-container {
                    position: relative;
                    flex: 1;
                    padding: 16px;
                    border-right: 1px solid #e5e7eb;
                }

                .select-container select {
                    width: 100%;
                    padding: 8px 12px;
                    appearance: none;
                    border: none;
                    background: transparent;
                    cursor: pointer;
                    color: #4b5563;
                    font-size: 16px;
                }

                .select-container select:focus {
                    outline: none;
                }

                .select-container i {
                    position: absolute;
                    right: 16px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #2563eb;
                    pointer-events: none;
                }

                .search-button {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 8px;
                    padding: 16px;
                    min-width: 200px;
                    background-color: #2dd4bf;
                    color: #1f2937;
                    border: none;
                    font-weight: 500;
                    cursor: pointer;
                    transition: background-color 0.2s;
                }

                .search-button:hover {
                    background-color: #14b8a6;
                }

                /* Responsive styles */
                @media (max-width: 768px) {
                    .search-container {
                        flex-direction: column;
                        border-radius: 8px;
                    }

                    .search-label,
                    .select-container {
                        width: 100%;
                        border-right: none;
                        border-bottom: 1px solid #e5e7eb;
                    }

                    .search-button {
                        width: 100%;
                    }
                }
                </style>


            </div>
        </div>
        <div class="cs_hero_shape_1"></div>
        <div class="cs_hero_shape_2"></div>
        <div class="cs_hero_shape_3"></div>
    </section>
    <!-- End Hero Section -->



    <!-- Start About Section -->
    <section class="cs_about cs_style_1">
        <div class="cs_height_140 cs_height_lg_80"></div>
        <div class="container">
            <div class="row align-items-center cs_gap_y_40">
                <div class="col-lg-5"><img src="{!! $home_about_image ?? 'assets/images/about_img.png' !!}" alt=""></div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="cs_section_heading cs_style_1">
                        <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">About Us</h3>
                        <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInRight" data-wow-duration="0.8s"
                            data-wow-delay="0.2s">{!! $Home_about_title ?? 'We are Professional Planners For your' !!} </h2>
                    </div>
                    <div class="cs_about_text">
                        <p data-aos="fade-up">{!! $Home_about_content ??
                            'We specialize in furnishing exceptional trip gests acclimatized to your unique
                                                    requirements. Our platform of professional itineraries is devoted to making your trip as smooth,
                                                    instigative, and stress-free as possible. Whether you are planning a weekend flight, a family
                                                    holiday' !!}</p>
                        <p class="mb-0 cs_accent_color cs_medium cs_fs_18">Speak to our <a href="{{route('destination')}}" style="color:#3bc4d6;"> Destination </a> Experts at Direct Call
                            <a href="tel:+91{!! $Contact_number ?? '+1 546 378 654' !!}">+91{!! $Contact_number ?? '+1 546 378 654' !!}</a> </p>
                    </div>
                    <ul class="cs_list cs_style_1 cs_mp0 cs_fs_18">
                        {{-- <li data-aos="fade-up"> --}}
                            {{-- <i class="fa-solid fa-circle-check cs_accent_color"></i> --}}
                          {!! $home_about_content_points ?? '
                          <li data-aos="fade-up">
                            <i class="fa-solid fa-circle-check cs_accent_color"></i>
                            All packages and activiates are carefully picked by us.
                          </li>
                          <li data-aos="fade-up">
                            <i class="fa-solid fa-circle-check cs_accent_color"></i>
                            98% Course Completitation Rates
                          </li>
                          <li data-aos="fade-up">
                            <i class="fa-solid fa-circle-check cs_accent_color"></i>
                            We are an award winning agency
                          </li>
                          <li data-aos="fade-up">
                            <i class="fa-solid fa-circle-check cs_accent_color"></i>
                            Trusted by more than 80,000 customers
                          </li>'
                          !!}
                          {{-- </li> --}}
                    </ul>
                    <a href="{{ route('about') }}" class="cs_btn cs_style_1 cs_fs_18 cs_medium">
                        Read More
                        <svg width="20" height="10" viewBox="0 0 20 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z"
                                fill="currentColor" />
                            <path
                                d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z"
                                fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End About Section -->

    <!-- Start featured section -->
    <section class="cs_featured cs_style_1 cs_bg_filed" data-src="assets/images/feature_bg.jpeg">
        <div class="cs_height_140 cs_height_lg_80"></div>
        <div class="container ">
            <div class="row cs_gap_y_40 wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
                <div class="swiper usp">
                    <div class="swiper-wrapper common-one">
                @if (isset($usp) && count($usp) > 0)
                    @foreach ($usp as $item)
                        <div class="col-lg-3 col-sm-6 swiper-slide">
                            <div class="cs_iconbox cs_style_1">
                                <div class="cs_iconbox_icon cs_radius_15 cs_center"data-aos="fade-up">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->heading_top }}">
                                </div>
                                <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up">{{ $item->heading_top }}
                                </h2>
                                <p class="cs_iconbox_subtitle mb-0"data-aos="fade-up">{{ $item->heading_middle }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-3 col-sm-6 ">
                        <div class="cs_iconbox cs_style_1">
                            <div class="cs_iconbox_icon cs_radius_15 cs_center"data-aos="fade-up">
                                <img src="assets/images/icons/feature_icon_1.svg" alt="Featured Icon">
                            </div>
                            <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up">Customer Delight</h2>
                            <p class="cs_iconbox_subtitle mb-0"data-aos="fade-up">We are dedicated to ensuring that every
                                dimension of your adventure is icing on the cake
                                compared to prospects. From flawless bookings to substantiated services, your satisfaction
                                is
                                our
                                top priority.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cs_iconbox cs_style_1">
                            <div class="cs_iconbox_icon cs_radius_15 cs_center"data-aos="fade-up">
                                <img src="assets/images/icons/feature_icon_2.svg" alt="Featured Icon">
                            </div>
                            <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up">Trusted Adventure</h2>
                            <p class="cs_iconbox_subtitle mb-0"data-aos="fade-up">Experience instigative peregrinations with
                                confidence. Our trusted network of mates ensures that
                                your adventures are safe, secure, and indelible, no matter where you go.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cs_iconbox cs_style_1">
                            <div class="cs_iconbox_icon cs_radius_15 cs_center"data-aos="fade-up">
                                <img src="assets/images/icons/feature_icon_3.svg" alt="Featured Icon">
                            </div>
                            <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up">Expert Guides</h2>
                            <p class="cs_iconbox_subtitle mb-0"data-aos="fade-up">Gain deeper perceptivity into your
                                destination
                                with our educated, passionate original attendants.
                                They bring every position to life with stories, knowledge, and moxie.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="cs_iconbox cs_style_1">
                            <div class="cs_iconbox_icon cs_radius_15 cs_center"data-aos="fade-up">
                                <img src="assets/images/icons/feature_icon_4.svg" alt="Featured Icon">
                            </div>
                            <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up">Time Flexibility</h2>
                            <p class="cs_iconbox_subtitle mb-0"data-aos="fade-up">We understand that your time is precious.
                                Choose from flexible planners that fit your schedule,
                                whether it’s a quick flight or a long, tardy trip.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
            </div>
        </div>
        <div class="cs_height_133 cs_height_lg_80"></div>
    </section>
    <!-- End featured section -->

    <!-- Start Package Section -->
    <section>
        <div class="cs_height_135 cs_height_lg_75"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 text-center">
                <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">CHOOSE YOUR PACKAGE</h3>
                <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">Popular Tours Packages</h2>
            </div>
            <div class="cs_height_55 cs_height_lg_40"></div>
        </div>
        <div class="container-fluid">
            <div class="row cs_gap_y_24">
                <div class="swiper tour_packages">
                    <div class="swiper-wrapper">
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
                        <div class="col-lg-3 col-sm-6 swiper-slide tour-packages-images">
                             <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">
                            @if ($displayImage)
                                {{-- <figure class="images"> --}}


                                <div class="cs_card cs_style_1 cs_bg_filed cs_radius_5 position-relative"
                                    data-src="{{ asset('storage/' . $displayImage) }}" alt="{{ $item->package_name }}">
                            @endif
                            <div class="cs_card_overlay cs_radius_5 position-absolute w-100 h-100"></div>
                            <div class="cs_card_content position-absolute">
                                <div class="cs_card_meta cs_white_color">
                                    <div>
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span> {{ $item->package_country }}</span>
                                    </div>
                                    <div>
                                        <i class="fa-regular fa-clock"></i>
                                        <span> {!! $item->package_duration_days !!} Days</span>
                                    </div>
                                    <div>
                                        {{-- <i class="fa-solid fa-star"></i>
                    <span> 5K+ Rating</span> --}}
                                    </div>
                                </div>
                                <h2 class="cs_card_title cs_fs_24 cs_medium cs_white_color"><a
                                        href="">{!! $item->package_name !!}</a></h2>
                                <div class="cs_card_action">
                                    <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}"
                                        class="cs_btn cs_style_1 cs_fs_18 cs_medium">
                                        Book Now
                                        <svg width="20" height="10" viewBox="0 0 20 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z"
                                                fill="currentColor" />
                                            <path
                                                d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                    <span class="cs_card_price cs_fs_24 cs_medium cs_white_color mb-0"><i
                                            class="fa-solid fa-indian-rupee-sign"></i> {!! $item->package_offer_price !!}</span>
                                </div>
                            </div>
                        </a>
                        </div>
            </div>
            @endforeach
        @else
            <p>NO Data Available</p>
            @endif
        </div>
    </div>
    <div class="tour-button">
    <a href="{{ route('tour') }}" class="cs_btn cs_style_1 cs_fs_18 cs_medium">
        Explore More
        <svg width="20" height="10" viewBox="0 0 20 10" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z"
                fill="currentColor" />
            <path
                d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z"
                fill="currentColor" />
        </svg>
    </a>
</div>
    {{-- <div class="view-more-buttons pt-4" style="display:block; text-align:center;">
        <a class="service-view-buttons" style="color:white;" href=""><button
                type="submit" class="theme-btn style-two text-center col-4 ">
                <span data-hover="Send Comments"></span>
                {{-- <i class="fal fa-arrow-right"></i></a> --}}
        {{-- </button>
    </div>  --}}
        </div>
        </div>
    </section>
    <!-- End Package Section -->

    <!-- Start FunFact Section -->
    <section>
        <div class="cs_height_135 cs_height_lg_80"></div>
        <div class="container">
            <div class="row cs_gap_y_40">
                <div class="col-lg-6">
                    <div class="cs_image_box cs_style_1">
                        <img src="{!! $Home_travel_point_image ?? 'assets/images/funfact_img.png' !!}" alt="FunFact">
                        <div class="cs_image_box_shape" data-src="assets/images/funfact_shape.png"></div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="cs_section_heading cs_style_1">
                        <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">Travel Point
                        </h3>
                        <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0">{!! $Home_travel_point_title ?? 'Discover The World With Our Guide' !!}</h2>
                        <p class="cs_section_subtitle content-black">{!! $Home_travel_point_content ?? 'Explore the world with confidence by our expert attendants,
                            customized planners, and trusted
                            services, your adventure, your way.' !!}</p>
                    </div>
                    <div class="cs_height_55 cs_height_lg_40"></div>
                    <div class="row cs_gap_y_24 position-relative">
                        <div class="cs_funfact_1_icon cs_accent_bg cs_center rounded-circle">
                            <svg width="40" height="36" viewBox="0 0 40 36" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M35.522 18.002C35.522 19.629 36.858 20.9528 38.5 20.9528C39.328 20.9528 40 21.6186 40 22.439V27.7916C40 32.318 36.284 36 31.716 36H8.286C3.718 36 0 32.318 0 27.7916V22.439C0 21.6186 0.672 20.9528 1.5 20.9528C3.144 20.9528 4.48 19.629 4.48 18.002C4.48 16.4166 3.198 15.2236 1.5 15.2236C1.102 15.2236 0.722 15.067 0.44 14.7876C0.158 14.5082 0 14.1296 0 13.7373L0.00400019 8.21028C0.00400019 3.68402 3.72 0 8.288 0H31.712C36.28 0 39.998 3.68402 39.998 8.21028L40 13.5649C40 13.9573 39.842 14.3378 39.562 14.6152C39.28 14.8946 38.9 15.0512 38.5 15.0512C36.858 15.0512 35.522 16.375 35.522 18.002ZM24.504 19.296L26.862 17.021C27.272 16.6286 27.414 16.05 27.236 15.515C27.06 14.9798 26.6 14.5994 26.044 14.522L22.786 14.0504L21.328 11.1254C21.078 10.622 20.57 10.3089 20.004 10.3069H20C19.436 10.3069 18.928 10.6201 18.674 11.1234L17.216 14.0504L13.964 14.52C13.402 14.5994 12.942 14.9798 12.764 15.515C12.588 16.05 12.73 16.6286 13.138 17.021L15.496 19.296L14.94 22.5124C14.844 23.0672 15.07 23.6182 15.53 23.9492C15.79 24.1334 16.092 24.2286 16.398 24.2286C16.632 24.2286 16.868 24.171 17.084 24.0582L20 22.5402L22.91 24.0542C23.414 24.3216 24.012 24.28 24.47 23.9472C24.932 23.6182 25.158 23.0672 25.062 22.5124L24.504 19.296Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="col-sm-6">
                            <div class="cs_funfact cs_style_1 text-center">
                                <h3 class="cs_funfact_title cs_fs_40 cs_semibold cs_accent_color"><span class="odometer"
                                        data-count-to="{!! $travel_point_holiday_package ?? '502' !!}"></span>+</h3>
                                <p class="cs_funfact_subtitle content-black mb-0 cs_fs_18">Holiday Package</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cs_funfact cs_style_1 text-center">
                                <h3 class="cs_funfact_title cs_fs_40 cs_semibold cs_accent_color"><span class="odometer"
                                        data-count-to="{!! $travel_point_luxury_hotel ?? '100' !!}"></span>+</h3>
                                <p class="cs_funfact_subtitle content-black mb-0 cs_fs_18">Luxury Hotel</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cs_funfact cs_style_1 text-center">
                                <h3 class="cs_funfact_title cs_fs_40 cs_semibold cs_accent_color"><span class="odometer"
                                        data-count-to="{!! $travel_point_premium_airline ?? '77' !!}"></span>+</h3>
                                <p class="cs_funfact_subtitle content-black mb-0 cs_fs_18">Premium Airlines</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="cs_funfact cs_style_1 text-center">
                                <h3 class="cs_funfact_title cs_fs_40 cs_semibold cs_accent_color"><span class="odometer"
                                        data-count-to="{!! $travel_point_happy_customer ?? '2' !!}"></span>+</h3>
                                <p class="cs_funfact_subtitle content-black mb-0 cs_fs_18">Happy Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FunFact Section -->

    <!-- Start destination Section -->
    <section>
        <div class="cs_height_135 cs_height_lg_80"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 text-center">
                <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">POPULAR DESTINATION</h3>
                <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">Popular Destinations</h2>
            </div>
            <div class="cs_height_55 cs_height_lg_40"></div>
            <div class="cs_grid destination-page">
                <div class="swiper destination-package">
                    <div class="swiper-wrapper">
                        @if (!empty($homedestinations) && count($homedestinations))
                        @foreach ($homedestinations as $item)
                                <div class="swiper-slide">
                                    <div class="cs_grid_item">
                                        <a href="{{ route('destinationDetailpage', ['destination_slug' => $item->destination_slug]) }}"
                                            class="cs_card cs_style_2 cs_zoom position-relative cs_radius_8">
                                            <div class="cs_card_thumb destination-image">

                                                    <img src="{{ asset($item->destination_image) }}"
                                                        alt="{{ $item->destination }}" class="gallery-image cs_zoom_in">

                                            </div>
                                            <div class="cs_card_content position-absolute">
                                                <h2 class="cs_card_title cs_fs_35 cs_medium cs_white_color">
                                                    {!! $item->destination !!}
                                                </h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                <div class="cs_grid_item">
                                    <p class="cs_card_title cs_fs_35 cs_medium cs_white_color">No packages available.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tour-button pt-4">
                <a href="{{ route('destination') }}" class="cs_btn cs_style_1 cs_fs_18 cs_medium">
                    Explore More
                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z"
                            fill="currentColor" />
                        <path
                            d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z"
                            fill="currentColor" />
                    </svg>
                </a>
            </div>

        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End destination Section -->

    <!-- Start Banner Section -->
    <section class="cs_banner cs_style_1 cs_bg_filed cs_primary_bg" data-src="{!! $testimonial_image ?? 'assets/images/banner_bg.jpeg' !!}">
        <div class="cs_height_125 cs_height_lg_70"></div>
        <div class="container">
            <div class="swiper testimonial">
                <div class="swiper-wrapper">
                    @if (isset($testimonial) && count($testimonial) > 0)
                    @foreach ($testimonial as $item)
                    <div class="swiper-slide testimonial-page">
            <div class="cs_banner_text cs_white_color">
                <h2 class="cs_banner_title cs_white_color cs_fs_56 wow fadeInRight" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">{!! $item->heading_top !!}</h2>
                <p class="cs_banner_subtitle cs_fs_18"data-aos="fade-up">{!! $item->heading_middle !!}</p>
                {{-- <div class="cs_banner_review cs_medium"> --}}
                {{-- <svg width="110" height="22" viewBox="0 0 110 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H20.7736V21.309H0V0Z" fill="#1BB580" />
                        <path d="M22.1582 0H42.9318V21.309H22.1582V0Z" fill="#1BB580" />
                        <path d="M44.3164 0H65.09V21.309H44.3164V0Z" fill="#1BB580" />
                        <path d="M66.4746 0H87.2482V21.309H66.4746V0Z" fill="#1BB580" />
                        <path d="M88.6328 0H109.406V21.309H88.6328V0Z" fill="#1BB580" />
                        <path
                            d="M10.5865 13.8223L13.0471 13.1743L14.0752 16.4669L10.5865 13.8223ZM16.2493 9.56647H11.918L10.5865 5.32812L9.25513 9.56647H4.92383L8.42932 12.1935L7.09791 16.4319L10.6034 13.8048L12.7606 12.1935L16.2493 9.56647Z"
                            fill="white" />
                        <path
                            d="M32.7447 13.8223L35.2053 13.1743L36.2334 16.4669L32.7447 13.8223ZM38.4075 9.56647H34.0762L32.7447 5.32812L31.4133 9.56647H27.082L30.5875 12.1935L29.2561 16.4319L32.7616 13.8048L34.9188 12.1935L38.4075 9.56647Z"
                            fill="white" />
                        <path
                            d="M54.9049 13.8223L57.3655 13.1743L58.3935 16.4669L54.9049 13.8223ZM60.5676 9.56647H56.2363L54.9049 5.32812L53.5735 9.56647H49.2422L52.7477 12.1935L51.4163 16.4319L54.9218 13.8048L57.079 12.1935L60.5676 9.56647Z"
                            fill="white" />
                        <path
                            d="M77.0631 13.8223L79.5237 13.1743L80.5517 16.4669L77.0631 13.8223ZM82.7258 9.56647H78.3945L77.0631 5.32812L75.7317 9.56647H71.4004L74.9059 12.1935L73.5745 16.4319L77.08 13.8048L79.2372 12.1935L82.7258 9.56647Z"
                            fill="white" />
                        <path
                            d="M99.2213 13.8223L101.682 13.1743L102.71 16.4669L99.2213 13.8223ZM104.884 9.56647H100.553L99.2213 5.32812L97.8899 9.56647H93.5586L97.0641 12.1935L95.7327 16.4319L99.2382 13.8048L101.395 12.1935L104.884 9.56647Z"
                            fill="white" />
                    </svg> --}}
                {{-- 01 Jan 2024
                </div> --}}
            </div>
        </div>
            @endforeach
            @else
            <div class="cs_banner_text cs_white_color">
                <h2 class="cs_banner_title cs_white_color cs_fs_56 wow fadeInRight" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">A Truly Wonderful Experience</h2>
                <p class="cs_banner_subtitle cs_fs_18"data-aos="fade-up">Brilliant for anyone looking to get away from the
                    hustle and bustle of city life or detox from their tech for a few days. I could have stayed another
                    week!<br><br>
                    They really have thought about everything here down to the finest details.</p>
                {{-- <div class="cs_banner_review cs_medium"> --}}
                {{-- <svg width="110" height="22" viewBox="0 0 110 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H20.7736V21.309H0V0Z" fill="#1BB580" />
                        <path d="M22.1582 0H42.9318V21.309H22.1582V0Z" fill="#1BB580" />
                        <path d="M44.3164 0H65.09V21.309H44.3164V0Z" fill="#1BB580" />
                        <path d="M66.4746 0H87.2482V21.309H66.4746V0Z" fill="#1BB580" />
                        <path d="M88.6328 0H109.406V21.309H88.6328V0Z" fill="#1BB580" />
                        <path
                            d="M10.5865 13.8223L13.0471 13.1743L14.0752 16.4669L10.5865 13.8223ZM16.2493 9.56647H11.918L10.5865 5.32812L9.25513 9.56647H4.92383L8.42932 12.1935L7.09791 16.4319L10.6034 13.8048L12.7606 12.1935L16.2493 9.56647Z"
                            fill="white" />
                        <path
                            d="M32.7447 13.8223L35.2053 13.1743L36.2334 16.4669L32.7447 13.8223ZM38.4075 9.56647H34.0762L32.7447 5.32812L31.4133 9.56647H27.082L30.5875 12.1935L29.2561 16.4319L32.7616 13.8048L34.9188 12.1935L38.4075 9.56647Z"
                            fill="white" />
                        <path
                            d="M54.9049 13.8223L57.3655 13.1743L58.3935 16.4669L54.9049 13.8223ZM60.5676 9.56647H56.2363L54.9049 5.32812L53.5735 9.56647H49.2422L52.7477 12.1935L51.4163 16.4319L54.9218 13.8048L57.079 12.1935L60.5676 9.56647Z"
                            fill="white" />
                        <path
                            d="M77.0631 13.8223L79.5237 13.1743L80.5517 16.4669L77.0631 13.8223ZM82.7258 9.56647H78.3945L77.0631 5.32812L75.7317 9.56647H71.4004L74.9059 12.1935L73.5745 16.4319L77.08 13.8048L79.2372 12.1935L82.7258 9.56647Z"
                            fill="white" />
                        <path
                            d="M99.2213 13.8223L101.682 13.1743L102.71 16.4669L99.2213 13.8223ZM104.884 9.56647H100.553L99.2213 5.32812L97.8899 9.56647H93.5586L97.0641 12.1935L95.7327 16.4319L99.2382 13.8048L101.395 12.1935L104.884 9.56647Z"
                            fill="white" />
                    </svg> --}}
                {{-- 01 Jan 2024
                </div> --}}
            </div>
            @endif
        </div>
    </div>
        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End Banner Section -->

    <!-- Start Steps Section -->
    <section>
        <div class="cs_height_135 cs_height_lg_80"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 text-center">
                <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">HOW IT WORKS</h3>
                <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">Getting Started? It’s Simple</h2>
            </div>
            <div class="cs_height_55 cs_height_lg_40"></div>
            <div class="cs_steps cs_style_1">
                <div class="cs_step text-center position-relative">
                    <div class="cs_step_thumb rounded-circle position-relative"data-aos="fade-up">
                        <img src="assets/images/working_process_1.png" alt="Thumb" class="rounded-circle">
                        <span
                            class="cs_step_number cs_semibold text-white cs_fs_25 rounded-circle cs_accent_bg d-flex align-items-center justify-content-center position-absolute">01</span>
                    </div>
                    <h2 class="cs_fs_25 cs_semibold"data-aos="fade-up">Get Travel Insurence</h2>
                    <p class="m-0"data-aos="fade-up">Provide you with a hassle-free and worry-free trip by ensuring that
                        you obtain comprehensive trip
                        insurance covering all the range from cancellations to medical extremities. Your peace of mind is
                        our precedence.</p>
                </div>
                <div class="cs_step text-center position-relative">
                    <div class="cs_step_thumb rounded-circle position-relative"data-aos="fade-up">
                        <img src="assets/images/working_process_2.png" alt="Thumb" class="rounded-circle">
                        <span
                            class="cs_step_number cs_semibold text-white cs_fs_25 rounded-circle cs_accent_bg d-flex align-items-center justify-content-center position-absolute">02</span>
                    </div>
                    <h2 class="cs_fs_25 cs_semibold"data-aos="fade-up">Compare & Book</h2>
                    <p class="m-0"data-aos="fade-up">Compare travel packages available in a single place, then find an
                        option that fits your pocket,
                        preferences, and schedule. Once you’ve set up your ideal trip, booking is smooth and stress-free.
                    </p>
                </div>
                <div class="cs_step text-center position-relative">
                    <div class="cs_step_thumb rounded-circle position-relative"data-aos="fade-up">
                        <img src="assets/images/working_process_3.png" alt="Thumb" class="rounded-circle">
                        <span
                            class="cs_step_number cs_semibold text-white cs_fs_25 rounded-circle cs_accent_bg d-flex align-items-center justify-content-center position-absolute">03</span>
                    </div>
                    <h2 class="cs_fs_25 cs_semibold"data-aos="fade-up">Book a Room</h2>
                    <p class="m-0"data-aos="fade-up">With our expansive selection of lodgement, you can fluently bespeak
                        a room that suits your style -
                        whether it's a luxury hostel, a cozy guesthouse, or a unique exchange stay. Your comfort is
                        assured.</p>
                </div>
            </div>
        </div>
        <div class="cs_height_133 cs_height_lg_80"></div>
    </section>
    <!-- End Steps Section -->

    <!-- Start Video Section -->
    <section>
        <div class="container">
            <div class="cs_video_block cs_style_1 cs_bg_filed position-relative"
                data-src="assets/images/video_block.jpeg">
                <a href="https://www.youtube.com/embed/eSUmkFPln_U"
                    class="cs_player_btn cs_center cs_accent_bg cs_video_open">
                    <svg width="40" height="47" viewBox="0 0 40 47" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M36.9921 17.8114L9.63992 0.951019C7.66105 -0.267256 5.26855 -0.317908 3.23984 0.815524C1.21113 1.94878 0 4.01294 0 6.3367V39.9039C0 43.4175 2.83109 46.2914 6.31071 46.3104C6.32021 46.3104 6.32971 46.3105 6.33902 46.3105C7.42642 46.3104 8.55958 45.9696 9.61794 45.3238C10.4693 44.8043 10.7384 43.693 10.219 42.8417C9.69952 41.9902 8.58807 41.7212 7.73693 42.2407C7.2419 42.5426 6.75844 42.6988 6.33016 42.6987C5.01727 42.6916 3.61159 41.5669 3.61159 39.904V6.33679C3.61159 5.33994 4.13113 4.4547 5.00127 3.96853C5.87149 3.48236 6.89764 3.50407 7.74543 4.02606L35.0977 20.8864C35.9198 21.3926 36.3902 22.2366 36.3882 23.2021C36.3862 24.1674 35.9124 25.0095 35.0857 25.514L15.31 37.6224C14.4594 38.1432 14.192 39.2549 14.7128 40.1054C15.2335 40.956 16.3453 41.2234 17.1959 40.7026L36.9693 28.5956C38.8625 27.4407 39.9955 25.4272 40 23.2093C40.0045 20.9916 38.8797 18.9735 36.9921 17.8114Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <h2 class="cs_video_title cs_fs_60 cs_semibold cs_white_color position-absolute mb-0">Our Journey <br> in
                    Videos</h2>
                <span class="cs_location cs_fs_20 cs_white_color">
                    <i class="fa-solid fa-location-dot"></i> Location Mountain Strait, Any State</span>
            </div>
        </div>
    </section>
    <!-- End Video Section -->

    <!-- Start Brands Section -->
    <div>
        <div class="cs_height_76 cs_height_lg_40"></div>
        <div class="container">
            <div class="cs_brand_list">
                <div class="swiper partners">
                    <div class="swiper-wrapper">

                @if (isset($partners) && count($partners) > 0)
                    @foreach ($partners as $item)
                <div class="cs_brand swiper-slide">
                    <img src="{{ asset($item->image) }}" alt="Brand">
                </div>

                @endforeach
                @else
                <div class="cs_brand swiper-slide"><img src="assets/images/brand_1.svg" alt="Brand"></div>
                <div class="cs_brand swiper-slide"><img src="assets/images/brand_2.svg" alt="Brand"></div>
                <div class="cs_brand swiper-slide"><img src="assets/images/brand_3.svg" alt="Brand"></div>
                <div class="cs_brand swiper-slide"><img src="assets/images/brand_4.svg" alt="Brand"></div>
                <div class="cs_brand swiper-slide"><img src="assets/images/brand_5.svg" alt="Brand"></div>
                @endif

            </div>
        </div>
            </div>
        </div>
        <div class="cs_height_135 cs_height_lg_80"></div>
    </div>
    <!-- End Brands Section -->

    <!-- Start Blog Section -->
    <section>
        <div class="container-fluid">
            <div class="cs_section_heading cs_style_1 text-center">
                <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">News & Blogs</h3>
                <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s"
                    data-wow-delay="0.2s">Last Minute Amazing Deals</h2>
            </div>
            <div class="cs_height_55 cs_height_lg_40"></div>
            <div class="row cs_gap_y_24">
                <div class="swiper blogs">
                    <div class="swiper-wrapper">


                @if (isset($blogs) && count($blogs) > 0)
                    @foreach ($blogs as $item)
                        <div class="col-lg-6 swiper-slide">
                            <article class="cs_post cs_style_1">
                                <a href="{{ route('blogdetail', ['slug' => $item->slug]) }}"
                                    class="cs_post_thumb cs_zoom overflow-hidden position-relative">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="cs_zoom_in">
                                    {{-- <div class="cs_posted_by position-absolute">
                  <span class="cs_accent_bg cs_white_color">27</span>
                  <span class="cs_primary_bg cs_white_color">March 2024</span>
                </div> --}}
                                </a>
                                <div class="cs_post_info">
                                    <div class="cs_post_info_in">
                                        {{-- <div class="cs_post_avatar">
                                    <div class="cs_avatar_thumb">
                                        <img src="assets/images/avatar_1.png" alt="Avatar">
                                    </div>
                                    <div class="cs_avatar_info">By. <br>Admin</div>
                                </div> --}}
                                        <h2 class="cs_post_title cs_fs_24 cs_semibold"><a
                                                href="{{ route('blogdetail', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                                        </h2>
                                        <p class="cs_post_subtitle">{{ $item->short_content }}</p>
                                        <div class="cs_post_btns cs_gray_bg_1">
                                            {{-- <a href="#">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask01" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                                y="0" width="20" height="20">
                                                <rect width="20" height="20" fill="#D9D9D9" />
                                            </mask>
                                            <g mask="url(#mask01)">
                                                <path
                                                    d="M1.66675 18.3337V3.33366C1.66675 2.87533 1.83008 2.48283 2.15675 2.15616C2.48286 1.83005 2.87508 1.66699 3.33341 1.66699H16.6667C17.1251 1.66699 17.5176 1.83005 17.8442 2.15616C18.1704 2.48283 18.3334 2.87533 18.3334 3.33366V13.3337C18.3334 13.792 18.1704 14.1845 17.8442 14.5112C17.5176 14.8373 17.1251 15.0003 16.6667 15.0003H5.00008L1.66675 18.3337ZM3.33341 14.3128L4.31258 13.3337H16.6667V3.33366H3.33341V14.3128Z"
                                                    fill="currentColor" />
                                            </g>
                                        </svg> Comment(5)</a> --}}
                                            <a href="{{ route('blogdetail', ['slug' => $item->slug]) }}"
                                                class="cs_post_btn cs_primary_bg">
                                                More<svg width="10" height="10" viewBox="0 0 10 10"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip02)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.15616 4.59014L1.31712 0.0641602C1.24542 0.0224266 1.164 0.000298672 1.08104 0H1.07968C0.996674 0.000329659 0.915216 0.022469 0.843465 0.0641992C0.771208 0.105407 0.711218 0.165101 0.669653 0.237153C0.628087 0.309204 0.606443 0.391019 0.606942 0.474199V9.52607C0.606614 9.60931 0.628283 9.69115 0.669757 9.76332C0.711231 9.83548 0.771035 9.89541 0.843117 9.93703C0.915198 9.97864 0.996997 10.0005 1.08023 10.0003C1.16346 10.0002 1.24518 9.97801 1.3171 9.93611L9.15616 5.41012C9.22813 5.36857 9.2879 5.30881 9.32946 5.23684C9.37101 5.16487 9.39289 5.08323 9.39289 5.00013C9.39289 4.91702 9.37101 4.83538 9.32946 4.76341C9.2879 4.69145 9.22813 4.63168 9.15616 4.59014Z"
                                                            fill="currentColor" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip02">
                                                            <rect width="10" height="10" fill="currentColor" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-6">
                        <article class="cs_post cs_style_1">
                            <a href="" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
                                <img src="assets/images/post_2.jpeg" alt="Post Thumb" class="cs_zoom_in">
                                <div class="cs_posted_by position-absolute">
                                    <span class="cs_accent_bg cs_white_color">27</span>
                                    <span class="cs_primary_bg cs_white_color">March 2024</span>
                                </div>
                            </a>
                            <div class="cs_post_info">
                                <div class="cs_post_info_in">
                                    <div class="cs_post_avatar">
                                        <div class="cs_avatar_thumb">
                                            <img src="assets/images/avatar_2.png" alt="Avatar">
                                        </div>
                                        <div class="cs_avatar_info">By. <br>Admin</div>
                                    </div>
                                    <h2 class="cs_post_title cs_fs_24 cs_semibold"><a href="">Eazy
                                            PNR The Only Theme You Will Ever Need for Seamless Travel Planning</a></h2>
                                    <p class="cs_post_subtitle">In this fast-paced world of the moment, it can often become
                                        tempting to invite a trip planning session. Reserve the breakouts; secure a lodging
                                        arrangement and chances of the stylish original gests - the task of organizing an
                                        entire
                                        trip can quickly seem overwhelming. yet, having the right tools in front of you,
                                        planning a trip doesn't have to be stressful it can actually be instigative and
                                        flawless.</p>
                                    <div class="cs_post_btns cs_gray_bg_1">
                                        <a href="#">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <mask id="mask0_346_344" style="mask-type:alpha"
                                                    maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                                                    <rect width="20" height="20" fill="#D9D9D9" />
                                                </mask>
                                                <g mask="url(#mask0_346_344)">
                                                    <path
                                                        d="M1.66675 18.3337V3.33366C1.66675 2.87533 1.83008 2.48283 2.15675 2.15616C2.48286 1.83005 2.87508 1.66699 3.33341 1.66699H16.6667C17.1251 1.66699 17.5176 1.83005 17.8442 2.15616C18.1704 2.48283 18.3334 2.87533 18.3334 3.33366V13.3337C18.3334 13.792 18.1704 14.1845 17.8442 14.5112C17.5176 14.8373 17.1251 15.0003 16.6667 15.0003H5.00008L1.66675 18.3337ZM3.33341 14.3128L4.31258 13.3337H16.6667V3.33366H3.33341V14.3128Z"
                                                        fill="currentColor" />
                                                </g>
                                            </svg> Comment(5)
                                        </a>
                                        <a href="" class="cs_post_btn cs_primary_bg">
                                            More<svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_346_351)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.15616 4.59014L1.31712 0.0641602C1.24542 0.0224266 1.164 0.000298672 1.08104 0H1.07968C0.996674 0.000329659 0.915216 0.022469 0.843465 0.0641992C0.771208 0.105407 0.711218 0.165101 0.669653 0.237153C0.628087 0.309204 0.606443 0.391019 0.606942 0.474199V9.52607C0.606614 9.60931 0.628283 9.69115 0.669757 9.76332C0.711231 9.83548 0.771035 9.89541 0.843117 9.93703C0.915198 9.97864 0.996997 10.0005 1.08023 10.0003C1.16346 10.0002 1.24518 9.97801 1.3171 9.93611L9.15616 5.41012C9.22813 5.36857 9.2879 5.30881 9.32946 5.23684C9.37101 5.16487 9.39289 5.08323 9.39289 5.00013C9.39289 4.91702 9.37101 4.83538 9.32946 4.76341C9.2879 4.69145 9.22813 4.63168 9.15616 4.59014Z"
                                                        fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_346_351">
                                                        <rect width="10" height="10" fill="currentColor" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </article>
                    </div>
                @endif
            </div>
        </div>
            </div>
        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Section -->

    <!-- Start footer -->
    {{-- <x-footer/> --}}
    <!-- End footer -->

    <!-- Script -->
    <x-script />
    <style>

        /* heropage search */


                .st_select {
                    width: 100%;
                    max-width: 300px;
                    padding: 10px;
                    font-size: 16px;
                    color: white;
                    background-color: #007bff;
                    border: 2px solid #0056b3;
                    border-radius: 5px;
                    appearance: none;
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    cursor: pointer;
                    position: relative;
                }


                .dropdown-container {
                    position: relative;
                    display: inline-block;
                    width: 100%;
                    max-width: 300px;
                }

                .dropdown-container::after {
                    content: "\25BC";
                    font-size: 14px;
                    color: white;
                    position: absolute;
                    right: 15px;
                    top: 50%;
                    transform: translateY(-50%);
                    pointer-events: none;
                }


                .st_select:hover {
                    background-color: #0056b3;
                }


                .st_select option {
                    color: black;
                    background: white;
                }

                /* Responsive Styles */
    @media (max-width: 768px) { /* Tablets */
        .st_select {
            font-size: 14px;
            padding: 8px;
        }
        .dropdown-icon {
            font-size: 20px;
            right: 10px;
        }
    }

    @media (max-width: 480px) { /* Mobile devices */
        .st_select {
            font-size: 13px;
            padding: 7px;
        }
        .dropdown-icon {
            font-size: 18px;
            right: 8px;
        }
    }





        /* heropage search */
        .cs_card_thumb.destination-image img {
            max-width: 400px;
            min-width: 400px;
            min-height: 400px;
            max-height: 400px;
            object-fit: cover;
        }
        .tour-button, a.tour-button {
    color: white;
    overflow: hidden;
    text-align: center;
    /* padding: 11px 36px;
    max-width: 300px;
    min-width: 212px;
    border-radius: 30px;
    position: relative; */
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    /* display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center; */

}
.content-black{
    color:black;
}

        .cs_grid.detsination-page {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }
        .testimonial-page{
            display: flex;
        }
        .testimonial{
            overflow: hidden;
        }
        .tour_packages{
            overflow: hidden;
        }
        .destination-package{
            overflow: hidden;
        }
        .tour-packages-images {
    max-width: 347px;
    margin: 20px;
    object-fit: cover;
}
@media(max-width:767px){
    .tour-packages-images {
    max-width: 100% !important;
    /* min-width: 360px !important; */
    margin: 3px !important;
    object-fit: cover;
}
.common-one{
    display: flex;
    flex-wrap: wrap;
}
}
.common-one {
    display: flex;
    flex-wrap: wrap;
}
.cs_brand_list {
    margin-left: 76px;
    /* display: block; */
    /* margin: auto; */
}
    </style>
    {{-- </body> --}}
@endsection
{{-- </html> --}}
