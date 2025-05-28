
@php
    // Retrieve the element with 'Address' from the website_elements table
    $addressElement = App\Models\WebSiteElements::where('element', 'Address')->first();
    $emailElement = App\Models\WebSiteElements::where('element', 'Email')->first();
    $phoneElement = App\Models\WebSiteElements::where('element', 'Contact_number')->first();
    $Global_PresenceElement = App\Models\WebSiteElements::where('element', 'Global_Presence')->first();
    $fb_link = App\Models\WebSiteElements::where('element', 'fb_link')->first();
    $twitter_link = App\Models\WebSiteElements::where('element', 'twitter_link')->first();

    $insta_link = App\Models\WebSiteElements::where('element', 'insta_link')->first();

    $linkedin_link = App\Models\WebSiteElements::where('element', 'linkedin_link')->first();

    $pintrest_link = App\Models\WebSiteElements::where('element', 'pintrest_link')->first();
    $email = App\Models\WebSiteElements::where('element', 'Email')->first();



@endphp
<footer class="cs_footer cs_style_1 cs_white_color cs_bg_filed cs_primary_bg" data-src="{{ asset('assets/images/footer_bg.jpeg') }}">
      <div class="cs_newsletter_1_wrap">

        <div class="container-fluid">
          <div class="cs_newsletter cs_style_1 cs_accent_bg">
            <div class="cs_newsletter_icon"><img src="{{ asset('assets/images/icons/envlop.png') }}" alt="Icon"></div>
            <h2 class="cs_newsletter_title cs_fs_40 cs_bold mb-0 cs_white_color">Subscribe Our Newsletter</h2>
            <form method="POST" action="{{ route('subscribeNewsLetter') }}" class="cs_newsletter_form">
              @csrf
              <input type="email" name="email_id" class="cs_newsletter_form_field" placeholder="Enter your email address ...">


              <!-- Google reCAPTCHA -->
                    {{-- <div class="captcha-container">
                        <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
                    </div> --}}

                    <div class="main-one-footer">
                        <div class="main-two-footer">
                            <div class="col-md-12 col-sm-12 mb-3">
                                {{-- <label class="form-label" for="captcha"></label> --}}
                                {{-- <span class="text-danger"></span> --}}
                                <input class="form-control-footer" type="text" id="captcha" label="Captcha" name="captcha" required="required" placeholder="Captcha">
                            </div>
                        </div>

                        <!-- Captcha and Button container -->
                        <div class="captcha-container">
                            <div class="captcha-image mt-2">
                                <img src="{{ captcha_src() }}" class="img-thumbnail" id="captcha_img_id">
                            </div>

                            <style>
                                .captcha-container{
                                    display:flex;
                                    align-items: center;
                                }
                                .img-thumbnail{
                                    display: flex;
                                    height: 40px;
                                    width: 140px;
                                }
                            </style>
                            <div class="captcha-refresh mt-4">
                                <button type="button" class="btn default-btns font-weight-bold"
                                    onclick="refreshCapthca('captcha_img_id','captcha')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                        <path
                                            d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                                        <path fill-rule="evenodd"
                                            d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
              <button type="submit" class="cs_btn cs_style_1 cs_fs_18 cs_medium">
                Subscribe<svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z" fill="currentColor"></path>
                  <path d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z" fill="currentColor"></path>
                </svg>
              </button>
            </form>





          </div>


        </div>
      </div>
      <div class="container">
        <div class="cs_footer_main">
          <div class="cs_footer_main_col">
            <div class="cs_footer_widget">
              <div class="cs_text_widget">
                <!-- <img src="./assets/images/booklogo.png" alt="Logo"> -->
                <h3 class="cs_footer_widget_title cs_fs_24 cs_semibold cs_white_color">Contact Us</h3>
              </div>
              <ul class="cs_contact_widget mb-0">
                <li>
                  {{-- <p>Call Us:</p> --}}
                  <!-- <a href="mailto:info@utthaantrust.org"> class="cs_fs_20">+91-9711433495</p> -->
                    <li>
                           <a href="tel:+91{!! $phoneElement ? $phoneElement->element_details : '9711433495' !!}" style="display: inline-flex; align-items: center;">
                          <span class="icon icon-envelope" style="color:white #fff; text-decoration: none;"  onmouseover="this.style.color='white #fff'", onmouseover="this.style.color='white'" onmouseout="this.style.color='white'">Call Us:</span>
                          <span class="text" style="display: inline-flex; align-items: center;">
                              <span class="country-code" style="margin-left: 5px"> +91-</span>
                              <span class="mobile-number">{!! $phoneElement ? $phoneElement->element_details : '9876543210' !!}</span>
                          </span>
                      </a>
                  </li>
                                    </li>
                <li>
                  {{-- <p>Mail Us: </p> --}}
                  {{-- <li>Mail Us:<a href="mailto:{!! $emailElement ? $emailElement->element_details : 'book365days@gmail.com' !!}">  {!! $emailElement ? $emailElement->element_details: 'book365days@gmail.com' !!} </a></li> --}}
                  <div style="display: flex; align-items: center; gap: 5px;">
                  <p> Mail Us:
                    <a href="mailto:dumy@gmail.com" style="color:white #fff; text-decoration: none;"  onmouseover="this.style.color='rgb(79, 184, 166)'", onmouseover="this.style.color='white'" onmouseout="this.style.color='white'">
                        {!! $email ? $email->element_details : 'dumy@gmail.com' !!}
                    </a>
                </p>
            </div>


                </li>

                <li>
                    <div class="social-icons" style="display: flex; gap: 10px;">
                        <a href="{!! $fb_link ? $fb_link->element_details : 'facebook.com' !!}" target="_blank" style="color: white; font-size: 24px;">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="{!! $twitter_link ? $twitter_link->element_details : 'facebook.com' !!}" target="_blank" style="color: white; font-size: 24px;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="{!! $insta_link ? $insta_link->element_details : 'facebook.com' !!}" target="_blank" style="color: white; font-size: 24px;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="{!! $linkedin_link ? $linkedin_link->element_details : 'facebook.com' !!}" target="_blank" style="color: white; font-size: 24px;">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="{!! $pintrest_link ? $pintrest_link->element_details : 'facebook.com' !!}" target="_blank" style="color: white; font-size: 24px;">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </li>


                <li>
                </li>
              </ul>
            </div>
          </div>
          <div class="cs_footer_main_col">
            <div class="cs_footer_widget">
              <h3 class="cs_footer_widget_title cs_fs_24 cs_semibold cs_white_color">Useful Links</h3>
              <ul class="cs_menu_widget">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('destination') }}">Destinations</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                <li><a href="{{ route('tour') }}">Packages</a></li>
                <li><a href="{{ route('blog') }}">Blogs</a></li>

                <li><a href="{{ route('destinations') }}">Services</a></li>
                <li><a href="{{ route(name: 'privacypolicy') }}">Privacy Policy</a></li>

                <li><a href="{{ route('galleryPages') }}">Gallery</a></li>
                <li><a href="{{ route(name: 'termsConditions') }}">Terms and Conditions</a></li>
                <li></li>
                <li><a href="{{ route(name: 'CancellationRefundPolicy') }}">Refund Policy</a></li>







                {{-- <li><a href="">Flights</a></li>
                <li><a href="">Organized Trips</a></li>
                <li><a href="">Hotels</a></li>
                <li><a href="">Booking</a></li>
                <li><a href="">Transfers</a></li>
                <li><a href="">Requests</a></li> --}}
              </ul>
            </div>
          </div>
          <div class="cs_footer_main_col">
            <div class="cs_footer_widget">
              <h3 class="cs_footer_widget_title cs_fs_24 cs_semibold cs_white_color">Contact Info</h3>
              <ul class="cs_contact_widget mb-0">

                <div style="display: flex;  gap: 5px;">
                    <p>Address:</p>
                    <p>{!! $addressElement ? $addressElement->element_details : 'Plot No-1/20, Ashok Nagar, New Delhi - 11002w' !!}</p>
                </div>

                {{-- <div  style="display: flex; align-items: center; gap: 5px;"><p>Address:</p>

                <li>{!! $addressElement ? $addressElement->element_details : 'Plot No-1/20, Ashok Nagar, New Delhi - 11002w' !!}</li>
                </div> --}}
                <div style="display: flex; align-items: center; gap: 5px;">
                <p>Global Presence:</p>
                <p>{!! $Global_PresenceElement ? $Global_PresenceElement->element_details : 'Amsterdam, Manchester, Rome' !!}</p>
                </div>
                {{-- <li><a href="">Emirates, United Arabian</a></li>
                <li><a href="">Emirates, United Arabian</a></li>
                <li><a href="">New York City, USA</a></li>
                <li><a href="">New York City, USA</a></li>
                <li><a href="">One Bridge, Belguim</a></li>
                <li><a href="">One Bridge, Belguim</a></li>
                <li><a href="">Golden Frame, Dubai</a></li>
                <li><a href="">Golden Frame, Dubai</a></li> --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="cs_footer_botto text-center pb-4">
          <!-- <div class="cs_copyright">Copyright © 2024 book365days All rights reserved by vyapa</div> -->
          © 2025 All Rights Reserved by Flying Trip Online. Developed by <a href="https://vyaparkranti.com/" target="_blank">Vyapar kranti</a>

          <ul class="cs_menu_widget_2 cs_mp0">
            <li><a href="#"></a></li>
          </ul>
        </div>
      </div>
    </footer>
    <input id="enquiry" hidden="" type="checkbox">
<section class="enquiry-form">
    {{-- <label for="enquiry" class="enquiry-button" onclick="openEnquiryForm()"><a href="{{ route('contact') }}">Enquire now</a></label> --}}
    <label for="enquiry" class="enquiry-button" data-bs-toggle="modal" data-bs-target="#enquiryModal">
    <a href="javascript:void(0);">Enquire now</a>
</label>

    <div class="enquiry-container">
        <div class="contact-box_right_box">
            <div class="contact-box_form_box">




            </div>
        </div>
    </div>
    <!-- Trigger Button -->


</section>

<!-- Enquiry Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enquiryModalLabel">
          <img src="https://img.icons8.com/ios-filled/50/000000/new-post.png" width="24" />
          Send us a Query
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Ready to venture out into the world? Fill the form below and start your brand new journey with us</p>

        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Name*" required>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" placeholder="Email*" required>
            </div>
            <div class="col-md-6">
              <input type="tel" class="form-control" placeholder="Mobile*" required>
            </div>
            <div class="col-md-6">
              <input type="date" class="form-control" placeholder="Date*" required>
            </div>
            <div class="col-md-6">
              <input type="number" class="form-control" placeholder="No of travellers*" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Destination*" value="Almaty, Kazakhstan" required>
            </div>
          </div>
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<style>
    section.enquiry-form {
        position: fixed;
        top: 50%;
        right: -0%;
        z-index: 99;
        transition: var(--transition);
        margin-left: 40px;
        transform: translateY(-50%);
        margin-right: -400px;
    }

    .enquiry-button a {
        transform: rotate(-90deg);
        top: 50%;
        left: calc(0% - 40px - 40px);
        cursor: pointer;
        margin: 0 0;
        color: #ffffff;
        height: 40px;
        user-select: none;
        -moz-user-select: none;
        line-height: 40px;
        padding: 0 15px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        /* background-color: rgb(var(--blue-color)); */
        background:var(--primary);
        -webkit-animation: liner_bg 5s ease infinite;
        animation: liner_bg 5s ease-in-out infinite;
        background-size: 300% 300%;
        position: absolute;
        border: 1px solid rgb(var(--black-color));
    }

    .enquiry-button a:hover {
        background-color: white;
        border: 1px solid var(--primary);
        color:var(--primary);
    }

    .contact-box_form_box {
        background-color: #fff;
        padding: 15px;
        border-radius: 10px;
        max-width: 400px;
        min-width: 400px;
        margin: 1rem auto;
        width: 100%;
    }

    .btn-primary {
        color: #fff;
        border-color: var(--primary-color) !important;
        background-color: var(--primary-color) !important;
        text-align: center;

    }
</style>




<style>

    .main-one-footer {
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
    .form-control-footer {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 5px;
    }


    .captcha-container-footer {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        width: 100%;
        margin-top: 10px;
    }


    .captcha-left-footer {
        display: flex;
        align-items: center;
    }


    .captcha-right-footer {
        display: flex;
        align-items: center;
    }


    .captcha-image-footer img {
        display: flex;
    margin-top: 0px;
    margin-bottom: 13px;
    width: 169px;
    height: 47px;
    border-radius: 5px;
    border: 1px solid #ccc;
    }


    .captcha-refresh-footer .btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .captcha-refresh-footer .btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .captcha-refresh-footer .btn:active {
        background-color: #004494;
        transform: scale(0.98);
    }

    .main-two-footer {
        display: flex;
    /* justify-content: center; */
    /* align-items: baseline; */
    margin-left: 3px;
        /* margin-top: 20px; */
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
        .captcha-container-footer {
            display: flex;
            /* flex-direction: column; */
            align-items: center;
        }

        .captcha-left-footer,
        .captcha-right-footer {
            width: 100%;
            text-align: center;
        }
    }


    </style>


