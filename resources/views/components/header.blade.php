@php
    // Retrieve the element with 'Address' from the website_elements table
    $logoElement = App\Models\WebSiteElements::where('element', 'Logo')->first();
    // $emailElement = App\Models\WebSiteElements::where('element', 'Email')->first();
    $phoneElement = App\Models\WebSiteElements::where('element', 'Contact_number')->first();
@endphp

<header class="cs_site_header cs_style_1 cs_fs_18 cs_sticky_header">
      <div class="cs_main_header">
        <div class="cs_main_header_in">
          <div class="cs_main_header_left">
            <a class="cs_site_branding" href="{{ route('index') }}">
                @php
                    // Query the database directly in Blade to fetch the Logo element
                    $logoElement = \App\Models\WebsiteElements::where('element', 'Logo')->first();
                    $logoPath = $logoElement && $logoElement->element_details ? $logoElement->element_details : 'assets/images/default-logo.png';
                @endphp

                {{-- <img   src="{{ asset($logoPath) }}" alt="Logo"> --}}
                <img class="logo-header-main" src="{{ asset($logoPath) }}" alt="Logo"
                {{-- style="height: 90px; width: auto;" --}}
                onerror="this.onerror=null; this.src='{{ asset('assets/images/flytrp_logo_main.jpg') }}';">

            </a>
        </div>

          <div class="cs_main_header_center">
            <div class="cs_nav cs_medium cs_primary_font">
              <ul class="cs_nav_list">
                <li><a href="{{ route('index') }}">Home</a></li>
                {{-- <li class="menu-item-has-children">
                  <a href="{{ route('index') }}">Home</a>
                  <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('index2') }}">Home v2</a></li>
                    <li><a href="{{ route('index3') }}">Home v3</a></li>
                  </ul>
                </li> --}}
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li>
                  <a href="{{ route('destination') }}">Destinations</a>
                  {{-- <ul>
                    <li><a href="{{ route('destination') }}">Destination</a></li>
                    <li><a href="{{ route('destinationdetails') }}">Destination Details</a></li>
                  </ul> --}}
                </li>
                <li>
                  <a href="{{ route('tour') }}">Packages</a>
                  {{-- <ul>
                    <li><a href="{{ route('tour') }}">Tour</a></li> --}}
                    {{-- <li><a href="{{ route('tourdetails') }}">Tour Details</a></li> --}}
                  {{-- </ul> --}}
                </li>
                <li><a href="{{ route('hotels') }}">Hotels</a></li>
                <li><a href="{{ route('destinations') }}">Services</a></li>
                <!-- <li>
                  <a href="{{ route('blog') }}">Blogs</a>

                </li> -->
                <li><a href="{{ route('galleryPages') }}">Gallery</a></li>
                <li><a href="{{ route(name: 'contact') }}">Contact Us</a></li>
                <!-- <li><a href="{{ route(name: 'contact') }}">Terms and Conditions</a></li> -->
                <!-- <li><a href="{{ route(name: 'contact') }}">Conditions and Refund Policy</a></li> -->
              </ul>
            </div>
          </div>
          <div class="cs_main_header_right">
            <div class="cs_header_toolbox">
                <li>
                    <a href="tel:+91{!! $phoneElement ? $phoneElement->element_details : '9711433495' !!}" style="display: flex; flex-direction: column-reverse; align-items: center; ">
                        <span class="icon icon-envelope"></span>
                        <span class="text" style="display: inline-flex;  ">
                          <i class="fas fa-phone" style="margin-right: 8px; font-size: 18px; vertical-align: middle; margin-top: 5px;"></i>
                            <span class="country-code" >+91 -</span>
                            <span class="mobile-number">{!! $phoneElement ? $phoneElement->element_details : '9876543210' !!}</span>

                        </span>
                        <span class="talk-to-expert" style="font-size: 17px; color: white; margin-top: 20px; font-family: 'Playfair Display', serif;">Talk to Expert</span>
                    </a>

                </li>

            </div>
        </div>

        </div>
      </div>
    </header>
    <style>
      .cs_main_header_left {

          max-width: 285px;
      }

      .logo-header-main {
    height: 90px;
    width: auto;
}


@media screen and (max-width: 768px) {
    .logo-header-main {
        height: 70px;
        border-radius: 5px;
    }
}


@media screen and (max-width: 480px) {
    .logo-header-main {
        height: 70px;
        border-radius: 5px;
    }
}


@media screen and (max-width: 360px) {
    .logo-header-main {
        height: 70px;
        border-radius: 5px;
    }
}

      @media screen and (max-width:768px){
        .cs_main_header_left img{
          max-width: 190px !important;
        min-width: 185px;
        border-radius: 5px;

  }
      }
      @media (min-width: 820px) and (max-width: 1180px){
        .cs_main_header_left img{
          max-width: 190px !important;
        min-width: 190px;
    }
  }

      @media screen and (min-width: 1200px) {
    .cs_site_header.cs_style_1 .cs_main_header_left {
      width: 275px;
      height: 100px;
      overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 0px;
        border-right: 1px solid rgba(255, 255, 255, 0.25);
        background: white;
    }
}
@media screen and (min-width: 1200px) {
    .cs_site_header.cs_style_1 .cs_main_header_left {
        height: 100%;
        width: 200px !important;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 0px;
        border-right: 1px solid rgba(255, 255, 255, 0.25);
        background: white;
    }
}
    </style>
