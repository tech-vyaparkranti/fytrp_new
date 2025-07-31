@extends('layout.layout')
@section('title', $package->meta_title)
@section('meta_description', $package->meta_description)
@section('meta_keywords', $package->meta_keyword)
@section('content')
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
    <!-- Start Hero Section -->
    <x-hero subTitle='Modern & Beautiful' img='assets/images/tour_header_bg.jpeg' title='Package Details' />
    <!-- End Hero Section -->

    <!-- Start Destination Details Section -->
    <section>
        <div class="cs_height_140 cs_height_lg_80"></div>
        <div class="container">
            <div class="row cs_gap_y_50">

                <div class="col-lg-8">
                    <div class="cs_post_details" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h2 class="cs_tour_details_title" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{{ $package->package_name }},
                            {{ $package->package_country }}<small> <i
                                    class="fa-solid fa-indian-rupee-sign"></i>{!! $package->package_offer_price !!} /
                                <span>{!! $package->package_duration_days !!} Days /
                                    {!! $package->package_duration_nights !!} Nights</span></small></h2>
                        @if (isset($package->package_image))
                            @php
                                $images = is_string($package->package_image)
                                    ? json_decode($package->package_image, true)
                                    : $package->package_image;

                                $images = is_array($images) ? $images : [];
                            @endphp

                            {{-- Dynamically populate the first two images for the first column --}}
                            @if (isset($images[0]))
                                <img src="{{ asset('storage/' . $images[0]) }}" alt="Destination"
                                    class="tour-detail-img img-fluid ">
                            @endif
                        @else
                            {{-- Fallback: Original static images --}}
                            <img src="./assets/images/destination-details1.jpg" alt="Destination"
                                class="img-fluid fixed-image-size">
                        @endif
                        {{-- <p>
                            @if (isset($package->description) && !empty($package->description))
                                @php
                                    // Split the description into highlights (assuming each line is a bullet point)
                                    $highlights = explode("\n", $package->description);
                                @endphp
                                @foreach ($highlights as $highlight)
                                    <p>{!! $highlight !!}</p>
                                @endforeach
                            @else
                                <li>No highlights available for this package.</li>
                            @endif
                        </p> --}}

                        <div class="package-description-container">
                            <div class="package-description collapsed">
                                @if (isset($package->description) && !empty($package->description))
                                    @php
                                        // Split the description into highlights (assuming each line is a bullet point)
                                        $highlights = explode("\n", $package->description);
                                    @endphp
                                    @foreach ($highlights as $highlight)
                                        <p>{!! $highlight !!}</p>
                                    @endforeach
                                @else
                                    <li>No highlights available for this package.</li>
                                @endif
                            </div>
                            <button class="toggle-description">Show More</button>
                        </div>


                        <hr>
                    </div>
                    <div class="row pb-55">
                        <div class="col-md-6">
                            {{-- <div class="tour-include-exclude mt-4">
                            <h5>Included</h5>
                            <ul class="list-style-one check mt-2">
                                <li><i class="fa-solid fa-check"></i> Pick and Drop Services</li>
                                <li><i class="fa-solid fa-check"></i> 1 Meal Per Day</li>
                                <li><i class="fa-solid fa-check"></i> Cruise Dinner & Music Event</li>
                                <li><i class="fa-solid fa-check"></i> Visit 7 Best Places in the City</li>
                                <li><i class="fa-solid fa-check"></i> Bottled Water on Buses</li>
                                <li><i class="fa-solid fa-check"></i> Transportation Luxury Tour Bus</li>
                            </ul>
                        </div> --}}
                            <div class="tour-include-exclude mt-4">
                                <h5>Included</h5>
                                {{-- <ul class="list-style-one check mt-2">
                                    @php
                                        // Decode the included items JSON to an array
                                        $includedItems = is_string($package->package_included)
                                            ? json_decode($package->package_included, true)
                                            : $package->package_included;
                                        $includedItems = is_array($includedItems) ? $includedItems : [];
                                    @endphp
                                    @if (count($includedItems) > 0)
                                        @foreach ($includedItems as $item)
                                            <li><i class="fa-solid fa-check"></i> {{ $item }}</li>
                                        @endforeach
                                    @else
                                        <li>No included items available.</li>
                                    @endif
                                </ul> --}}

                                <ul class="list-style-one check mt-2 package-included-list">
                                    @php
                                        // Decode the included items JSON to an array
                                        $includedItems = is_string($package->package_included)
                                            ? json_decode($package->package_included, true)
                                            : $package->package_included;
                                        $includedItems = is_array($includedItems) ? $includedItems : [];
                                    @endphp

                                    @if (count($includedItems) > 0)
                                        @foreach ($includedItems as $index => $item)
                                            <li class="{{ $index >= 3 ? 'hidden' : '' }}">
                                                <i class="fa-solid fa-check"></i> {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No included items available.</li>
                                    @endif
                                </ul>

                                @if (count($includedItems) > 3)
                                    <button class="toggle-included-btn">Show More</button>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- <div class="tour-include-exclude mt-4">
                            <h5>Excluded</h5>
                            <ul class="list-style-one mt-2">
                                <li><i class="fa-regular fa-circle-xmark"></i> Gratuities</li>
                                <li><i class="fa-regular fa-circle-xmark"></i> Hotel pickup and drop-off</li>
                                <li><i class="fa-regular fa-circle-xmark"></i> Lunch, Food & Drinks</li>
                                <li><i class="fa-regular fa-circle-xmark"></i> Optional upgrade to a glass</li>
                                <li><i class="fa-regular fa-circle-xmark"></i> Additional Services</li>
                                <li><i class="fa-regular fa-circle-xmark"></i> Insurance</li>
                            </ul>
                        </div> --}}
                            <div class="tour-include-exclude mt-4">
                                <h5>Excluded</h5>
                                <ul class="list-style-one cross mt-2 package-excluded-list">
                                    @php
                                        // Decode the excluded items JSON to an array
                                        $excludedItems = is_string($package->package_excluded)
                                            ? json_decode($package->package_excluded, true)
                                            : $package->package_excluded;
                                        $excludedItems = is_array($excludedItems) ? $excludedItems : [];
                                    @endphp

                                    @if (count($excludedItems) > 0)
                                        @foreach ($excludedItems as $index => $item)
                                            <li class="{{ $index >= 3 ? 'hidden' : '' }}">
                                                <i class="fa-solid fa-times"></i> {{ $item }}
                                            </li>
                                        @endforeach
                                    @else
                                        <li>No excluded items available.</li>
                                    @endif
                                </ul>

                                @if (count($excludedItems) > 3)
                                    <button class="toggle-excluded-btn">Show More</button>
                                @endif

                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                                    <div class="tour-include-exclude mt-30">
                                        <h5>Excluded</h5>
                                        <ul class="list-style-one mt-25">
                                            <li><i class="far fa-times"></i> Gratuities</li>
                                            <li><i class="far fa-times"></i> Hotel pickup and drop-off</li>
                                            <li><i class="far fa-times"></i> Lunch, Food & Drinks</li>
                                            <li><i class="far fa-times"></i> Optional upgrade to a glass</li>
                                            <li><i class="far fa-times"></i> Additional Services</li>
                                            <li><i class="far fa-times"></i> Insurance</li>
                                        </ul>
                                    </div>
                                </div> -->
                    </div>
                    <div class="cs_tabs">
                        <ul class="cs_tab_links cs_style_1 cs_mp0">
                            <li class="active"><a href="#tab_1"
                                    class="cs_primary_bg cs_white_color cs_radius_5"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                    Tour Plan</a></li>
                            {{-- <li><a href="#tab_2"
                                    class="cs_primary_bg cs_white_color cs_radius_5"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Location</a></li> --}}
                            {{-- <li><a href="#tab_3"
                                    class="cs_primary_bg cs_white_color cs_radius_5"data-aos="fade-up">Gallary</a></li> --}}
                            {{-- <li><a href="#tab_4" class="cs_primary_bg cs_white_color cs_radius_5"data-aos="fade-up">Reviews</a></li> --}}
                        </ul>

