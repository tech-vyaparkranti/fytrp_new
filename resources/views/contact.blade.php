@extends('layout.layout')
@section('title', 'Contact us')
@section('content')

      <!-- Start Hero Section -->
      <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='Contact Us' />
      <!-- End Hero Section -->


       <!-- Start Contact Section -->
       <section>
        <div class="cs_height_140 cs_height_lg_80"></div>
        <div class="container">
          <div class="row cs_gap_y_40">
            <div class="col-lg-3 col-md-6">
              <div class="cs_iconbox cs_style_5 cs_gray_bg cs_radius_5 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="cs_iconbox_icon cs_accent_bg cs_white_color cs_center cs_radius_5"><i class="fa-solid fa-location-dot"></i></div>
                <h2 class="cs_iconbox_title cs_fs_24 cs_semibold" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"> Address</h2>
                <div class="cs_iconbox_subtitle mb-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{!! $Address ?? 'Plot No-1/20, Ashok Nagar, New Delhi - 110018' !!}<br></div>

                <!-- <b>Global Presence:</b> Amsterdam, Manchester, Rome-->
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="cs_iconbox cs_style_5 cs_gray_bg cs_radius_5 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="cs_iconbox_icon cs_accent_bg cs_white_color cs_center cs_radius_5"><i class="fa-solid fa-phone"></i></div>
                <h2 class="cs_iconbox_title cs_fs_24 cs_semibold" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Phone Call</h2><br>
                <div class="cs_iconbox_subtitle mb-0"
                data-aos="fade-up"
                data-aos-duration="1500"
                data-aos-offset="50"
                style="display: flex; justify-content: center; align-items: center; gap: 5px; white-space: nowrap; ">
                <a href="tel:+91{!! $Contact_number ?? '9711433495' !!}"
                    style="display: flex; text-decoration: none; color: inherit; gap: 5px; padding: 11px ">
                    <span>+91</span>
                    <span>{!! $Contact_number ?? '9711433495' !!}</span>
                </a>
            </div>



              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="cs_iconbox cs_style_5 cs_gray_bg cs_radius_5 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="cs_iconbox_icon cs_accent_bg cs_white_color cs_center cs_radius_5"><i class="fa-solid fa-envelope"></i></div>
                <h2 class="cs_iconbox_title cs_fs_24 cs_semibold" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">E-Mail Us</h2><br>
                <div class="cs_iconbox_subtitle mb-0"
                    style="font-size: 18px; padding: 11px; display: block;"
                    data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <a href="mailto:{!! $Email ?? 'dumy@gmail.com' !!}"
                    style="">
                    {!! $Email ?? 'dumy@gmail.com' !!}
                </a>
                </div>

              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="cs_iconbox cs_style_5 cs_gray_bg cs_radius_5 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="cs_iconbox_icon cs_accent_bg cs_white_color cs_center cs_radius_5"><i class="fa-solid fa-headset"></i></div>
                <h2 class="cs_iconbox_title cs_fs_24 cs_semibold" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Supports</h2>
                <div class="cs_iconbox_subtitle mb-0"  data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"  style="font-size: 18px; padding: 19px; display: block;">{!! $contact_page_support_content ?? '24/7 any time support team <br> ready for supports.' !!}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
      </section>
      <!-- End Contact Section -->


      <!-- Start Contact Form Section -->
      <section class="cs_gray_bg">
        <div class="cs_height_135 cs_height_lg_75"></div>
        <div class="container">
          <div class="cs_section_heading cs_style_1 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
            <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">CONTACT US</h3>
            <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Contact Information</h2>
          </div>
          <div class="cs_height_55 cs_height_lg_40"></div>
          {{-- <form class="cs_contact_form row cs_gap_y_24" method="post" id="contactUsForm" action="javascript:">
            @csrf
            <div class="col-lg-6">
              <div class="cs_input_field" data-aos="fade-up">
                <input type="text" placeholder="Enter Your Name" class="cs_form_field cs_radius_5" id="name" name="name">
                <span><i class="fa-regular fa-user"></i></span>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="cs_input_field" data-aos="fade-up">
                <input class="cs_form_field cs_radius_5 cs_white_bg" type="email" id="email" name="email"  placeholder="Enter Your E-Mail">
                <span><i class="fa-regular fa-envelope"></i></span>
              </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up">
              <input class="cs_form_field cs_radius_5 cs_white_bg" type="text" id="phone_number" name="phone_number" placeholder="Enter Your Contact no.">
            </div>
            <div class="col-lg-6" data-aos="fade-up">
              <input class="cs_form_field cs_radius_5 cs_white_bg" type="text" id="subject"  name="subject" placeholder="Please enter a subject">
            </div>
            <div class="col-lg-12" data-aos="fade-up">
              <textarea rows="5" class="cs_form_field cs_radius_5 cs_white_bg" id="message" name="message" placeholder="Write Message..."></textarea>
            </div>
            <div class="col-lg-12 text-center" data-aos="fade-up">
              <button type="submit" id="submitContactUs" class="cs_btn cs_style_1 cs_fs_18 cs_medium cs_radius_4"><i class="fa-regular fa-envelope"></i> Send Message</button>
            </div>
          </form> --}}
          <form class="cs_contact_form row cs_gap_y_24" method="post" id="contactUsForm" action="{{ route('saveContactUsDetails') }}">
            @csrf
            <div class="col-lg-6">
                <div class="cs_input_field" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <input type="text" placeholder="Enter Your Name" class="cs_form_field cs_radius_5" id="name" name="name" required>
                    <span><i class="fa-regular fa-user"></i></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cs_input_field" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                    <input class="cs_form_field cs_radius_5 cs_white_bg" type="email" id="email" name="email" placeholder="Enter Your E-Mail" required>
                    <span><i class="fa-regular fa-envelope"></i></span>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <input class="cs_form_field cs_radius_5 cs_white_bg" type="text" id="phone_number" name="phone_number" placeholder="Enter Your Contact No.">
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <input class="cs_form_field cs_radius_5 cs_white_bg" type="text" id="subject" name="subject" placeholder="Please Enter a Subject" required>
            </div>
            <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <textarea rows="5" class="cs_form_field cs_radius_5 cs_white_bg" id="message" name="message" placeholder="Write Message..." required></textarea>
            </div>
            {{-- <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <button type="submit" id="submitContactUs" class="cs_btn cs_style_1 cs_fs_18 cs_medium cs_radius_4">
                    <i class="fa-regular fa-envelope"></i> Send Message
                </button>
            </div> --}}
            <div class="col-lg-12 text-center" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">

                    <!-- Google reCAPTCHA -->
                    {{-- <div class="captcha-container">
                        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                    </div> --}}

                    <div class="main-one">
                        <div class="main-two">
                            <div class="col-md-12 col-sm-12 mb-3">
                                {{-- <label class="form-label" for="captcha"></label> --}}
                                {{-- <span class="text-danger"></span> --}}
                                <input class="form-control" type="text" id="captcha" label="Captcha" name="captcha" required="required" placeholder="Captcha">
                            </div>
                        </div>

                        <!-- Captcha and Button container -->
                        <div class="captcha-container">
                            <div class="captcha-left">
                                <div class="captcha-image">
                                    <img src="{{ captcha_src() }}" class="img-thumbnail" id="captcha_img_id">
                                </div>
                            </div>

                            <div class="captcha-right">
                                <button type="button" class="btn default-btns font-weight-bold" onclick="refreshCapthca('captcha_img_id','captcha')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Send Message Button -->
                    <button type="submit" id="submitContactUs" class="cs_btn cs_style_1 cs_fs_18 cs_medium cs_radius_4">
                        <i class="fa-regular fa-envelope"></i> Send Message
                    </button>

                </div>
            </div>

            <!-- Include Google reCAPTCHA script -->
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>

            <!-- Custom CSS -->
            <style>
                .captcha-container {
                    display: flex;
                    align-items: center;
                    height: 50px;
                    transform: scale(0.85);
                    transform-origin: left center;
                }

                /* Media Queries for responsiveness */
                @media (max-width: 768px) {
                    .d-flex {
                        flex-direction: column;
                        gap: 10px;
                    }
                    .captcha-container {
                        transform: scale(1);
                        justify-content: center;
                    }
                }

                @media (max-width: 480px) {
                    .captcha-container {
                        display: flex;
                        gap:0px;
                  flex-wrap: wrap;
                        transform: scale(0.9);
                    }
                    #submitContactUs {
                        width: 100%;
                    }
                }
            </style>

            <div id="successMessage" class="alert alert-success" style="display: none;"></div>

