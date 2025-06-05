@extends('layout.layout')
@section('title', 'About Book365days')

@section('content')

    <!-- Start Hero Section -->
    <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='About us' />
    <!-- End Hero Section -->

    <!-- Start About Section -->
    <section class="cs_about cs_style_1">
      <div class="cs_height_140 cs_height_lg_80"></div>
      <div class="container">
        <div class="row align-items-center cs_gap_y_40 cs_mobile_reverse">
          <div class="col-lg-6">
            <div class="cs_section_heading cs_style_1">
              <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">About Us</h3>
              <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" >{!! $aboutus_content_title ?? 'We are Professional Planners For your' !!}</h2>
            </div>
            <div class="cs_about_text">
              <p data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $aboutus_content ??
                'We specialize in furnishing exceptional trip gests acclimatized to your unique
                requirements. Our platform of professional itineraries is devoted to making your trip as smooth,
                instigative, and stress-free as possible. Whether you are planning a weekend flight, a family
                holiday' !!}</p>
              <p class="mb-0 cs_accent_color cs_medium cs_fs_18"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Speak to our Destination Experts at Direct Call <a href="tel:+91{!! $Contact_number ?? '+1 546 378 654' !!}">+91{!! $Contact_number ?? '+1 546 378 654' !!}</a> </p>
            </div>
            <ul class="cs_list cs_style_1 cs_mp0 cs_fs_18">
              {{-- <li data-aos="fade-up">
                <i class="fa-solid fa-circle-check cs_accent_color"></i> --}}
              {!! $aboutus_content_points ?? '
              <li data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <i class="fa-solid fa-circle-check cs_accent_color"></i>
                All packages and activiates are carefully picked by us.
              </li>
              <li data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <i class="fa-solid fa-circle-check cs_accent_color"></i>
                98% Course Completitation Rates
              </li>
              <li data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <i class="fa-solid fa-circle-check cs_accent_color"></i>
                We are an award winning agency
              </li>
              <li data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <i class="fa-solid fa-circle-check cs_accent_color"></i>
                Trusted by more than 80,000 customers
              </li>'
              !!}
              {{-- </li> --}}
            </ul>
            {{-- <a href="" class="cs_btn cs_style_1 cs_fs_18 cs_medium">
              Read More
              <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z" fill="currentColor"/>
                <path d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z" fill="currentColor"/>
              </svg>
            </a> --}}
          </div>
          <div class="col-lg-5 offset-lg-1"><img src="{!! $home_about_image ?? 'assets/images/about_img.png' !!}" alt=""></div>
        </div>
      </div>
      <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End About Section -->

    <!-- Start Banner Section -->
     {{-- <section class="cs_banner cs_style_2 cs_bg_filed cs_primary_bg" data-src="assets/images/banner_bg_3.jpeg">
      <div class="cs_height_115 cs_height_lg_80"></div>
      <div class="container">
        <div class="row align-items-center cs_gap_y_40">
          <div class="col-lg-6">
            <div class="cs_banner_thumb">
              <img src="assets/images/offer_text.png" alt="Offer Text">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="cs_banner_text cs_white_color">
              <h2 class="cs_banner_title cs_white_color cs_fs_50"data-aos="fade-up">Last  TravelPro Offer</h2>
              <h3 class="cs_banner_title_mini cs_fs_20 cs_medium cs_white_color"data-aos="fade-up">Aerial view of Cape Town with Cape Town Stadium</h3>
              <p class="cs_banner_subtitle"data-aos="fade-up">Grab the Last Travelport Offer today! Exclusive offers on flights, luxury hotels, and vacation
packages are yours to enjoy. Don't miss your last chance to save on big deals for your dream
vacation. Act now while this offer lasts, and book your wonderful adventure with unbeatable
savings!</p>
              <a href="#" class="cs_btn cs_style_1 cs_fs_18 cs_medium"data-aos="fade-up">
                Read More
                <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z" fill="currentColor"/>
                  <path d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z" fill="currentColor"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="cs_height_120 cs_height_lg_80"></div>
     </section> --}}
    <!-- End Banner Section -->

    <!-- Start Why Choose Us Section -->
    <section>
      {{-- <div class="cs_height_135 cs_height_lg_75"></div> --}}
      <div class="container">
        <div class="cs_section_heading cs_style_1 text-center">
          <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Why Choose Us</h3>
          <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Get The Best Travel Experience</h2>
        </div>
        <div class="cs_height_55 cs_height_lg_40"></div>
        <div class="cs_iconbox_4_wrap">
          <div>
            @if (isset($choose_us) && count($choose_us) > 0)
            @foreach ($choose_us as $index => $item)
            @if ($index % 2 == 0)
            <div class="row cs_gap_y_45 pb-4">
              <div class="col-lg-12 col-6">
                <div class="cs_iconbox cs_style_4">
                  <div class="cs_iconbox_icon cs_center">
                    <img src="{!! asset($item->image) !!}" alt="Calendar Icon">
                  </div>
                  <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $item->heading_top !!}</h2>
                  <p class="cs_iconbox_subtitle mb-0 text-justify"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $item->heading_middle !!}</p>
                </div>
              </div>
            </div>
              @endif
              @endforeach

          </div>
          <div>
            <div class="cs_iconbox_4_thumb cs_center">
              <img src="{!! $why_choose_us_image ?? 'assets/images/about_4.png' !!}" alt="About Thumb">
            </div>
          </div>
          <div>
            <div class="row cs_gap_y_45">
              @foreach ($choose_us as $index => $item)
              @if ($index % 2 != 0)
              <div class="col-lg-12 col-6">
                <div class="cs_iconbox cs_style_4">
                  <div class="cs_iconbox_icon cs_center">
                    <img src="{!! asset($item->image) !!}" alt="Calendar Icon">
                  </div>
                  <h2 class="cs_iconbox_title cs_fs_24 cs_semibold"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $item->heading_top !!}</h2>
                  <p class="cs_iconbox_subtitle mb-0"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $item->heading_middle !!}</p>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          @endif
        </div>
      </div>
      <div class="cs_height_135 cs_height_lg_75"></div>
    </section>
    <!-- End Why Choose Us Section -->

    <!-- Start Team Section -->
     {{-- <section class="cs_accent_bg_1">
      <div class="cs_height_135 cs_height_lg_75"></div>
      <div class="container">
        <div class="cs_section_heading cs_style_1 text-center">
          <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Travel Agents</h3>
          <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Our Experts Team Member</h2>
        </div>
        <div class="cs_height_55 cs_height_lg_40"></div>
        <div class="row cs_gap_y_24">
          <div class="swiper team">
            <div class="swiper-wrapper">
          @if (isset($team) && count($team) > 0)
          @foreach ($team as $item)
          <div class="col-lg-4 swiper-slide">
            <div class="cs_team cs_style_1 position-relative">
              <div class="cs_team_thumb cs_zoom overflow-hidden"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <img src="{{ asset($item->image) }}" alt="Team Thumb" class="cs_zoom_in">
              </div>
              <div class="cs_team_info text-center position-absolute">
                <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $item->heading_top !!}</h2>
               <p class="cs_team_subtitle cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $item->heading_middle !!}</p>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="col-lg-4">
            <div class="cs_team cs_style_1 position-relative">
              <div class="cs_team_thumb cs_zoom overflow-hidden"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <img src="assets/images/team_1.jpeg" alt="Team Thumb" class="cs_zoom_in">
              </div>
              <div class="cs_team_info text-center position-absolute">
                <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">David Cooper</h2>
               <p class="cs_team_subtitle cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">CO FOUNDER</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cs_team cs_style_1 position-relative">
              <div class="cs_team_thumb cs_zoom overflow-hidden"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <img src="assets/images/team_2.jpeg" alt="Team Thumb" class="cs_zoom_in">
              </div>
              <div class="cs_team_info text-center position-absolute">
                <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">David Cooper</h2>
               <p class="cs_team_subtitle cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">CO FOUNDER</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cs_team cs_style_1 position-relative">
              <div class="cs_team_thumb cs_zoom overflow-hidden"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <img src="assets/images/team_3.jpeg" alt="Team Thumb" class="cs_zoom_in">
              </div>
              <div class="cs_team_info text-center position-absolute">
                <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">David Cooper</h2>
               <p class="cs_team_subtitle cs_white_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">CO FOUNDER</p>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
        </div>
      </div>
      <div class="cs_height_140 cs_height_lg_80"></div>
     </section> --}}

      <style>
      /* Original styles */
      @keyframes float {
        0% {
          transform: translateY(0px);
        }
        50% {
          transform: translateY(-10px);
        }
        100% {
          transform: translateY(0px);
        }
      }

      .feature-card-12 {
        transition: all 0.3s ease;
        transform-style: preserve-3d;
        backface-visibility: hidden;
      }

      .feature-card-12:hover {
        transform: scale(1.05) translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      }

      .feature-icon-12 {
        font-size: 4rem;
        display: block;
        margin-bottom: 1rem;
        animation: float 3s ease-in-out infinite;
      }

      .card-hover-12 {
        background: linear-gradient(145deg, #fdfcfc, #c5c0c0);
        border: none;
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }

      .card-hover-12::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(to right, #3494e6, #ec6ead);
        transition: all 0.3s ease;
      }

      .card-hover-12:hover::before {
        height: 100%;
      }

      .card-body-12 {
        position: relative;
        z-index: 1;
        padding: 20px;
        text-align: center;
      }

      .swiper-slide {
        display: flex;
        /* height: auto; */
      }

      .swiper {
        padding: 30px 0;
        height: 400px;
      }
      .card-hover-12 {
  height: 300px; /* Adjust as needed */
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.swiper-slide {
  height: 320px; /* your preferred fixed height */
}


    </style>

   <section style="padding-top: 10px">
      <div class="container">
        <div class="cs_section_heading cs_style_1 text-center">
          <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">
            WHY TRAVEL WITH FLYTRP
          </h3>
          <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0">
            Our USP
          </h2>
        </div>

        <!-- Swiper Container -->
        <!-- Swiper Container -->
<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    @foreach($usp as $item)
      <div class="swiper-slide">
        <div class="card card-hover-12 feature-card-12 h-15 w-100">
          <div class="card-body-12">
           <div class="feature-icon-12 text-center d-flex justify-content-center align-items-center" style="height: 60px;">
    @if(isset($item->image))
        <img src="{{ asset($item->image) }}" alt="USP Image" style="max-height: 80px; object-fit: contain;">
    @else
        <span style="font-size: 30px;">🌍</span>
    @endif
</div>
            <h3 class="card-title-12 mb-3">{{ $item->heading_top ?? 'No Title' }}</h3>
            <p class="card-text-12 text-muted">
              {{ $item->heading_middle ?? 'No description available.' }}
            </p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

      </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Init -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 3,
          },
        },
      });
    </script>
    <!-- End Team Section -->

    <!-- Start Video Section -->
    <section>
      <div class="cs_height_140 cs_height_lg_80"></div>
      <div class="container">
        <div class="cs_video_block cs_style_1 cs_bg_filed position-relative" data-src="assets/images/video_block.jpeg">
          <a href="https://www.youtube.com/embed/eSUmkFPln_U" class="cs_player_btn cs_center cs_accent_bg cs_video_open">
            <svg width="40" height="47" viewBox="0 0 40 47" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M36.9921 17.8114L9.63992 0.951019C7.66105 -0.267256 5.26855 -0.317908 3.23984 0.815524C1.21113 1.94878 0 4.01294 0 6.3367V39.9039C0 43.4175 2.83109 46.2914 6.31071 46.3104C6.32021 46.3104 6.32971 46.3105 6.33902 46.3105C7.42642 46.3104 8.55958 45.9696 9.61794 45.3238C10.4693 44.8043 10.7384 43.693 10.219 42.8417C9.69952 41.9902 8.58807 41.7212 7.73693 42.2407C7.2419 42.5426 6.75844 42.6988 6.33016 42.6987C5.01727 42.6916 3.61159 41.5669 3.61159 39.904V6.33679C3.61159 5.33994 4.13113 4.4547 5.00127 3.96853C5.87149 3.48236 6.89764 3.50407 7.74543 4.02606L35.0977 20.8864C35.9198 21.3926 36.3902 22.2366 36.3882 23.2021C36.3862 24.1674 35.9124 25.0095 35.0857 25.514L15.31 37.6224C14.4594 38.1432 14.192 39.2549 14.7128 40.1054C15.2335 40.956 16.3453 41.2234 17.1959 40.7026L36.9693 28.5956C38.8625 27.4407 39.9955 25.4272 40 23.2093C40.0045 20.9916 38.8797 18.9735 36.9921 17.8114Z" fill="currentColor" />
            </svg>
          </a>
          <h2 class="cs_video_title cs_fs_60 cs_semibold cs_white_color position-absolute mb-0">Our Journey <br> in Videos</h2>
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
          <div class="cs_brand_list cs_style">
              <div class="swiper partners">
                  <div class="swiper-wrapper">

                  @if (isset($partners) && count($partners) > 0)
                      @foreach ($partners as $item)
                    <div class="swiper-slide">
                      <div class="cs_brand">
                          <img src="{{ asset($item->image) }}" alt="Brand">
                      </div>
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
     <style>
      .cs_iconbox p{
        text-align:justify;
      }
      .partners{
        overflow: hidden;
      }
      .col-6 {
    flex: 0 0 auto;
    width: 100%;
}
     </style>
  @endsection