<div class="cs_tab_body">

    <div class="cs_tab active" id="tab_1">
        <ul class="cs_tour_plan_list cs_mp0 accordion" id="accordionExample">
            @php
                // Decode itinerary_titles and itinerary_descriptions if needed
                $titles = is_string($package->itinerary_titles) ? json_decode($package->itinerary_titles, true) : $package->itinerary_titles;
                $descriptions = is_string($package->itinerary_descriptions) ? json_decode($package->itinerary_descriptions, true) : $package->itinerary_descriptions;
            @endphp

            @if (!empty($titles) && !empty($descriptions) && count($titles) === count($descriptions))
                @foreach ($titles as $index => $title)
                    <li class="cs_list_item" style="margin-bottom: 2px; padding: 0;">
                        {{-- <div class="cs_list_index cs_center"><span></span></div> --}}
                        <div class="cs_list_content">
                            <h3 class="cs_list_item_title cs_fs_24 cs_semibold"
                                data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"
                                id="heading{{ $index }}">

                                <button class="accordion-button d-flex justify-content-between align-items-center {{ $index === 0 ? '' : 'collapsed' }}"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    • {{ $title }}

                                    {{-- <span class="flex-grow-1 text-start"> {{ $title }}</span> --}}

                                    {{-- <span class="dropdown-icon"><i class="fas fa-chevron-down"></i></span> --}}
                                </button>
                            </h3>

                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="cs_list_item_subtitle mb-0"
                                       data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                                        {{ $descriptions[$index] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <!-- Tab 2: Google Maps -->
    <div class="cs_tab" id="tab_2">
        <iframe
            src="https://www.google.com/maps?q={{ urlencode($package->package_country) }}&output=embed"
            style="border:0; width: 100%; height: 400px;"
            allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<!-- Ensure Bootstrap JS and FontAwesome for Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-fa-kit.js" crossorigin="anonymous"></script>

<!-- JavaScript for Icon Rotation -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let buttons = document.querySelectorAll(".accordion-button");

        buttons.forEach(button => {
            button.addEventListener("click", function() {
                let icon = this.querySelector(".dropdown-icon i");

                // Reset all icons before toggling
                document.querySelectorAll(".dropdown-icon i").forEach(i => i.style.transform = "rotate(0deg)");

                // Toggle icon rotation
                if (!this.classList.contains("collapsed")) {
                    icon.style.transform = "rotate(180deg)";
                }
            });
        });
    });