<!-- Error message -->
<div id="errorMessage" class="alert alert-danger" style="display: none;"></div>
        </form>
        </div>
        <div class="cs_height_100 cs_height_lg_60" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"></div>
      </section>
      <!-- End Contact Form Section -->

      <!-- Start Location Section -->
      <div class="cs_google_map ">
        <iframe src="{{ $Map_Link ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.785370643284!2d77.09463497550091!3d28.636194075662775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d049f49e018c7%3A0xfb15ba588da4b7c4!2s1%2C%20Ashok%20Nagar%2C%20New%20Delhi%2C%20Delhi%2C%20110045!5e0!3m2!1sen!2sin!4v1737020397990!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade' }}"></iframe>
      </div>
      <!-- End Location Section -->

  @endsection
@section('script')


<script>
   $("#contactUsForm").on("submit", function (e) {
    e.preventDefault(); // Prevent default form submission
    var form = new FormData(this);

    $("#submitContactUs").attr("disabled", true); // Disable the button during submission

    $.ajax({
        type: 'post',
        url: '{{ route('saveContactUsDetails') }}',
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            $("#submitContactUs").attr("disabled", false); // Re-enable the button
            if (response.status) {
                // Show success message
                $('#successMessage').text(response.message).show(); // Display success message
                $('#errorMessage').hide(); // Hide error message if any

                // Reset the form after successful submission
                $("#contactUsForm")[0].reset();
            } else {
                // Show error message
                $('#errorMessage').text(response.message ?? "Something went wrong.").show();
                $('#successMessage').hide(); // Hide success message if any
            }
        },
        error: function(response) {
            $("#submitContactUs").attr("disabled", false); // Re-enable the button
            // Show error message if request fails
            $('#errorMessage').text("An error occurred. Please try again later.").show();
            $('#successMessage').hide(); // Hide success message if any
        }
    });
});


