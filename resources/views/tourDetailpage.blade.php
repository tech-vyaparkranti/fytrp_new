@extends('layout.layout')
@section('title', $package->meta_title)
@section('meta_description', $package->meta_description)
@section('meta_keywords', $package->meta_keyword)
@section('content')

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
                                    {{-- <input type="text"  rows="5" id="message" name="message" placeholder="Message" class="cs_form_field cs_radius_5" required> --}}
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