</script>

                </div>
                {{-- <div class="cs_tour_gallery">
                    <h3 class="cs_gallery_title cs_fs_30 cs_semibold">From Our Gallery</h3>
                    <div class="cs_grid_4">
                      @if (!empty($galleryImages) && count($galleryImages))
                      @foreach ($galleryImages as $item)
                        <div class="cs_gallery_img cs_radius_5">
                            <img src="{{ asset($item->local_image) }}" alt="Gallery Image">
                        </div>
                        @endforeach
                      @else
                        @endif
                    </div>
                </div> --}}
            </div>
            <aside class="col-lg-4">
                <div class="cs_sidebar cs_style_1 cs_white_bg cs_right_sidebar">
                    <div class="cs_info_widget cs_white_bg">
                        {{-- <h3 class="cs_widget_title cs_fs_24 cs_medium" data-aos="fade-up">Basic Information:</h3>
                        <p class="cs_widget_subtitle" data-aos="fade-up">Aliquam lorem ante, dapibus in, viverra quis,
                            feugiat viverra nulla ut metus varius laoreet. Quisque</p>
                        <ul class="cs_info_list cs_mp0">
                            <li class="cs_info_item">
                                <h3 class="cs_info_title cs_fs_16 cs_semibold mb-0"data-aos="fade-up">Destination</h3>
                                <p class="cs_info_subtitle mb-0" data-aos="fade-up">{{ $package->package_name }}</p>
                            </li>
                            <li class="cs_info_item">
                                <h3 class="cs_info_title cs_fs_16 cs_semibold mb-0" data-aos="fade-up">Duration</h3>
                                <p class="cs_info_subtitle mb-0" data-aos="fade-up">{!! $package->package_duration_days !!} Days /
                                  {!! $package->package_duration_nights !!} Nights</p>
                            </li>
                            <li class="cs_info_item">
                                <h3 class="cs_info_title cs_fs_16 cs_semibold mb-0" data-aos="fade-up">Included</h3>
                                @php
                                $includedItems = is_string($package->package_included)
                                    ? json_decode($package->package_included, true)
                                    : $package->package_included;
                                    $includedItems = is_array($includedItems) ? $includedItems : [];
                                @endphp
                                @if (count($includedItems) > 0)
                                    @foreach ($includedItems as $item)
                                      <p class="cs_info_subtitle mb-0" data-aos="fade-up">{{ $item }}</p>
                                    @endforeach
                                @else
                                    <li>No included items available.</li>
                                @endif
                            </li>
                            <li class="cs_info_item">
                                <h3 class="cs_info_title cs_fs_16 cs_semibold mb-0" data-aos="fade-up">Not Included</h3>
                                @php
                                            // Decode the excluded items JSON to an array
                                            $excludedItems = is_string($package->package_excluded)
                                                ? json_decode($package->package_excluded, true)
                                                : $package->package_excluded;
                                            $excludedItems = is_array($excludedItems) ? $excludedItems : [];
                                        @endphp
                                        @if (count($excludedItems) > 0)
                                            @foreach ($excludedItems as $item)
                                            <p class="cs_info_subtitle mb-0" data-aos="fade-up">{{ $item }}</p>
                                            @endforeach
                                        @else
                                            <li>No excluded items available.</li>
                                        @endif

                            </li>
                        </ul> --}}
                       <div class="enquiry-send-form">
    <div class="tabBtns">
        <div class="form-group">
            <button type="button" class="tab-button active" onclick="showTab(1)">Pay Now</button>
        </div>
        <div class="form-group">
            <button type="button" class="tab-button" onclick="showTab(2)">Enquiry Now</button>
        </div>
    </div>

    <div class="form-container">