</script>


{{-- <script>
  $("#contactUsForm").on("submit", function (e) {
      e.preventDefault(); // Prevent the default form submission
      var form = new FormData(this);

      $("#submitContactUs").attr("disabled", true); // Disable the button during submission

      $.ajax({
          type: 'POST',
          url: '{{ route('saveContactUsDetails') }}',
          data: form,
          cache: false,
          contentType: false,
          processData: false,
          success: function (response) {
              $("#submitContactUs").attr("disabled", false); // Re-enable the button
              if (response.status) {
                  successMessage(response.message, true);
                  $("#contactUsForm")[0].reset(); // Reset the form after successful submission
              } else {
                  errorMessage(response.message ?? "Something went wrong.");
              }
          },
          error: function (response) {
              $("#submitContactUs").attr("disabled", false); // Re-enable the button
              errorMessage("An error occurred. Please try again later.");
          }
      });
  });
</script> --}}
@endsection


{{-- box style update 13/02/25 --}}
{{-- <style>


.cs_iconbox {
    min-height: 180px; /* Ensure equal height */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
}
.cs_iconbox_title {
    margin-bottom: 10px;
}



    .cs_iconbox_subtitle {
        text-align: center;
        white-space: nowrap;
    }

    /* Responsive Media Queries */
    @media (max-width: 992px) {
        .cs_iconbox {
            height: auto;
            padding: 15px;
        }

        .cs_iconbox_title {
            margin-top: -10px;
        }
    }

    @media (max-width: 768px) {
        .cs_iconbox {
            height: auto;
            padding: 10px;
        }

        .cs_iconbox_title {
            font-size: 20px;
            margin-top: 0;
        }

        .cs_iconbox_subtitle {
            font-size: 14px;
            white-space: normal;
        }
    }

    @media (max-width: 576px) {
        .cs_iconbox {
            padding: 10px;
        }

        .cs_iconbox_title {
            font-size: 18px;
        }

        .cs_iconbox_subtitle {
            font-size: 12px;
        }
    }



 </style> --}}


<style>

.main-one {
    display: flex;
    /* flex-direction: column; */
    align-items: center;
    justify-content: center;
    /* width: 100%; */
    gap: 10px;
    /* padding: 20px; */
    /* background-color: #f8f9fa; */
    border-radius: 8px;
}


/* .main-two {
    width: 100%;
    max-width: 600px;
} */

/* Input field */
.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ced4da;
    border-radius: 5px;
}


.captcha-container {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    width: 100%;
    margin-top: 10px;
}


.captcha-left {
    display: flex;
    align-items: center;
}


.captcha-right {
    display: flex;
    align-items: center;
}


.captcha-image img {
    width: 150px;
    height: 50px;
    border-radius: 5px;
    border: 1px solid #ccc;
}


.captcha-refresh .btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.captcha-refresh .btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.captcha-refresh .btn:active {
    background-color: #004494;
    transform: scale(0.98);
}

.main-two {
    margin-top: 20px;
    height: 47px;
    width: 100%;
    max-width: 600px;
}


/* #submitContactUs {
    margin-top: 20px;
    width: 100%;
    max-width: 200px;
    align-self: flex-end;
} */

/* Responsive Design */
@media (max-width: 768px) {
    .captcha-container {
        flex-direction: column;
        align-items: center;
    }

    .captcha-left,
    .captcha-right {
        /* width: 100%; */
        text-align: center;
    }
}


</style>
