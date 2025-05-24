@extends('layout.layout')
@section('title', $homedestinations->meta_title)
@section('meta_description', $homedestinations->meta_description)
@section('meta_keywords', $homedestinations->meta_keyword)
@section('content')

    <!-- Start Hero Section -->
    <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='Popular Destination' />
    <!-- End Hero Section -->

    <!-- Start Destination Details Section -->
    <section>
      <div class="cs_height_140 cs_height_lg_80"></div>
      <div class="container">
        <div class="row cs_gap_y_50">
          <div class="col-lg-8">
            <div class="cs_post_details">
              <div class="row destination-detail-image">

                <img src="{{ asset($homedestinations->destination_image) }}" alt="Destination"
                    class="img-fluid fixed-image-size">

                    {{-- <p data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"
                    style="background: var(--gray); height: 508px; padding: 10px; border-radius: 0px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);"> --}}
                    {!! $homedestinations->destination_details !!}
                {{-- </p> --}}

              </div>




            </div>



        </div>

          <aside class="col-lg-4">
            <div class="cs_sidebar cs_style_1 cs_white_bg cs_right_sidebar">
              <div class="cs_info_widget cs_white_bg">
                <div class="cs_booking_widget cs_gray_bg">
                  <h3 class="cs_widget_title cs_fs_24 cs_medium"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Drop Messege For Book</h3>
                  <form id="enquiryForm2" class="cs_booking_form">
                    @csrf
                    <div class="cs_input_field position-relative" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span><i class="fa-solid fa-user"></i></span>
                        <input type="text" placeholder="Your Name*" id="name" name="name" class="cs_form_field cs_radius_5" required>
                    </div>
                    <div class="cs_input_field position-relative" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span><i class="fas fa-phone-alt"></i></span>
                        <input type="tel" placeholder="Enter your phone number*" id="phone_number" name="phone_number" class="cs_form_field cs_radius_5" required>
                    </div>
                    <div class="cs_input_field position-relative" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span><i class="fa-solid fa-comment"></i></span>
                        <textarea rows="5" class=""  id="message" name="message" placeholder="Message"></textarea>
                    </div>
                    <button id="submitButton" type="submit" class="cs_btn cs_style_1 cs_fs_18 cs_medium cs_radius_4" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Send Message</button>
                </form>
                </div>
              </div>
              <div class="widget widget-contact" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="need-one">
                        <h5 class="widget-title">Need Help?</h5>
                        <ul class="list-style-one">
                            <li><i class="far fa-envelope"></i> <a
                                    href="emilto:info@book365days.com"> &nbsp; info@book365days.com</a></li>
                            <li><i class="fas fa-phone-volume"></i> <a href="callto:+91 9711 433 495"> &nbsp;  +91 9711 433 495</a></li>
                        </ul>
                        </div>
                    </div>
            </div>
          </aside>
        </div>
        <section class="destinations-area bgc-black pt-100 pb-70 rel z-1">
          <div class="container-fluid">
              <div class="row justify-content-center">
                  <div class="col-lg-12">
                      <div class="section-title text-white text-center counter-text-wrap mb-70" data-aos="fade-up"
                          data-aos-duration="1500" data-aos-offset="50">
                          <h2 class="popular-destination mt-5" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Our Packages</h2>
                          <p>One site <span class="count-text plus" data-speed="3000" data-stop="34500">0</span> most
                              popular
                              experience you’ll remember</p>
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">

                  <div class="swiper packages mt-4">
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
                                  <div class="col-xxl-3 col-xl-4 col-md-6 swiper-slide">
                                      <a href="{{ route('tourDetailpage', ['slug' => $item->slug]) }}">
                                          <div class="destination-item" data-aos="fade-up" data-aos-duration="1500"
                                              data-aos-offset="50">
                                              <div class="image">
                                                  @if ($displayImage)
                                                      {{-- <figure class="images"> --}}
                                                      <img src="{{ asset('storage/' . $displayImage) }}"
                                                          alt="{{ $item->package_name }}" class="gallery-image">
                                                      {{-- </figure> --}}
                                                  @else
                                                      {{-- <figure class="images"> --}}
                                                      <img src="{{ asset('path/to/default/image.jpg') }}" alt="Default Image">
                                                      {{-- </figure> --}}
                                                  @endif

                                                  {{-- <div class="ratting">{{ $item->package_type }}</div> --}}
                                              </div>
                                              <div class="content tourpackage">
                                                  {{-- <span class="location">
                                                      <i class="fal fa-map-marker-alt"></i> {{ $item->package_country }}
                                                  </span> --}}
                                                  <h5 class="card-heading">
                                                      {!! $item->package_name !!}
                                                  </h5>
                                                  <span class="time">
                                                      {!! $item->package_duration_days !!} Days / {!! $item->package_duration_nights !!} Nights
                                                  </span>
                                              </div>
                                              <div class="destination-footer price">
                                                  <span class="offer-price">
                                                      <i class="fa-solid fa-indian-rupee-sign"></i>
                                                      {!! ($item->package_offer_price) !!}
                                                  </span>
                                                  <span class="sale-price">
                                                      <i class="fa-solid fa-indian-rupee-sign"></i>
                                                      {!! ($item->package_price) !!}
                                                  </span>
                                                  <span class="offer-amount">
                                                      Save <i class="fa-solid fa-indian-rupee-sign"></i>
                                                      {{ ($item->package_price - $item->package_offer_price) }}
                                                  </span>

                                              </div>
                                          </div>
                                      </a>
                                  </div>
                              @endforeach
                          @else
                          <span>No Similar Packages found.</span>

                      @endif
                      </div>
                  </div>
              </div>
          </div>
      </section>
      </div>
      <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End Destination Details Section -->
   <style>
    .destination-detail-image img {
    max-height: 400px;
    min-height: 400px;
    object-fit: cover;
}
span.sale-price, .tours-block-one .inner-box .lower-content h5 span.offer-amount {
    font-size: 12px;
    margin-left: 5px;
    font-weight: 700;
    text-decoration: line-through;
}
.destination-item {
    color: var(--accent);
    margin-bottom: 30px;
    background: #232C26;
    border-radius: 10px;
    box-shadow: aliceblue;
    /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); */
    box-shadow: 0px 1px 5px #2a502a;
    /* border: 1px solid rgba(255, 255, 255, 0.1); */
}.destination-item .image {
    /* margin: 10px; */
    overflow: hidden;
    position: relative;
    border-radius: 7px 7px 0px 0px;
}.destination-item .image img {
    width: 100%;
    max-height: 228px;
    min-height: 228px;
    object-fit: cover;
    -webkit-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
}
.content.tourpackage {
    border-radius: 0px;
}
.destination-item .content {
    padding: 19px 0px 20px;
    background-color: #4dcbce;
    border-radius: 0px 0px 0px 0px;
}
@media only screen and (max-width: 1599px) {
    .destination-item .content {
        padding-left: 22px;
        padding-right: 22px;
    }
    .destination-item .destination-footer {
    padding-left: 22px;
    padding-right: 22px;
}
}
.price {
    color: white;
}
span.time {
    color: white;
}
.destination-item .destination-footer {
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding: 20px 40px 15px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    background-color: #4dcbce;
    border-radius: 0 0 7px 7px;
}
@media only screen and (min-width: 1200px) {
    .tour-sidebar .widget:not(.widget-cta) {
        padding-left: 40px;
        padding-right: 40px;
    }
}
.widget.widget-contact.aos-init.aos-animate {
    padding: 53px;
    background-color: var(--gray);
}
.need-one{
    background-color: white;
    padding: 20px;
}
   </style>

  @endsection
  @section('pageScript')
    <script type="text/javascript"></script>
@endsection
  @section('script')
    <script>
        // Attach submit event handler to the form
        $("#enquiryForm2").on("submit", function(e) {
            e.preventDefault(); // Prevent default form submission

            // Create FormData object
            var form = new FormData(this);

            // Disable the submit button to prevent multiple submissions
            $("#submitButton").attr("disabled", true);

            // Send AJAX POST request
            $.ajax({
                type: 'post',
                url: '{{ route('saveEnquiryFormData') }}', // Backend route for saving contact details
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        // Display success message
                        successMessage(response.message, true);

                        // Reset the form after successful submission
                        $("#enquiryForm2")[0].reset();

                        // Re-enable the submit button
                        $("#submitButton").attr("disabled", false);
                    } else {
                        // Display error message
                        errorMessage(response.message ?? "Something went wrong.");
                        $("#submitButton").attr("disabled", false);
                    }
                },
                failure: function(response) {
                    // Handle failure response
                    errorMessage(response.message ?? "Something went wrong.");
                    $("#submitButton").attr("disabled", false);
                },
                error: function(response) {
                    // Handle error response
                    errorMessage(response.message ?? "Something went wrong.");
                    $("#submitButton").attr("disabled", false);
                }
            });
        });


    </script>
@endsection