<form class="tab-content" id="tab1" action="{{ route('store.booking') }}" method="POST">
            @csrf
            <h3>{{ $package->package_name }}</h3>
            <div class="price-details pb-3">
                <p class="fixed-price">INR {{ number_format($package->package_offer_price, 2) }}</p>
                @if ($package->package_price > $package->package_offer_price)
                    <p class="initial-price">INR {{ number_format($package->package_price, 2) }}</p>
                    <p class="discount-price">
                        Save INR
                        {{ number_format($package->package_price - $package->package_offer_price, 2) }}
                    </p>
                @else
                    <p class="initial-price">&nbsp;</p>
                    <p class="discount-price">&nbsp;</p>
                @endif
            </div>
            <div class="form-group">
                <input type="text" id="full-name" name="full-name" placeholder="Full Name*" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email Address*" required>
            </div>
            <div class="form-group">
                <div class="phone-number">
                    <input type="text" id="phone-number" name="phone-number" placeholder="Phone Number*" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <input type="date" id="travel-date" name="travel-date" placeholder="Travel Date*" required>
                </div>
                <div class="col">
                    <input type="number" id="traveller-count" name="traveller-count" placeholder="Traveller Count*" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="packageName" name="packageName" placeholder="Package Name">
            </div>
            <div class="form-group">
                <input type="text" id="amount" name="amount" placeholder="Payment Amount" required>
            </div>
            <x-input-with-label-element id="captcha_paynow" type="text" label="Captcha" name="captcha_paynow" required placeholder="Captcha"></x-input-with-label-element>
            <div class="captcha-container">
                <div class="captcha-image">
                    <img src="{{ captcha_src() }}" class="img-thumbnail" id="captcha_img_id_paynow">
                </div>
                <div class="captcha-refresh mt-1">
                    <button type="button" class="btn default-btn font-weight-bold" onclick="refreshCapthca('captcha_img_id_paynow','captcha_paynow')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="form-group">
                <button type="submit">Book Now</button>
            </div>
        </form>

        <form class="tab-content" id="tab2" style="display:none;">
            @csrf
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="Full Name*" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email Address*" required>
            </div>
            <div class="form-group">
                <div class="phone-number">
                    <select id="country-code" name="country-code" required>
                        <option value="+1">+1 USA</option>
                        <option value="+44">+44 UK</option>
                        <option value="+33">+33 France</option>
                        <option value="+49">+49 Germany</option>
                        <option value="+91" selected>+91 India</option>
                        <option value="+81">+81 Japan</option>
                        <option value="+61">+61 Australia</option>
                        <option value="+55">+55 Brazil</option>
                        <option value="+27">+27 South Africa</option>
                        <option value="+86">+86 China</option>
                        <option value="+7">+7 Russia</option>
                        <option value="+34">+34 Spain</option>
                        <option value="+39">+39 Italy</option>
                        <option value="+52">+52 Mexico</option>
                        <option value="+66">+66 Thailand</option>
                        <option value="+60">+60 Malaysia</option>
                        <option value="+63">+63 Philippines</option>
                        <option value="+20">+20 Egypt</option>
                        <option value="+43">+43 Austria</option>
                        <option value="+31">+31 Netherlands</option>
                        <option value="+48">+48 Poland</option>
                        <option value="+32">+32 Belgium</option>
                        <option value="+420">+420 Czech Republic</option>
                        <option value="+90">+90 Turkey</option>
                        <option value="+41">+41 Switzerland</option>
                        <option value="+82">+82 South Korea</option>
                        <option value="+65">+65 Singapore</option>
                        <option value="+94">+94 Sri Lanka</option>
                        <option value="+213">+213 Algeria</option>
                        <option value="+54">+54 Argentina</option>
                        <option value="+962">+962 Jordan</option>
                        <option value="+971">+971 UAE</option>
                        <option value="+968">+968 Oman</option>
                        <option value="+965">+965 Kuwait</option>
                        <option value="+974">+974 Qatar</option>
                        <option value="+963">+963 Syria</option>
                        <option value="+84">+84 Vietnam</option>
                        <option value="+92">+92 Pakistan</option>
                    </select>
                    <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number*" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <input id="travel_date" name="travel_date" placeholder="Travel Date*" type="date" required>
                </div>
                <div class="col">
                    <input type="number" id="traveller_count" name="traveller_count" placeholder="Traveller Count*" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" id="package_name" name="package_name" placeholder="Package Name">
            </div>
            <div class="form-group">
                <textarea id="message" name="message" placeholder="Message"></textarea>
            </div>
            <x-input-with-label-element id="captcha_enquiry" type="text" label="Captcha" name="captcha_enquiry" required placeholder="Captcha"></x-input-with-label-element>
            <div class="captcha-container">
                <div class="captcha-image">
                    <img src="{{ captcha_src() }}" class="img-thumbnail" id="captcha_img_id_enquiry">
                </div>
                <div class="captcha-refresh mt-1">
                    <button type="button" class="btn default-btn font-weight-bold" onclick="refreshCapthca('captcha_img_id_enquiry','captcha_enquiry')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z" />
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="form-group">
                <button id="submitButton" type="submit">Send Enquiry</button>
            </div>
        </form>
    </div>
</div>

                    </div>
                    <div class="widget widget-contact" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <div class="need-one">
                        <h5 class="widget-title">Need Help?</h5>
                        <ul class="list-style-one">
                            <li><i class="far fa-envelope"></i> <a href="mailto:{!! $email ? $email->element_details : 'dumy@gmail.com' !!}">
    {!! $email ? $email->element_details : 'dumy@gmail.com' !!}</a></li>
                            <li><i class="fas fa-phone-volume"></i> <a href="tel:+91{!! $phoneElement ? $phoneElement->element_details : '9711433495' !!}">{!! $phoneElement ? $phoneElement->element_details : '9711433495' !!}</a></li>
                        </ul>
                        </div>
                    </div>

                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps?q={{ urlencode($package->package_country) }}&output=embed"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    {{-- <div class="cs_post_widget">
                        <h3 class="cs_widget_title cs_fs_24 cs_semibold"data-aos="fade-up">Popular Destination</h3>
                        <ul class="cs_recent_posts cs_mp0">
                          @foreach($otherpackages as $otherpackage)
                            <li>
                                <article class="cs_recent_post">
                                    <a href="{{ route('tourDetailpage', ['slug' => $otherpackage->slug]) }}"
                                        class="cs_recent_post_thumb cs_zoom"data-aos="fade-up">
                                        @if (isset($otherpackage->package_image))
                                        @php
                                            $images = is_string($otherpackage->package_image)
                                                ? json_decode($otherpackage->package_image, true)
                                                : $otherpackage->package_image;

                                            $images = is_array($images) ? $images : [];
                                        @endphp
                                                    @if (isset($images[0]))
                                            <img src="{{ asset('storage/' . $images[0]) }}" alt="Destination"
                                                class="cs_zoom_in w-100 h-100 object-fit-cover tour-detail-img img-fluid ">
                                        @endif
                                    @else
                                        <img src="./assets/images/destination-details1.jpg" alt="Destination"
                                            class="img-fluid fixed-image-size">
                                    @endif

                                    </a>
                                    <div class="cs_recent_post_info">
                                        <h3 class="cs_recent_post_title cs_fs_18 cs_medium"data-aos="fade-up">
                                            <a href="{{ route('tourDetailpage', ['slug' => $otherpackage->slug]) }}">{{ $otherpackage->package_name }}</a>
                                        </h3>
                                        <div class="cs_recent_post_meta"data-aos="fade-up">
                                            <span>{{ $otherpackage->package_country }}</span>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>
            </aside>
        </div>
        </div>
        <div class="cs_height_140 cs_height_lg_80"></div>
    </section>
    <!-- End Destination Details Section -->
<style>

   
.event-collarge-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2px 10px;
    height: 100%;
}

.event-collarge-container .event-collarge-item:first-child {
    grid-column: 1 /3;
    grid-row: 1 / 3;
}

.event-collarge-container .event-collarge-item:nth-child(2) {
    grid-column: 3 / 4;
    grid-row: 1/ 2;
}

.event-collarge-container .event-collarge-item:nth-child(3) {
    grid-column: 3 / 4;
    grid-row: 2/ 3;
}

.event-collarge-item img.img-fluid {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.service-gallery .event-collarge-container {
    display: grid;
    grid-template-rows: 150px 150px;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
    height: 100%;
}

section.destination-details {
    padding: 24px;
}

section.hospitality {
    padding: 24px;
}

.contact-form-area {
    max-width: 570px;
    margin-left: auto;
    padding: 3rem 2rem 2rem;
}

.contact-form-area h3,
.contact-info h3 {
    color: var(--bs-cyan);
    font-size: 24px;
}

.contact-form-area button[data-bs-dismiss="modal"] {
    position: absolute;
    top: 10px;
    right: 10px !important;
    left: auto;
}

.contact-form-area button[data-bs-dismiss="modal"],
.service-page .destinations-block a {
    right: 0;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    color: #fff;
    background-color: var(--bs-cyan);
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: var(--transition);
    z-index: 1;
}

.contact-form-area .form-group label {
    color: var(--bs-body-color);
    font-size: 14px;
}

.contact-form-area .form-group input,
.contact-form-area .form-group textarea {
    background-color: whitesmoke;
    border-radius: 4px;
}

.contact-form-area .form-group input:not(input[type="checkbox"]) {
    height: 40px;
    line-height: 40px;
}

.contact-form-area .form-check-input {
    width: 1.1rem;
    height: 1.1rem;
    margin-top: 0.19em;
}

.view-button > button,
.view-button a {
    height: 40px;
    padding: 0 15px;
    min-width: 120px;
    font: 300 16px/38px var(--lato-font);
    text-align: center;
    background-color: var(--bs-cyan);
    color: #fff;
    border: 1px solid var(--bs-cyan);
    transition: var(--transition);
    border-radius: 5px;
    display: inline-block;
    margin-bottom: 5px;
}

.contact-form-area .form-group input[type="checkbox"]:checked {
    background-color: var(--bs-cyan);
}

.form-group {
    margin-bottom: 15px;
}

.form-group .phone-number .nice-select,
.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    color: grey;
}

.form-group .phone-number .nice-select {
    width: 100px;
}

.form-group .phone-number .nice-select:before {
    top: 20px;
    right: 5px;
}

.form-group input::placeholder {
    color: var(--text-color);
}

.form-group input[type="date"] {
    padding: 9px;
    color: grey;
}

.form-group .optional {
    color: var(--bs-light);
}

.form-group .required:after {
    content: " *";
    color: red;
}

.form-group .phone-number {
    display: flex;
    gap: 5px;
}

.form-group .phone-number select {
    flex: 0 0 120px;
}

.form-group .phone-number input[type="text"] {
    flex: 1;
}

.form-group .row {
    display: flex;
    gap: 10px;
}

.form-group .row .col {
    flex: 1;
}

.form-group button { /* This is for general buttons within a form-group, including submit buttons */
    background-color: rgb(var(--tomato-orange));
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

.form-group button:hover {
    /* If you have a specific hover color for general buttons, add it here */
    /* background-color: var(--bs-cyan-bg-dark); */
}

select {
    overflow: auto;
}

select option:first-child,
select option:nth-child(2),
select option:nth-child(3),
select option:nth-child(4),
select option:nth-child(5) {
    display: block;
}

.iternary-section {
    display: flex;
    grid-gap: 10px;
    align-items: center;
}

.days-iternary {
    display: flex;
    grid-gap: 6px;
    justify-content: center;
    align-items: center;
}

.venue .days p {
    margin: 0px;
    font-size: 9px;
    font-weight: 400;
    line-height: 14px;
}

.venue .place p {
    margin: 0px;
    font-size: 11px;
    font-weight: 500;
    line-height: 17px;
    color: var(--bg-black);
}

.no_days p {
    font-size: 31px;
    font-weight: 700;
    line-height: 47px;
    color: var(--paragraphColor);
    margin-top: 10px;
}

.night p {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 8px;
    width: auto;
    height: 27px;
    border-radius: 20px;
    background: rgb(var(--tomato-orange));
    margin-top: 9px;
    color: #fff;
    font-size: 13px;
    font-weight: 500;
}

.itenrary-left-section hr,
.book-section hr {
    margin-top: 0px;
    color: inherit;
    margin-bottom: 15px;
    border: 0;
    border-top: 1px solid var(--paragraphColor);
    opacity: .25;
}

ul.trip-details {
    list-style: disc;
}

ul.trip-details li {
    text-align: justify;
}

.book-section {
    border: 1px solid lightgrey;
    border-radius: 8px;
    padding: 10px 15px;
}

.rating-section {
    display: flex;
    grid-gap: 10px;
    justify-content: space-between;
    align-items: center;
}

.rating-section .price p {
    font-size: 22px;
    font-weight: 600;
    line-height: 38px;
    color: var(--bg-black);
}

.rating-section .adult p {
    font-size: 12px;
    line-height: 18px;
    color: #8e8e8e;
    margin-left: -8px;
    margin-top: 4px;
}

.rating-section .cross-price p {
    font-size: 18px;
    line-height: 27px;
    color: #515151;
    text-decoration: line-through;
    margin-right: 90px;
}

.book-now {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 50px;
    border-radius: 7px;
    border: 1px solid rgb(var(--tomato-orange));
    background-color: rgb(var(--tomato-orange));
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    padding: 0px 10px;
}

.book-now a {
    color: var(--bs-light);
}

.enquiry-send-form {
    border: 1px solid lightgrey;
    border-radius: 8px;
    padding: 10px 15px;
    /* Remove or adjust max-width/margin-left/right if already handled by parent containers */
    /* max-width: 400px; */
    /* margin-left: auto; */
    /* margin-right: auto; */
}

.enquiry-send-form p {
    display: flex;
    align-items: center;
    color: #515151;
    font-size: 13px;
    font-weight: 500;
    line-height: 19px;
    text-transform: capitalize;
    display: -webkit-box !important;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.price-details .fixed-price {
    display: flex;
    align-items: center;
    color: var(--bg-black);
    font-size: 15px;
    font-weight: 600;
    line-height: 23px;
    margin-right: 5px;
}

.price-details .initial-price {
    display: flex;
    align-items: center;
    color: #515151;
    font-size: 12px;
    font-weight: 300;
    line-height: 18px;
    -webkit-text-decoration-line: line-through;
    text-decoration-line: line-through;
}

.price-details .discount-price {
    display: flex;
    align-items: center;
    padding: 5px 2px;
    color: #0b822a;
    font-size: 9px;
    font-weight: 600;
    line-height: 14px;
    text-transform: capitalize;
    background: linear-gradient(90deg, rgba(11, 130, 42, .11) 3.64%, rgba(11, 130, 42, .1));
    gap: 3px;
    margin-left: -.5px;
    margin-right: -.5px;
}

.price-details {
    display: flex;
    grid-gap: 10px;
    align-items: center;
    padding-bottom: 10px;
}

/* --- Specific Styles for Tab Functionality (Consolidated and Adjusted) --- */

/* Tab buttons container for horizontal layout */
.enquiry-send-form .tabBtns {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 5px;
}

/* Individual tab buttons */
.enquiry-send-form .tab-button {
    background-color: transparent;
    border: none;
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
    color: #6c757d; /* Inactive tab text color (a neutral gray) */
    font-weight: 500;
    position: relative;
    overflow: hidden;
    flex-grow: 1;
    text-align: center;
}

/* Underline effect for tabs */
.enquiry-send-form .tab-button::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background-color: transparent;
    transform: translateX(-100%);
    transition: transform 0.3s ease-out, background-color 0.3s ease;
}

/* Active tab styling for "Pay Now" (first button) */
.enquiry-send-form .tab-button:first-child.active {
    color: #0d47a1; /* Darker blue for active "Pay Now" text */
    font-weight: 600;
}

.enquiry-send-form .tab-button:first-child.active::after {
    background-color: #0d47a1; /* Darker blue for active "Pay Now" underline */
    transform: translateX(0%);
}

/* Active tab styling for "Enquiry Now" (second button) */
.enquiry-send-form .tab-button:nth-child(2).active {
    color: #ff5722; /* Orange for active "Enquiry Now" text */
    font-weight: 600;
}

.enquiry-send-form .tab-button:nth-child(2).active::after {
    background-color: #ff5722; /* Orange for active "Enquiry Now" underline */
    transform: translateX(0%);
}

/* Hover effect for inactive tabs */
.enquiry-send-form .tab-button:hover:not(.active) {
    color: #343a40; /* A darker gray/black on hover for inactive tabs */
}

/* Form container to hold tab contents */
.form-container {
    padding-top: 15px;
}

/* Tab content forms - hidden by default, JS will show/hide */
.tab-content {
    display: none;
}

/* Ensures the active tab content is shown */
.tab-content[style*="display: block"] {
    display: block !important;
}

/* --- Captcha Alignment Styles (Consolidated and Adjusted) --- */
.captcha-container {
    display: flex; /* Use flexbox for horizontal alignment */
    align-items: center; /* Vertically align items in the middle */
    gap: 10px; /* Space between captcha elements */
    margin-bottom: 15px;
}

.captcha-container .captcha-image {
    flex-shrink: 0; /* Prevent the image container from shrinking */
}

.captcha-container .captcha-image img {
    border: 1px solid #ced4da;
    border-radius: 5px;
    max-width: 120px; /* Control the image width */
    height: auto;
    display: block; /* Ensures no extra space below the image */
}

/* Style the captcha input to take available space */
.captcha-container .x-input-with-label-element {
    flex-grow: 1; /* Allow the input to take up remaining space */
}

/* If x-input-with-label-element renders a standard input directly: */
.captcha-container input[type="text"]#captcha_paynow,
.captcha-container input[type="text"]#captcha_enquiry {
    flex-grow: 1; /* Allow the input to take up remaining space */
}

.captcha-container .captcha-refresh {
    flex-shrink: 0; /* Prevent the refresh button from shrinking */
}

.captcha-container .captcha-refresh button {
    background-color: var(--bs-cyan); /* Using your defined color */
    color: white;
    border: none;
    border-radius: 5px;
    padding: 8px 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex; /* Use flex for icon alignment inside button if needed */
    align-items: center;
    justify-content: center;
    height: 40px; /* Match input height for better alignment */
    width: 40px; /* Make it a square button */
}

.captcha-container .captcha-refresh button:hover {
    background-color: darken(var(--bs-cyan), 10%); /* Adjust hover color */
    /* If you don't have Sass/Less, use a specific hex like: #0056b3; */
}

/* Ensure the "Book Now" and "Send Enquiry" buttons are full width within their form groups */
.form-group button[type="submit"] {
    width: 100%; /* Make the submit button span the full width */
    padding: 15px;
    background-color: navy;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.form-group button[type="submit"]:hover {
    background-color: rgb(169, 169, 225), 10%); /* Adjust hover color */
    /* Or a fixed color, e.g., #e05c00; */
}

/* --- Media Queries --- */
@media(max-width:992px) {
    .destination-details .container {
        padding: 0px;
    }
}

@media(max-width:768px) {
    .destination-details .container {
        padding: 0px;
    }
}

@media (max-width:460px) {
    .event-collarge-container {
        display: block;
    }
    .destination-details .container {
        padding: 0px;
    }
    .enquiry-send-form .tabBtns {
        flex-direction: column; /* Stack buttons on small screens */
    }
    .enquiry-send-form .tab-button {
        width: 100%;
        margin-bottom: 5px; /* Space between stacked buttons */
    }
}


    /* expand part */

    .package-description-container {

    position: relative;
    width: 100%;
}

.package-description {
    max-height: 190px;
    overflow: hidden;
    transition: max-height 0.4s ease-in-out;
}

.package-description.expanded {
    max-height: 1200px;
}

.toggle-description {
    display: flex;
    justify-content: center;
    background: none;
    border: none;
    color: blue;
    cursor: pointer;
    margin-top: 5px;
    font-size: 16px;
}

.toggle-description:hover {
    text-decoration: underline;
}



    /* expand part */

.cs_tour_gallery .cs_gallery_img img {
    /* width: 100%; */
    max-height: 300px !important;
    min-height: 300px !important;
    max-width: 319px !important;
    min-width: 319px !important;
    /* height: 100%; */
    object-fit: cover;
    border-radius: inherit;
}
.cs_grid_3 .cs_gallery_item img {
    display: block;
    max-height: 250px !important;
    min-height: 250px !important;
    max-width: 300px !important;
    min-width: 300px !important;
    /* width: 100%; */
    /* height: 100%; */
    object-fit: cover;
}
.tour-include-exclude {
    border-radius: 10px;
    padding: 35px 50px 28px;
    border: 1px solid grey;
}
.list-style-one li {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 12px;
}.tour-include-exclude .check li i {
    color: var(--primary-color);
}
.tour-include-exclude .check li i {
    color: var(--primary-color);
}
.cross li i {
    font-size: 18px;
    margin-right: 15px;
    /* color: green; */
    color: red;
}
.tour-include-exclude .check li i {
    color: #63ab45;
    font-size: 18px;
    margin-right: 15px;
}

/* expand of 2 part */

.package-included-list li.hidden {
    display: none;
}

.toggle-included-btn {
    background: none;
    border: none;
    color: blue;
    cursor: pointer;
    font-size: 16px;
    margin-top: 5px;
}

.toggle-included-btn:hover {
    text-decoration: underline;
}

.package-excluded-list li.hidden {
    display: none;
}

.toggle-excluded-btn {
    background: none;
    border: none;
    color: blue;
    cursor: pointer;
    font-size: 16px;
    margin-top: 5px;
}

.toggle-excluded-btn:hover {
    text-decoration: underline;
}


/* accordian */

.accordion-button {
    display: flex;
    justify-content: space-between;
    width: 100%;
    align-items: center;
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
}

.dropdown-icon {
    transition: transform 0.3s ease;
}

.accordion-button:not(.collapsed) .dropdown-icon {
    transform: rotate(180deg);
}


/* expand of 2nd part */



/* map-container */
.map-container {
    background-color: #f0f0f0;
    padding: 30px;
    border: 1px solid white;
    overflow: hidden;
    margin-top: 80px;
    width: 100%;
    max-width: 600px;
    /* border-radius: 12px; */
}

.map-container iframe {
    width: 100%;
    height: 400px;
    display: block;
    /* border-radius: 10px; */
}

/* Media Query for Tablets */
@media (max-width: 768px) {
    .map-container {
        padding: 20px;
        margin-top: 50px;
        max-width: 100%;
    }

    .map-container iframe {
        height: 350px;
    }
}

/* Media Query for Mobile Devices */
@media (max-width: 480px) {
    .map-container {
        padding: 15px;
        margin-top: 30px;
    }

    .map-container iframe {
        height: 300px;
    }
}



/* map-container */

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

<script>

document.addEventListener('DOMContentLoaded', function() {
    // Function to show a specific tab and manage active button state
    window.showTab = function(tabIndex) {
        // Get all tab content elements
        var tabContents = document.querySelectorAll('.tab-content');
        // Get all tab buttons
        var tabButtons = document.querySelectorAll('.tab-button');

        // Hide all tab contents
        tabContents.forEach(function(content) {
            content.style.display = 'none';
        });

        // Remove 'active' class from all tab buttons
        tabButtons.forEach(function(button) {
            button.classList.remove('active');
        });

        // Show the selected tab content
        var selectedTab = document.getElementById('tab' + tabIndex);
        if (selectedTab) {
            selectedTab.style.display = 'block';
        }

        // Add 'active' class to the corresponding button
        // Assuming tabIndex 1 corresponds to the first button, 2 to the second
        if (tabButtons[tabIndex - 1]) {
            tabButtons[tabIndex - 1].classList.add('active');
        }
    }

    // Initialize: Show the first tab (Pay Now) and set its button as active when the page loads
    showTab(1);

    // Your existing refreshCapthca function (ensure it's globally accessible if used like this)
    // Make sure this function correctly updates the src attribute of the image
    // and clears the input field based on the provided IDs.
    // Example:
    window.refreshCapthca = function(imgId, inputId) {
        var captchaImage = document.getElementById(imgId);
        var captchaInput = document.getElementById(inputId); // Assuming you want to clear the input
        if (captchaImage) {
            // Appends a new timestamp to the captcha image URL to force a refresh
            captchaImage.src = captchaImage.src.split('?')[0] + '?' + new Date().getTime();
        }
        if (captchaInput) {
            captchaInput.value = ''; // Clear the captcha input field
        }
    };
});



    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.querySelector(".toggle-description");
        const description = document.querySelector(".package-description");

        toggleBtn.addEventListener("click", function() {
            description.classList.toggle("expanded");
            toggleBtn.textContent = description.classList.contains("expanded") ? "Show Less" : "Show More";
        });
    });
    </script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.querySelector(".toggle-included-btn");
        const hiddenItems = document.querySelectorAll(".package-included-list li.hidden");

        if (toggleBtn) {
            toggleBtn.addEventListener("click", function() {
                hiddenItems.forEach(item => {
                    item.classList.toggle("hidden");
                });
                toggleBtn.textContent = hiddenItems[0].classList.contains("hidden") ? "Show More" : "Show Less";
            });
        }
    });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.querySelector(".toggle-excluded-btn");
        const hiddenItems = document.querySelectorAll(".package-excluded-list li.hidden");

        if (toggleBtn) {
            toggleBtn.addEventListener("click", function() {
                hiddenItems.forEach(item => {
                    item.classList.toggle("hidden");
                });
                toggleBtn.textContent = hiddenItems[0].classList.contains("hidden") ? "Show More" : "Show Less";
            });
        }
    });
    </script>






@endsection

