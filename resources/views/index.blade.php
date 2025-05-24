@extends('layout.layout')
@section('title', 'Book365days')
@section('content')
    {{-- <body> --}}

    <x-preloader />


<!-- Start Header Section -->
{{-- <header class="cs_site_header cs_style_1 cs_color_1 cs_fs_18 cs_sticky_header">
  <div class="cs_top_header cs_accent_bg">
    <div class="cs_top_header_in">
      <div class="cs_top_header_left">
        <ul class="cs_top_header_list cs_mp0">
          <li><b>Address: </b>3517 W. Gray St. Utica, Pennsylvania 57867</li>
          <li>info@company.com</li>
        </ul>
      </div>
      <div class="cs_top_header_right">
        <ul class="cs_top_header_list cs_mp0">
          <li><a href="#">Help</a></li>
          <li><a href="#">Support</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="cs_main_header">
    <div class="cs_main_header_in">
      <div class="cs_main_header_left">
        <a class="cs_site_branding" href="{{ route('index') }}">
          <img src="assets/images/logo_2.svg" alt="Logo">
        </a>
      </div>
      <div class="cs_main_header_center">
        <div class="cs_nav cs_medium cs_primary_font">
          <ul class="cs_nav_list">
            <li class="menu-item-has-children">
              <a href=" {{ route('index') }}">Home</a>
              <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('index2') }}">Home v2</a></li>
                <li><a href="{{ route('index3') }}">Home v3</a></li>
              </ul>
            </li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li class="menu-item-has-children">
              <a href="{{ route('destination') }}">Destinations</a>
              <ul>
                <li><a href="{{ route('destination') }}">Destination</a></li>
                <li><a href="{{ route('destinationdetails') }}">Destination Details</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="{{ route('tour') }}">Tours</a>
              <ul>
                <li><a href="{{ route('tour') }}">Tour</a></li>
                <li><a href="{{ route('tourdetails') }}">Tour Details</a></li>
              </ul>
            </li>
            <li class="menu-item-has-children">
              <a href="{{ route('blog') }}">Blog</a>
              <ul>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('blogdetails') }}">Blog Details</a></li>
              </ul>
            </li>
            <li><a href="{{ route('contact') }}">Contacts</a></li>
          </ul>
        </div>
      </div>
      <div class="cs_main_header_right">
        <div class="cs_header_toolbox">
          <div>
            <button class="cs_search_btn cs_fs_24" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
          <div class="cs_fs_20 cs_medium">+8 (123) 985 789</div>
        </div>
      </div>
    </div>
  </div>
</header>
<x-header_search/> --}}
<!-- End Header Section -->

<!-- Start Hero Section -->
{{-- <section class="cs_hero cs_style_2 cs_accent_bg_1">
  <div class="cs_hero_in">
    <div class="cs_hero_img"><img src="assets/images/hero_2.png" alt="Hero Thumb"></div>
    <div class="cs_hero_text">
      <h3 class="cs_hero_mini_title cs_fs_24 cs_semibold cs_accent_color wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Find Next PlaceTo Visit</h3>
      <h1 class="cs_hero_title cs_fs_85 cs_semibold">Tour Travel & Adventure Camping</h1>
      <p class="cs_hero_desc cs_fs_18">Denouncing pleasure and praising pain was born and will give you complete great explorer of the truth the master-builder.</p>
      <div class="cs_button_group">
        <a href="{{ route('about') }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold">
          Read More
          <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z" fill="currentColor"/><path d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z" fill="currentColor"/>
          </svg>
        </a>
        <div class="cs_hero_ratings wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">
          <div class="cs_hero_rating_icon">
            <img src="assets/images/icons/google_icon.svg" alt="Icom">
          </div>
          <div class="cs_rating_container">
            <div class="cs_rating" data-rating="4.9">
              <div class="cs_rating_percentage"></div>
            </div>
            <div class="cs_rating_text cs_fs_25 cs_normal">4.9 Rating</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="animated-icon-wrap">
    <div class="animated-icon"><i class="fa-solid fa-location-dot"></i></div>
    <div class="animated-icon"><i class="fa-solid fa-car"></i></div>
    <div class="animated-icon"><i class="fa-solid fa-plane"></i></div>
    <div class="animated-icon"><i class="fa-solid fa-globe"></i></div>
    <div class="animated-icon"><i class="fa-solid fa-earth-americas"></i></div>
    <div class="animated-icon"><i class="fa-regular fa-compass"></i></div>
    <div class="animated-icon"><i class="fa-solid fa-hotel"></i></div>
  </div>
</section> --}}


    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> --}}


    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> --}}

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> --}}


    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> --}}
    <style>
        .hero-section {
            background: linear-gradient(135deg, #e8f4f8 0%, #f8f9fa 100%);
            padding: 110px 0;
            min-height: 100vh;
        }

        .main-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .subtitle {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .search-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 8px;
            padding: 15px;
            border: 1px solid #e9ecef;
            margin-bottom: 20px;
        }

        .search-btn {
            background: #dc3545;
            border: none;
            padding: 15px 40px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        /* Tour cards container - FIXED */
        .tour-grid-container {
            position: relative;
            overflow: hidden;
            min-height: 450px; /* Changed from fixed height to min-height */
            height: auto; /* Allow dynamic height */
        }

        .tour-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 100%;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Adjusted heights for better visibility */
        .tour-grid-item:nth-child(3n-2) .tour-card { height: 300px; }
        .tour-grid-item:nth-child(3n-1) .tour-card { height: 340px; }
        .tour-grid-item:nth-child(3n) .tour-card { height: 380px; }

        .tour-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }

        .tour-card.visible {
            opacity: 1;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .tour-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .tour-image {
            height: 45%; /* Reduced slightly to ensure content fits */
            background-size: cover;
            background-position: center;
            position: relative;
            flex-shrink: 0;
            min-height: 120px; /* Ensure minimum image height */
        }

        .nights-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #ff8c00;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .tour-content {
            padding: 15px; /* Reduced padding slightly */
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .tour-title {
            font-size: 1rem; /* Slightly smaller */
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .tour-icons {
            display: flex;
            gap: 6px; /* Reduced gap */
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .tour-icon {
            width: 22px; /* Slightly smaller */
            height: 22px;
            background: #f8f9fa;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.7rem;
        }

        .price-section {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: auto;
        }

        .original-price {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.85rem;
        }

        .current-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #28a745;
        }

        /* Card color themes */
        .georgia-card {
            background: linear-gradient(45deg, #4a90e2, #7b68ee);
        }

        .almaty-card {
            background: linear-gradient(45deg, #4a90e2, #5dade2);
        }

        .tbilisi-card {
            background: linear-gradient(45deg, #d4a574, #cd853f);
        }

        .baku-card {
            background: linear-gradient(45deg, #8fbc8f, #228b22);
        }

        .dubai-card {
            background: linear-gradient(45deg, #ff6b6b, #ee5a24);
        }

        .istanbul-card {
            background: linear-gradient(45deg, #6c5ce7, #a29bfe);
        }

        .colored-card .tour-content {
            background: rgba(0,0,0,0.8);
            color: white;
            margin: 0;
        }

        .colored-card .tour-title {
            color: white;
        }

        .colored-card .current-price {
            color: #ffd700;
        }

        .colored-card .tour-icon {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        /* Navigation indicators */
        .tour-indicators {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #dee2e6;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator.active {
            background: #dc3545;
            transform: scale(1.2);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .tour-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .tour-grid-item .tour-card {
                height: 320px !important;
            }

            .tour-grid-container {
                min-height: 350px;
            }
        }

        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5rem;
            }

            .hero-section {
                padding: 60px 0;
            }

            .tour-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .tour-grid-item .tour-card {
                height: 280px !important;
            }

            .tour-grid-container {
                min-height: 300px;
            }

            .tour-image {
                height: 140px;
                min-height: 140px;
            }
        }
    </style>

    <div class="hero-section"  >
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <p class="text-danger fw-bold mb-3">Discover Flights, Hotels, and Tour Packages</p>
                    <h1 class="main-title">Journey Across the Globe</h1>
                    <p class="subtitle">Want to escape the daily loop? Plan your trip with Dook International - your gateway to extraordinary travel experiences!</p>

                    <div class="search-box">
                        <h6 class="mb-3">Destination</h6>
                        <input type="text" class="form-control" placeholder="Search for Destinations, Attractions, Activities, Experiences & Countries...">
                        <p class="text-muted small mb-3">Where are you going?</p>
                        <button class="search-btn">Search</button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="tour-grid-container">
                        <div class="tour-grid" id="tourGrid">
                            <!-- Initial 6 cards -->
                            <div class="tour-grid-item">
                                <div class="tour-card georgia-card colored-card visible">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">6 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Treasures of Georgia and Armenia</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,21,108</span>
                                            <span class="current-price">₹1,15,417</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item">
                                <div class="tour-card almaty-card colored-card visible">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">6 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Almaty and Baku Group Tour</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                            <div class="tour-icon"><i class="fas fa-users"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,15,490</span>
                                            <span class="current-price">₹1,09,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item">
                                <div class="tour-card tbilisi-card colored-card visible">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1578321272176-b7bbc0679853?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">6 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Tbilisi & Batumi Highlights</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,03,436</span>
                                            <span class="current-price">₹98,510</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item">
                                <div class="tour-card almaty-card colored-card visible">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1590736969955-71cc94901144?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">6 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Almaty Special Package</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                            <div class="tour-icon"><i class="fas fa-users"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,15,490</span>
                                            <span class="current-price">₹1,09,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item">
                                <div class="tour-card baku-card colored-card visible">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1580837119756-563d608dd119?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">6 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Baku Adventure Tour</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                            <div class="tour-icon"><i class="fas fa-users"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,15,490</span>
                                            <span class="current-price">₹1,09,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item">
                                <div class="tour-card georgia-card colored-card visible">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">6 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Georgia Heritage Experience</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                            <div class="tour-icon"><i class="fas fa-users"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,15,490</span>
                                            <span class="current-price">₹1,09,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional cards that will cycle in -->
                            <div class="tour-grid-item" style="display: none;">
                                <div class="tour-card dubai-card colored-card">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">5 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Dubai Desert Safari & City Tour</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹95,000</span>
                                            <span class="current-price">₹89,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item" style="display: none;">
                                <div class="tour-card istanbul-card colored-card">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1541432901042-2d8bd64b4a9b?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">7 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Istanbul & Cappadocia Wonder</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                            <div class="tour-icon"><i class="fas fa-camera"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,25,000</span>
                                            <span class="current-price">₹1,19,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tour-grid-item" style="display: none;">
                                <div class="tour-card tbilisi-card colored-card">
                                    <div class="tour-image" style="background-image: url('https://images.unsplash.com/photo-1539650116574-75c0c6d73c4e?w=400&h=200&fit=crop');">
                                        <div class="nights-badge">8 Nights</div>
                                    </div>
                                    <div class="tour-content">
                                        <h5 class="tour-title">Silk Road Explorer Package</h5>
                                        <div class="tour-icons">
                                            <div class="tour-icon"><i class="fas fa-plane"></i></div>
                                            <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                                            <div class="tour-icon"><i class="fas fa-car"></i></div>
                                            <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                                            <div class="tour-icon"><i class="fas fa-mountain"></i></div>
                                        </div>
                                        <div class="price-section">
                                            <span class="original-price">₹1,35,000</span>
                                            <span class="current-price">₹1,29,990</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tour-indicators" id="tourIndicators">
                        <div class="indicator active" data-slide="0"></div>
                        <div class="indicator" data-slide="1"></div>
                        <div class="indicator" data-slide="2"></div>
                        <div class="indicator" data-slide="3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Search functionality
        document.querySelector('.search-btn').addEventListener('click', function() {
            const destination = document.querySelector('.form-control').value;
            if (destination.trim()) {
                alert(`Searching for tours to: ${destination}`);
            } else {
                alert('Please enter a destination to search');
            }
        });

        // Enter key functionality for search
        document.querySelector('.form-control').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.querySelector('.search-btn').click();
            }
        });

        // Auto-cycling tour cards functionality
        class TourCarousel {
            constructor() {
                this.currentSlide = 0;
                this.totalSlides = 4; // We have 4 different sets to show
                this.slideInterval = 4000; // 4 seconds
                this.allCards = document.querySelectorAll('.tour-grid-item');
                this.indicators = document.querySelectorAll('.indicator');
                this.isTransitioning = false;

                this.init();
            }

            init() {
                // Start auto-cycling after initial 6 cards are shown
                setTimeout(() => {
                    this.startAutoCycle();
                }, 3000);

                // Add indicator click handlers
                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => {
                        if (!this.isTransitioning) {
                            this.goToSlide(index);
                        }
                    });
                });
            }

            startAutoCycle() {
                setInterval(() => {
                    if (!this.isTransitioning) {
                        this.nextSlide();
                    }
                }, this.slideInterval);
            }

            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                this.updateSlide();
            }

            goToSlide(slideIndex) {
                this.currentSlide = slideIndex;
                this.updateSlide();
            }

            updateSlide() {
                if (this.isTransitioning) return;

                this.isTransitioning = true;

                // Update indicators
                this.indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === this.currentSlide);
                });

                // Hide all cards first
                this.allCards.forEach(card => {
                    card.style.display = 'none';
                    card.querySelector('.tour-card').classList.remove('visible');
                });

                // Determine which cards to show based on current slide
                let cardsToShow = [];

                switch(this.currentSlide) {
                    case 0:
                        // Original 6 cards
                        cardsToShow = [0, 1, 2, 3, 4, 5];
                        break;
                    case 1:
                        // Cycle in card 6 (Dubai), keep others
                        cardsToShow = [6, 1, 2, 3, 4, 5];
                        break;
                    case 2:
                        // Cycle in card 7 (Istanbul), shift others
                        cardsToShow = [6, 7, 2, 3, 4, 5];
                        break;
                    case 3:
                        // Cycle in card 8 (Silk Road), shift others
                        cardsToShow = [6, 7, 8, 3, 4, 5];
                        break;
                }

                // Show selected cards with staggered animation
                cardsToShow.forEach((cardIndex, position) => {
                    if (this.allCards[cardIndex]) {
                        setTimeout(() => {
                            this.allCards[cardIndex].style.display = 'block';

                            // Trigger reflow
                            this.allCards[cardIndex].offsetHeight;

                            setTimeout(() => {
                                this.allCards[cardIndex].querySelector('.tour-card').classList.add('visible');
                            }, 50);
                        }, position * 100);
                    }
                });

                // Reset transition flag
                setTimeout(() => {
                    this.isTransitioning = false;
                }, 800);
            }
        }

        // Initialize the carousel when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            new TourCarousel();

            // Add hover effects to visible cards
            document.addEventListener('mouseover', function(e) {
                if (e.target.closest('.tour-card')) {
                    e.target.closest('.tour-card').style.transform = 'translateY(-8px)';
                }
            });

            document.addEventListener('mouseout', function(e) {
                if (e.target.closest('.tour-card')) {
                    e.target.closest('.tour-card').style.transform = 'translateY(0)';
                }
            });
        });
    </script>


<!-- End Destination Section -->



{{-- updated new code start --}}

{{-- updated old code --}}



<!-- Start Package Section -->
<section>
  <div class="cs_height_135 cs_height_lg_75"></div>
  <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">CHOOSE YOUR PACKAGE</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Popular Tours Packages</h2>
    </div>
    <div class="cs_height_55 cs_height_lg_40"></div>
  </div>
  <div class="container">
    <div class="row cs_gap_y_30">
      <div class="col-lg-4">
        <div class="cs_card cs_style_3 cs_white_bg">
          <a href="{{ route('tourdetails') }}" class="cs_card_thumb position-relative cs_zoom">
            <img src="assets/images/package_img_5.jpeg" alt="Package Thumb" class="cs_zoom_in">
            <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
          </a>
          <div class="cs_card_content">
            <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourdetails') }}">Beauty of Solomon Island</a></h2>
            <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Africa Portugal Mexico</p>
            <hr>
            <div class="cs_card_action">
              <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
              <a href="{{ route('tourdetails') }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cs_card cs_style_3 cs_white_bg">
          <a href="{{ route('tourdetails') }}" class="cs_card_thumb position-relative cs_zoom">
            <img src="assets/images/package_img_6.jpeg" alt="Package Thumb" class="cs_zoom_in">
            <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
          </a>
          <div class="cs_card_content">
            <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourdetails') }}">Believe In Your Mexico</a></h2>
            <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> New York City, USA</p>
            <hr>
            <div class="cs_card_action">
              <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
              <a href="{{ route('tourdetails') }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cs_card cs_style_3 cs_white_bg">
          <a href="{{ route('tourdetails') }}" class="cs_card_thumb position-relative cs_zoom">
            <img src="assets/images/package_img_7.jpeg" alt="Package Thumb" class="cs_zoom_in">
            <div class="cs_package_badge cs_fs_18 cs_semibold cs_primary_color cs_primary_font position-absolute">3 Day 2 Night</div>
          </a>
          <div class="cs_card_content">
            <h2 class="cs_card_title cs_fs_24 cs_semibold"><a href="{{ route('tourdetails') }}">Proof That Bahamas Beaty</a></h2>
            <p class="cs_card_subtitle mb-0"><i class="fa-solid fa-globe cs_accent_color"></i> Machu Picchu, Peru</p>
            <hr>
            <div class="cs_card_action">
              <span class="cs_card_price cs_fs_24 cs_semibold cs_primary_color cs_primary_font mb-0">$4500</span>
              <a href="{{ route('tourdetails') }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold"> Book Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>
<!-- End Package Section -->

<!-- Start CTA Section -->
<section class="cs_cta cs_style_1 cs_bg_filed cs_primary_bg cs_bg_fixed" data-src="assets/images/banner_bg_2.jpeg">
  <div class="cs_height_150 cs_height_lg_80"></div>
  <div class="container">
    <div class="row cs_gap_y_40">
      <div class="col-lg-6">
        <div class="cs_cta_text">
          <h3 class="cs_cta_title_mini cs_fs_24 cs_medium cs_white_color cs_ternary_font wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">27% DISCOUNT OFFER </h3>
          <h2 class="cs_cta_title cs_fs_56 cs_bold cs_white_color">Discount Popup Examples to Elevate</h2>
          <p class="cs_cta_subtitle cs_fs_18 cs_white_color">Denouncing pleasure and praising pain was born and will give you <br> complete great explorer of the truth the master-builder.</p>
          <a href="" class="cs_btn cs_style_1 cs_fs_18 cs_semibold">
            Read More
            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z" fill="currentColor"/><path d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z" fill="currentColor"/>
            </svg>
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="cs_partners_wrap overflow-hidden">
          <div class="cs_partners">
            <div class="cs_partner">
              <img src="assets/images/brand_6.png" alt="Brand Logo">
            </div>
            <div class="cs_partner">
              <img src="assets/images/brand_7.png" alt="Brand Logo">
            </div>
            <div class="cs_partner">
              <img src="assets/images/brand_8.png" alt="Brand Logo">
            </div>
            <div class="cs_partner">
              <img src="assets/images/brand_9.png" alt="Brand Logo">
            </div>
            <div class="cs_partner">
              <img src="assets/images/brand_10.png" alt="Brand Logo">
            </div>
            <div class="cs_partner">
              <img src="assets/images/brand_11.png" alt="Brand Logo">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs_height_150 cs_height_lg_80"></div>
</section>
<!-- End CTA Section -->

<!-- Start Why Choose Us Section -->
<section>
  <div class="cs_height_135 cs_height_lg_75"></div>
  <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">Why Choose Us</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Get The Best Travel Experience</h2>
    </div>
    <div class="cs_height_55 cs_height_lg_40"></div>
    <div class="cs_iconbox_4_wrap">
      <div>
        <div class="row cs_gap_y_45">
          <div class="col-lg-12 col-6">
            <div class="cs_iconbox cs_style_4">
              <div class="cs_iconbox_icon cs_center">
                <img src="assets/images/icons/calendar_icon_2.svg" alt="Calendar Icon">
              </div>
              <h2 class="cs_iconbox_title cs_fs_24 cs_semibold">Set Travel Plan</h2>
              <p class="cs_iconbox_subtitle mb-0">Distinctively impact client-centered ideas via future-proof paradigms.</p>
            </div>
          </div>
          <div class="col-lg-12 col-6">
            <div class="cs_iconbox cs_style_4">
              <div class="cs_iconbox_icon cs_center">
                <img src="assets/images/icons/hotel-icon.svg" alt="Hotel Icon">
              </div>
              <h2 class="cs_iconbox_title cs_fs_24 cs_semibold">Luxary Hotel</h2>
              <p class="cs_iconbox_subtitle mb-0">Distinctively impact client-centered ideas via future-proof paradigms.</p>
            </div>
          </div>
        </div>
      </div>
      <div>
        <div class="cs_iconbox_4_thumb cs_center">
          <img src="assets/images/about_4.png" alt="About Thumb">
        </div>
      </div>
      <div>
        <div class="row cs_gap_y_45">
          <div class="col-lg-12 col-6">
            <div class="cs_iconbox cs_style_4">
              <div class="cs_iconbox_icon cs_center">
                <img src="assets/images/icons/compass_icon.svg" alt="Calendar Icon">
              </div>
              <h2 class="cs_iconbox_title cs_fs_24 cs_semibold">Explore Around</h2>
              <p class="cs_iconbox_subtitle mb-0">Distinctively impact client-centered ideas via future-proof paradigms.</p>
            </div>
          </div>
          <div class="col-lg-12 col-6">
            <div class="cs_iconbox cs_style_4">
              <div class="cs_iconbox_icon cs_center">
                <img src="assets/images/icons/headset_icon.svg" alt="Hotel Icon">
              </div>
              <h2 class="cs_iconbox_title cs_fs_24 cs_semibold">Support 24/7</h2>
              <p class="cs_iconbox_subtitle mb-0">Distinctively impact client-centered ideas via future-proof paradigms.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs_height_135 cs_height_lg_75"></div>
</section>
<!-- End Why Choose Us Section -->

<!-- Start Destination Section -->
<section class="cs_accent_bg_1">
  <div class="cs_height_135 cs_height_lg_75"></div>
  <div class="container">
    <div class="cs_section_heading cs_style_1">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">POPULAR DESTINATION</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">Most Popular Destination</h2>
    </div>
    <div class="cs_height_55 cs_height_lg_40"></div>
    <div class="cs_card_4_list">
      <div class="cs_card cs_style_4 cs_hover_active active">
        <a href="{{ route('tourdetails') }}" class="cs_card_thumb cs_bg_filed" data-src="https://cdn.pixabay.com/photo/2022/01/01/16/29/antelope-6908215_1280.jpg"></a>
        <a href="{{ route('tourdetails') }}" class="cs_card_icon cs_center position-absolute"><i class="fa-solid fa-chevron-right"></i></a>
        <div class="cs_card_in">
          <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0"><a href="{{ route('tourdetails') }}">Copenhagen,<br> Denmark</a></h2>
        </div>
      </div>
      <div class="cs_card cs_style_4 cs_hover_active">
        <a href="{{ route('tourdetails') }}" class="cs_card_thumb cs_bg_filed" data-src="https://cdn.pixabay.com/photo/2022/01/01/16/29/antelope-6908215_1280.jpg"></a>
        <a href="{{ route('tourdetails') }}" class="cs_card_icon cs_center position-absolute"><i class="fa-solid fa-chevron-right"></i></a>
        <div class="cs_card_in">
          <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0"><a href="{{ route('tourdetails') }}">California,<br> USA</a></h2>
        </div>
      </div>
      <div class="cs_card cs_style_4 cs_hover_active">
        <a href="{{ route('tourdetails') }}" class="cs_card_thumb cs_bg_filed" data-src="https://cdn.pixabay.com/photo/2025/02/09/12/19/lake-9394214_1280.jpg"></a>
        <a href="{{ route('tourdetails') }}" class="cs_card_icon cs_center position-absolute"><i class="fa-solid fa-chevron-right"></i></a>
        <div class="cs_card_in">
          <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0"><a href="{{ route('tourdetails') }}">Rome,<br> Italy</a></h2>
        </div>
      </div>
      <div class="cs_card cs_style_4 cs_hover_active">
        <a href="{{ route('tourdetails') }}" class="cs_card_thumb cs_bg_filed" data-src="https://cdn.pixabay.com/photo/2021/10/14/12/32/autumn-6708984_1280.jpg"></a>
        <a href="{{ route('tourdetails') }}" class="cs_card_icon cs_center position-absolute"><i class="fa-solid fa-chevron-right"></i></a>
        <div class="cs_card_in">
          <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0"><a href="{{ route('tourdetails') }}">London,<br> United Lingdom</a></h2>
        </div>
      </div>
      <div class="cs_card cs_style_4 cs_hover_active">
        <a href="{{ route('tourdetails') }}" class="cs_card_thumb cs_bg_filed" data-src="https://cdn.pixabay.com/photo/2025/01/01/14/48/bird-9303900_1280.jpg"></a>
        <a href="{{ route('tourdetails') }}" class="cs_card_icon cs_center position-absolute"><i class="fa-solid fa-chevron-right"></i></a>
        <div class="cs_card_in">
          <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0"><a href="{{ route('tourdetails') }}">Paris,<br> French</a></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>
<!-- End Destination Section -->


{{-- updated old code end here --}}

{{-- updated new code end  --}}


{{-- package card start --}}


    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}

<style>
    .tours-container {
        background: white;
        padding: 40px 20px;
        margin: 20px auto;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1);
        max-width: 1400px;
        position: relative;
        overflow: hidden;
    }

    .tours-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #e74c3c, #f39c12, #e74c3c);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin: 0;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #e74c3c, #f39c12);
        border-radius: 2px;
    }

    .view-all {
        color: #e74c3c;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        border: 2px solid #e74c3c;
        border-radius: 30px;
        transition: all 0.3s ease;
        background: transparent;
    }

    .view-all:hover {
        background: #e74c3c;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
    }

    .carousel-container {
        position: relative;
        overflow: hidden;
        padding: 0 70px;
    }

    .tour-card-2 {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: all 0.4s ease;
        position: relative;
        height: 450px;
        width: 300px;
        display: flex;
        flex-direction: column;
        border: 2px solid transparent;
        cursor: pointer;
        margin: 0 12px;
    }

    .tour-card-2:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
        border: 2px solid #e74c3c;
    }

    .card-image {
        position: relative;
        height: 35%;
        overflow: hidden;
        flex: 0 0 35%;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .tour-card-2:hover .card-image img {
        transform: scale(1.1);
    }

    .best-selling {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        padding: 8px 16px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 25px;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        z-index: 2;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .card-content {
        padding: 5px 15px;
        height: 30%;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .card-title {
        font-size: 13px;
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 10px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .duration {
        color: #7f8c8d;
        font-size: 14px;
        margin-bottom: 12px;
        font-weight: 500;
    }

    .rating {
        margin-bottom: 15px;
    }

    .stars {
        color: #f39c12;
        font-size: 16px;
        text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    }

    .tour-icons {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
        justify-content: center;
    }

    .tour-icon {
        width: 28px;
        height: 28px;
        opacity: 0.7;
        transition: all 0.3s ease;
        font-size: 20px;
    }

    .tour-card-2:hover .tour-icon {
        opacity: 1;
        transform: scale(1.1);
    }

    .pricing {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        padding: 5px;
        border-radius: 10px;
        margin-top: 2px;
    }

    .original-price {
        text-decoration: line-through;
        color: #95a5a6;
        font-size: 14px;
        font-weight: 500;
    }

    .current-price {
        color: #27ae60;
        font-size: 22px;
        font-weight: 800;
    }

    .discount-badge {
        background: #e74c3c;
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 600;
    }

    .carousel-control-prev, .carousel-control-next {
        width: 30px;
        height: 30px;
        background: rgba(255,255,255,0.95);
        border: 3px solid #e74c3c;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        backdrop-filter: blur(5px);
    }

    .carousel-control-prev:hover, .carousel-control-next:hover {
        background: #e74c3c;
        box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-control-prev:hover .carousel-control-prev-icon,
    .carousel-control-next:hover .carousel-control-next-icon {
        filter: brightness(0) invert(1);
    }

    .carousel-control-prev {
        left: 15px;
    }

    .carousel-control-next {
        right: 15px;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-image: none;
        color: #e74c3c;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousel-control-prev-icon:before {
        content: '\f053';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
    }

    .carousel-control-next-icon:before {
        content: '\f054';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .tour-card-2 {
            min-width: calc(33.333% - 24px);
        }
    }

    @media (max-width: 768px) {
        .tour-card-2 {
            min-width: calc(50% - 24px);
        }

        .section-title {
            font-size: 26px;
        }

        .carousel-container {
            padding: 0 50px;
        }

        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            font-size: 16px;
        }
    }

    @media (max-width: 576px) {
        .tour-card-2 {
            min-width: calc(100% - 24px);
        }

        .section-header {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }

        .tours-container {
            padding: 30px 15px;
            margin: 10px;
        }

        .carousel-container {
            padding: 0 40px;
        }

        .section-title {
            font-size: 24px;
        }
    }
</style>

<div class="tours-container">
    <div class="section-header">
        <h2 class="section-title">Browse Our Group Tours</h2>
        <a href="#" class="view-all">
            View All <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <div class="carousel-container">
        <div id="tourCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <!-- Slide 1 (4 cards) -->
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        <!-- Card 1 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1600298881974-6be191ceeda1?w=400&h=250&fit=crop" alt="Treasures of Georgia and Armenia">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Treasures of Georgia and Armenia</h3>
                                <div class="duration">7 Days 6 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-camera tour-icon" style="color: #f39c12;"></i>
                                    <i class="fas fa-mountain tour-icon" style="color: #27ae60;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹1,29,136</div>
                                        <div class="current-price">₹1,22,987</div>
                                    </div>
                                    <div class="discount-badge">5% OFF</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1600298881974-6be191ceeda1?w=400&h=250&fit=crop" alt="Ex Bom Almaty 4 Nights Group Tour">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Ex Bom Almaty 4 Nights Group Tour</h3>
                                <div class="duration">5 Days 4 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-mountain tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-plane tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #f39c12;"></i>
                                    <i class="fas fa-camera tour-icon" style="color: #27ae60;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹83,895</div>
                                        <div class="current-price">₹79,900</div>
                                    </div>
                                    <div class="discount-badge">5% OFF</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=400&h=250&fit=crop" alt="Almaty and Baku Group Tour">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Almaty and Baku Group Tour</h3>
                                <div class="duration">7 Days 6 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-camera tour-icon" style="color: #f39c12;"></i>
                                    <i class="fas fa-utensils tour-icon" style="color: #9b59b6;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹1,31,240</div>
                                        <div class="current-price">₹1,24,990</div>
                                    </div>
                                    <div class="discount-badge">5% OFF</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=250&fit=crop" alt="Tbilisi & Batumi Highlights">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Tbilisi & Batumi Highlights</h3>
                                <div class="duration">7 Days 6 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-camera tour-icon" style="color: #27ae60;"></i>
                                    <i class="fas fa-wine-glass tour-icon" style="color: #8e44ad;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹1,10,420</div>
                                        <div class="current-price">₹1,05,162</div>
                                    </div>
                                    <div class="discount-badge">5% OFF</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (4 cards) -->
                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <!-- Card 5 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1600298881974-6be191ceeda1?w=400&h=250&fit=crop" alt="Dubai Explorer Package">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Dubai Explorer Package</h3>
                                <div class="duration">5 Days 4 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-camera tour-icon" style="color: #f39c12;"></i>
                                    <i class="fas fa-shopping-bag tour-icon" style="color: #e67e22;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹65,000</div>
                                        <div class="current-price">₹58,999</div>
                                    </div>
                                    <div class="discount-badge">9% OFF</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 6 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1600298881974-6be191ceeda1?w=400&h=250&fit=crop" alt="Singapore Delight">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Singapore Delight</h3>
                                <div class="duration">4 Days 3 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-tree tour-icon" style="color: #27ae60;"></i>
                                    <i class="fas fa-star tour-icon" style="color: #f39c12;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹72,500</div>
                                        <div class="current-price">₹67,890</div>
                                    </div>
                                    <div class="discount-badge">6% OFF</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 7 -->
                        <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1600298881974-6be191ceeda1?w=400&h=250&fit=crop" alt="Singapore Delight">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Singapore Delight</h3>
                                <div class="duration">4 Days 3 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-tree tour-icon" style="color: #27ae60;"></i>
                                    <i class="fas fa-star tour-icon" style="color: #f39c12;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹72,500</div>
                                        <div class="current-price">₹67,890</div>
                                    </div>
                                    <div class="discount-badge">6% OFF</div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 8 (empty card to maintain layout) -->
                       <div class="tour-card-2">
                            <div class="card-image">
                                <img src="https://images.unsplash.com/photo-1600298881974-6be191ceeda1?w=400&h=250&fit=crop" alt="Singapore Delight">
                                <div class="best-selling">BEST SELLING</div>
                            </div>
                            <div class="card-content">
                                <h3 class="cs_card_title cs_fs_24 cs_semibold">Singapore Delight</h3>
                                <div class="duration">4 Days 3 Nights</div>
                                <div class="rating">
                                    <span class="stars">★★★★★</span>
                                </div>
                                <div class="tour-icons">
                                    <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
                                    <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
                                    <i class="fas fa-tree tour-icon" style="color: #27ae60;"></i>
                                    <i class="fas fa-star tour-icon" style="color: #f39c12;"></i>
                                </div>
                                <div class="pricing">
                                    <div>
                                        <div class="original-price">₹72,500</div>
                                        <div class="current-price">₹67,890</div>
                                    </div>
                                    <div class="discount-badge">6% OFF</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#tourCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#tourCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Initialize the carousel with autoplay
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = new bootstrap.Carousel(document.getElementById('tourCarousel'), {
            interval: 4000,
            wrap: true,
            touch: true
        });

        // Add hover effects
        document.querySelectorAll('.tour-card-2').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px)';
                this.style.boxShadow = '0 25px 50px rgba(0,0,0,0.2)';
                this.style.border = '2px solid #e74c3c';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '0 10px 30px rgba(0,0,0,0.1)';
                this.style.border = '2px solid transparent';
            });
        });
    });
</script>



{{-- pacakage card end  --}}


<!-- Start Team Section -->
 <section>
  <div class="cs_height_135 cs_height_lg_75"></div>
  <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">WHY TRAVEL WITH Flytrp</h3>
      {{-- <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Our Experts Team Member</h2> --}}
    </div>
    <div class="cs_height_55 cs_height_lg_40"></div>
    <div class="row cs_gap_y_30">
      <div class="col-lg-4">
        <div class="cs_team cs_style_1 position-relative">
          <div class="cs_team_thumb cs_zoom overflow-hidden">
            <img src="assets/images/team_1.jpeg" alt="Team Thumb" class="cs_zoom_in">
          </div>
          <div class="cs_team_info text-center position-absolute">
            <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color">David Cooper</h2>
           <p class="cs_team_subtitle cs_white_color">CO FOUNDER</p>

          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cs_team cs_style_1 position-relative">
          <div class="cs_team_thumb cs_zoom overflow-hidden">
            <img src="assets/images/team_2.jpeg" alt="Team Thumb" class="cs_zoom_in">
          </div>
          <div class="cs_team_info text-center position-absolute">
            <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color">David Cooper</h2>
           <p class="cs_team_subtitle cs_white_color">CO FOUNDER</p>

          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cs_team cs_style_1 position-relative">
          <div class="cs_team_thumb cs_zoom overflow-hidden">
            <img src="assets/images/team_3.jpeg" alt="Team Thumb" class="cs_zoom_in">
          </div>
          <div class="cs_team_info text-center position-absolute">
            <h2 class="cs_team_title cs_fs_24 cs_medium cs_white_color">David Cooper</h2>
           <p class="cs_team_subtitle cs_white_color">CO FOUNDER</p>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>
<!-- End Team Section -->


{{-- packages start new --}}


    {{-- <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    /> --}}
    <style>
      .hero-section {
        text-align: center;
        padding: 110px 0 40px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      }


      .hero-title {
        font-size: 2.5rem;
        color: #d4af37;
        font-weight: 300;
        margin-bottom: 10px;
        font-style: italic;
      }

      .hero-subtitle {
        font-size: 3rem;
        color: #6c757d;
        font-weight: 700;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
      }

      .hero-description {
        font-size: 1.1rem;
        color: #6c757d;
        max-width: 800px;
        margin: 0 auto 10px;
        line-height: 1.6;
      }

      .attraction-card {
        position: relative;
        height: 250px;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 20px;
      }

      .attraction-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      }

      .attraction-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /* background: linear-gradient(
          45deg,
          rgba(0, 0, 0, 0.7),
          rgba(0, 0, 0, 0.3)
        ); */
        z-index: 1;
      }

      .card-content-2 {
        position: relative;
        z-index: 2;
        color: white;
        padding: 30px 25px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .card-title {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      }

      .card-description {
        font-size: 0.95rem;
        line-height: 1.4;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
      }

      /* Background images for each card */
      .bungee-jump {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23e3f2fd" width="400" height="250"/><path fill="%23bbdefb" d="M0,120 Q100,80 200,120 T400,120 L400,250 L0,250 Z"/><circle fill="%23fff" cx="150" cy="80" r="30"/><line stroke="%23333" stroke-width="2" x1="150" y1="110" x2="150" y2="200"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .skiing {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23f3e5f5" width="400" height="250"/><polygon fill="%23fff" points="0,150 400,100 400,250 0,250"/><circle fill="%23e91e63" cx="200" cy="120" r="15"/><line stroke="%23333" stroke-width="3" x1="200" y1="135" x2="200" y2="180"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .circus {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23fff3e0" width="400" height="250"/><polygon fill="%23ff5722" points="200,50 150,150 250,150"/><circle fill="%23f44336" cx="150" cy="180" r="20"/><circle fill="%232196f3" cx="250" cy="180" r="20"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .ballet {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23e8f5e8" width="400" height="250"/><path fill="%234caf50" d="M200,80 Q150,120 200,160 Q250,120 200,80 Z"/><circle fill="%23ffeb3b" cx="200" cy="60" r="12"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .fishing {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23e1f5fe" width="400" height="250"/><path fill="%2303a9f4" d="M0,150 Q200,100 400,150 L400,250 L0,250 Z"/><line stroke="%238d6e63" stroke-width="3" x1="150" y1="80" x2="180" y2="140"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .dog-sledding {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23f9fbe7" width="400" height="250"/><rect fill="%23fff" y="180" width="400" height="70"/><polygon fill="%23795548" points="100,150 120,150 130,170 90,170"/><circle fill="%23333" cx="80" cy="140" r="8"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .rafting {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23e0f2f1" width="400" height="250"/><path fill="%2300bcd4" d="M0,120 Q100,100 200,120 T400,120 L400,250 L0,250 Z"/><ellipse fill="%23ff9800" cx="200" cy="140" rx="40" ry="15"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .helicopter {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23e8f5e8" width="400" height="250"/><polygon fill="%234caf50" points="0,200 400,150 400,250 0,250"/><ellipse fill="%23333" cx="200" cy="100" rx="30" ry="10"/><line stroke="%23333" stroke-width="1" x1="170" y1="100" x2="230" y2="100"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .husky-ride {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23f3e2a9" width="400" height="250"/><rect fill="%23fff" y="180" width="400" height="70"/><ellipse fill="%23795548" cx="150" cy="150" rx="25" ry="15"/><circle fill="%23333" cx="140" cy="145" r="3"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .northern-lights {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23263238" width="400" height="250"/><path fill="%234caf50" opacity="0.7" d="M0,80 Q100,40 200,80 T400,80 L400,120 Q300,160 200,120 T0,120 Z"/><path fill="%2300e676" opacity="0.5" d="M0,100 Q150,60 300,100 T400,100 L400,140 Q250,180 100,140 T0,140 Z"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .tank-ride {
        background: linear-gradient(
            45deg,
            rgba(0, 0, 0, 0.4),
            rgba(0, 0, 0, 0.2)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 250"><rect fill="%23efebe9" width="400" height="250"/><rect fill="%23795548" x="150" y="120" width="100" height="40"/><circle fill="%23333" cx="130" cy="160" r="15"/><circle fill="%23333" cx="270" cy="160" r="15"/></svg>');
        background-size: cover;
        background-position: center;
      }

      .view-all-btn {
        background: #dc3545;
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 25px;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        margin-top: 40px;
      }

      .view-all-btn:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 53, 69, 0.3);
      }

      @media (max-width: 768px) {
        .hero-title {
          font-size: 2rem;
        }
        .hero-subtitle {
          font-size: 2rem;
        }
        .attraction-card {
          height: 200px;
        }
        .card-title {
          font-size: 1.1rem;
        }
      }
    </style>
  </head>

    {{-- <div class="hero-section"> --}}
      {{-- <div class="container">
        <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">You Can't Afford To Miss These</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Major Attractions</h2>

        <p class="hero-description">
          You will never get enough of fun and adventure while in Russia and
          other CIS countries. Have a look at these snippets and decide for
          yourself for how long will you postpone your travel plans for these.
        </p>
      </div> --}}
    {{-- </div> --}}

    <div class="container" style="padding-bottom: 20px">
   <div class="text-center">
  <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">
    You Can't Afford To Miss These
  </h3>
  <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp"
      data-wow-duration="0.8s" data-wow-delay="0.2s">
    Major Attractions
  </h2>
</div>

       <p class="hero-description">
          You will never get enough of fun and adventure while in Russia and
          other CIS countries. Have a look at these snippets and decide for
          yourself for how long will you postpone your travel plans for these.
        </p>
      <div class="row g-4">
        <!-- Row 1 -->
        <div class="col-lg-3 col-md-6">
          <div class="attraction-card bungee-jump">
            <div class="card-content-2">
              <h3 class="card-title">Bungee Jump</h3>
              <p class="card-description">
                Enjoy this breathtaking adventure in Sochi, Russia
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="attraction-card skiing">
            <div class="card-content-2">
              <h3 class="card-title">Skiing</h3>
              <p class="card-description">
                Enjoy this sport in Sochi, Murmansk, Baikal and Almaty
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="attraction-card circus">
            <div class="card-content-2">
              <h3 class="card-title">Circus</h3>
              <p class="card-description">
                Witness some of the best Acrobats in Moscow
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="attraction-card ballet">
            <div class="card-content-2">
              <h3 class="card-title">Ballet</h3>
              <p class="card-description">
                You just can't afford to miss Swan Lake Ballet dance in St.
                Petersburg and Minsk
              </p>
            </div>
          </div>
        </div>

        <!-- Row 2 -->
        <div class="col-lg-4 col-md-6">
          <div class="attraction-card fishing">
            <div class="card-content-2">
              <h3 class="card-title">Fishing</h3>
              <p class="card-description">
                Spend hours on Fishing in Baikal Lake
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="attraction-card dog-sledding">
            <div class="card-content-2">
              <h3 class="card-title">Dog Sledding</h3>
              <p class="card-description">
                Murmansk is the place to enjoy this leisure activity
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="attraction-card rafting">
            <div class="card-content-2">
              <h3 class="card-title">Rafting</h3>
              <p class="card-description">Enjoy Rafting in Kola Peninsula</p>
            </div>
          </div>
        </div>

        <!-- Row 3 -->
        <div class="col-lg-3 col-md-6">
          <div class="attraction-card helicopter">
            <div class="card-content-2">
              <h3 class="card-title">Helicopter Ride</h3>
              <p class="card-description">Picturesque beauty in Kutsk</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="attraction-card husky-ride">
            <div class="card-content-2">
              <h3 class="card-title">Husky Ride</h3>
              <p class="card-description">
                Slow Husky Dogs on Snow in Murmansk
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="attraction-card northern-lights">
            <div class="card-content-2">
              <h3 class="card-title">Northern Lights</h3>
              <p class="card-description">
                Enjoy this magic of nature in Murmansk
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="attraction-card tank-ride">
            <div class="card-content-2">
              <h3 class="card-title">Tank Ride</h3>
              <p class="card-description">Feel the Jizah in Moscow</p>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center">
        <button class="view-all-btn">
          VIEW ALL MAJOR ATTRACTIONS <i class="fas fa-arrow-right ms-2"></i>
        </button>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>




{{-- pacakages end new --}}





<!-- Start Accordian Section -->
<section class="cs_primary_bg cs_bg_filed cs_bg_fixed cs_parallax" data-src="assets/images/accordian_bg.jpeg">
  <div class="cs_height_150 cs_height_lg_80"></div>
  <div class="container">
    <div class="row cs_gap_y_40 align-items-center">
      <div class="col-xl-6 col-lg-5">
        <div class="cs_adventure_logo_wrap">
          <div class="cs_adventure_logo">
            <img src="assets/images/adventure_logo.svg" alt="Logo" class="cs_to_rotate">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-7">
        <div class="cs_accordian_wrap">
          <div class="cs_accordian cs_style_1 cs_white_bg cs_radius_5">
            <h3 class="cs_accordian_head cs_fs_20 cs_semibold mb-0">
              <span>What type of travel packages does Vacasky offer?</span>
                <span class="cs_accordian_toggle cs_center">
                  <i class="fa-regular fa-eye"></i>
                  <i class="fa-regular fa-eye-slash"></i>
                </span>
            </h3>
            <div class="cs_accordian_body">
              There are many variations of passages of available but the Ut elit tellus luctus nec ullamcorper at mattis variations of passages of available.
            </div>
          </div>
          <div class="cs_accordian cs_style_1 cs_white_bg cs_radius_5 active">
            <h3 class="cs_accordian_head cs_fs_20 cs_semibold mb-0">
              How do I book a trip with Vacasky?
                <span class="cs_accordian_toggle cs_center">
                  <i class="fa-regular fa-eye"></i>
                  <i class="fa-regular fa-eye-slash"></i>
                </span>
            </h3>
            <div class="cs_accordian_body">
              There are many variations of passages of available but the Ut elit tellus luctus nec ullamcorper at mattis variations of passages of available.
            </div>
          </div>
          <div class="cs_accordian cs_style_1 cs_white_bg cs_radius_5">
            <h3 class="cs_accordian_head cs_fs_20 cs_semibold mb-0">
              What is the payment process for Vacasky?
              <span class="cs_accordian_toggle cs_center">
                <i class="fa-regular fa-eye"></i>
                <i class="fa-regular fa-eye-slash"></i>
              </span>
            </h3>
            <div class="cs_accordian_body">
              There are many variations of passages of available but the Ut elit tellus luctus nec ullamcorper at mattis variations of passages of available.
            </div>
          </div>
          <div class="cs_accordian cs_style_1 cs_white_bg cs_radius_5">
            <h3 class="cs_accordian_head cs_fs_20 cs_semibold mb-0">
              What Payment Methods are Supported?
                <span class="cs_accordian_toggle cs_center">
                  <i class="fa-regular fa-eye"></i>
                  <i class="fa-regular fa-eye-slash"></i>
                </span>
            </h3>
            <div class="cs_accordian_body">
              There are many variations of passages of available but the Ut elit tellus luctus nec ullamcorper at mattis variations of passages of available.
            </div>
          </div>
          <div class="cs_accordian cs_style_1 cs_white_bg cs_radius_5">
            <h3 class="cs_accordian_head cs_fs_20 cs_semibold mb-0">
              How to cancel my booking in Vacasky?
                <span class="cs_accordian_toggle cs_center">
                  <i class="fa-regular fa-eye"></i>
                  <i class="fa-regular fa-eye-slash"></i>
                </span>
            </h3>
            <div class="cs_accordian_body">
              There are many variations of passages of available but the Ut elit tellus luctus nec ullamcorper at mattis variations of passages of available.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cs_height_150 cs_height_lg_80"></div>
</section>
<!-- End Accordian Section -->


{{-- testimonial section other start --}}


{{--
     <style>
      .testimonials-section {
        background: linear-gradient(
            135deg,
            rgba(0, 0, 0, 0.6),
            rgba(0, 0, 0, 0.4)
          ),
          url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><defs><linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" style="stop-color:%23164e63;stop-opacity:1" /><stop offset="100%" style="stop-color:%230f2027;stop-opacity:1" /></linearGradient></defs><rect width="1200" height="800" fill="url(%23grad1)"/><polygon points="0,600 300,500 600,550 900,400 1200,450 1200,800 0,800" fill="%23155e75" opacity="0.8"/><polygon points="0,700 400,600 800,650 1200,550 1200,800 0,800" fill="%23083344" opacity="0.6"/></svg>');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
      }

      .testimonials-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(
            circle at 30% 70%,
            rgba(236, 255, 255, 0.15) 0%,
            transparent 50%
          ),
          radial-gradient(
            circle at 70% 30%,
            rgba(134, 239, 172, 0.1) 0%,
            transparent 50%
          );
        animation: float 6s ease-in-out infinite;
      }

      @keyframes float {
        0%,
        100% {
          transform: translateY(0px);
        }
        50% {
          transform: translateY(-10px);
        }
      }

      .section-title {
        color: rgb(236, 255, 255);
        font-family: "Georgia", serif;
        font-weight: 300;
        margin-bottom: 60px;
        position: relative;
        z-index: 2;
      }

      .section-subtitle {
        color: rgb(165, 243, 252);
        font-style: italic;
        font-size: 1.1rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 10px;
        opacity: 0.9;
      }

      .testimonial-card {
        background: rgba(236, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(236, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        animation: slideInUp 0.8s ease-out;
      }

      .testimonial-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(
          135deg,
          rgba(236, 255, 255, 0.1) 0%,
          transparent 50%
        );
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        border-color: rgba(165, 243, 252, 0.5);
      }

      .testimonial-card:hover::before {
        opacity: 1;
      }

      .testimonial-card.dark {
        background: rgba(8, 51, 68, 0.4);
        border-color: rgba(165, 243, 252, 0.3);
      }

      .testimonial-card.teal {
        background: rgba(103, 232, 249, 0.2);
        border-color: rgba(103, 232, 249, 0.3);
      }

      .testimonial-card.light {
        background: rgba(236, 255, 255, 0.15);
        border-color: rgba(236, 255, 255, 0.25);
      }

      .testimonial-text {
        color: rgb(236, 255, 255);
        font-size: 1.1rem;
        line-height: 1.7;
        font-style: italic;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
      }

      .testimonial-text::before {
        content: '"';
        font-size: 4rem;
        color: rgba(165, 243, 252, 0.3);
        position: absolute;
        top: -10px;
        left: -10px;
        font-family: Georgia, serif;
        z-index: -1;
      }

      .star-rating {
        color: rgb(251, 191, 36);
        margin-bottom: 1rem;
        font-size: 1.1rem;
      }

      .star-rating i {
        margin-right: 2px;
        animation: sparkle 2s ease-in-out infinite;
        animation-delay: calc(var(--i) * 0.1s);
      }

      @keyframes sparkle {
        0%,
        100% {
          transform: scale(1);
          opacity: 1;
        }
        50% {
          transform: scale(1.1);
          opacity: 0.8;
        }
      }

      .author-name {
        color: rgb(103, 232, 249);
        font-weight: 500;
        font-size: 1.2rem;
        font-style: italic;
        margin-bottom: 0;
      }

      .more-feedback-btn {
        background: linear-gradient(135deg, rgb(14, 116, 144), rgb(8, 145, 178));
        border: none;
        color: rgb(236, 255, 255);
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(14, 116, 144, 0.4);
        position: relative;
        overflow: hidden;
      }

      .more-feedback-btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
          90deg,
          transparent,
          rgba(236, 255, 255, 0.3),
          transparent
        );
        transition: left 0.5s ease;
      }

      .more-feedback-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(14, 116, 144, 0.6);
        background: linear-gradient(135deg, rgb(8, 145, 178), rgb(14, 116, 144));
      }

      .more-feedback-btn:hover::before {
        left: 100%;
      }

      @keyframes slideInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .testimonial-card:nth-child(2) {
        animation-delay: 0.2s;
      }
      .testimonial-card:nth-child(3) {
        animation-delay: 0.4s;
      }
      .testimonial-card:nth-child(4) {
        animation-delay: 0.6s;
      }

      @media (max-width: 768px) {
        .testimonials-section {
          padding: 60px 0;
        }

        .testimonial-card {
          padding: 1.5rem;
          margin-bottom: 1.5rem;
        }

        .testimonial-text {
          font-size: 1rem;
        }
      }

      .floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        z-index: 1;
      }

      .floating-element {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(165, 243, 252, 0.6);
        border-radius: 50%;
        animation: floatUpDown 4s ease-in-out infinite;
      }

      .floating-element:nth-child(1) {
        top: 20%;
        left: 10%;
        animation-delay: 0s;
      }
      .floating-element:nth-child(2) {
        top: 60%;
        left: 85%;
        animation-delay: 1s;
      }
      .floating-element:nth-child(3) {
        top: 80%;
        left: 20%;
        animation-delay: 2s;
      }
      .floating-element:nth-child(4) {
        top: 30%;
        left: 90%;
        animation-delay: 3s;
      }

      @keyframes floatUpDown {
        0%,
        100% {
          transform: translateY(0px) rotate(0deg);
          opacity: 0.7;
        }
        50% {
          transform: translateY(-20px) rotate(180deg);
          opacity: 1;
        }
      }
    </style>

    <section class="testimonials-section">
      <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
      </div>

      <div class="container">
        <div class="text-center mb-5">
             <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">TESTIMONIALS</h3>
        <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0" style="color: white">Our Valuable Customers
          Awesome Feedback</h2>

        </div>

        <div class="row g-4">
          <div class="col-lg-6">
            <div class="testimonial-card dark h-100">
              <div class="star-rating">
                <i class="fas fa-star" style="--i: 1"></i>
                <i class="fas fa-star" style="--i: 2"></i>
                <i class="fas fa-star" style="--i: 3"></i>
                <i class="fas fa-star" style="--i: 4"></i>
                <i class="fas fa-star" style="--i: 5"></i>
              </div>
              <p class="testimonial-text">
                Our trip to Moscow became unforgettable, we were on Honeymoon.
                And Salvia's travel arrangement for us was just perfect.
              </p>
              <p class="author-name">Sejal Hemachandran</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="testimonial-card teal h-100">
              <div class="star-rating">
                <i class="fas fa-star" style="--i: 1"></i>
                <i class="fas fa-star" style="--i: 2"></i>
                <i class="fas fa-star" style="--i: 3"></i>
                <i class="fas fa-star" style="--i: 4"></i>
                <i class="fas fa-star" style="--i: 5"></i>
              </div>
              <p class="testimonial-text">
                We chose Russia as our first family trip. We were fortunate to
                have selected Salvia for this trip. Their services right from
                VISA till local travel around major cities in Russia was just
                too good. Thank you Salvia
              </p>
              <p class="author-name">Dr. Dipak Rochlani</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="testimonial-card dark h-100">
              <div class="star-rating">
                <i class="fas fa-star" style="--i: 1"></i>
                <i class="fas fa-star" style="--i: 2"></i>
                <i class="fas fa-star" style="--i: 3"></i>
                <i class="fas fa-star" style="--i: 4"></i>
                <i class="fas fa-star" style="--i: 5"></i>
              </div>
              <p class="testimonial-text">
                I'm an adventure freak. Out of all the places I have travelled
                so far, my Sochi trip in Russia was the best. I did almost
                everything from water sports to Skiing. Thank you Salvia for
                your valuable suggestions
              </p>
              <p class="author-name">Pankaj Dhollia</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="testimonial-card light h-100">
              <div class="star-rating">
                <i class="fas fa-star" style="--i: 1"></i>
                <i class="fas fa-star" style="--i: 2"></i>
                <i class="fas fa-star" style="--i: 3"></i>
                <i class="fas fa-star" style="--i: 4"></i>
                <i class="fas fa-star" style="--i: 5"></i>
              </div>
              <p class="testimonial-text">
                I went on a solo trip to Saint Petersburg. Ah! What a City! And
                thanks to Salvia for their professional assistant for this trip
              </p>
              <p class="author-name">Samar Lakhotia</p>
            </div>
          </div>
        </div>

        <div class="text-center mt-5">

        </div>
      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
      // Add some interactive animations
      document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll(".testimonial-card");

        // Intersection Observer for animation triggers
        const observer = new IntersectionObserver(
          (entries) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting) {
                entry.target.style.animationPlayState = "running";
              }
            });
          },
          { threshold: 0.1 }
        );

        cards.forEach((card) => {
          observer.observe(card);

          // Add parallax effect on mouse move
          card.addEventListener("mousemove", (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;

            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
          });

          card.addEventListener("mouseleave", () => {
            card.style.transform =
              "perspective(1000px) rotateX(0) rotateY(0) translateY(0)";
          });
        });

        // Button click effect
        const btn = document.querySelector(".more-feedback-btn");
        btn.addEventListener("click", function () {
          this.style.transform = "translateY(-2px) scale(0.98)";
          setTimeout(() => {
            this.style.transform = "translateY(-2px) scale(1)";
          }, 150);
        });
      });
    </script> --}}




{{-- testimonial section other end  --}}

<!-- Start Testimonial Section -->
<section class="cs_testimonial cs_slider cs_style_1">
  <div class="cs_height_140 cs_height_lg_80"></div>
  <div class="container cs_large">
    <div class="row cs_gap_y_40">
    <div class="col-lg-6">
      <div class="cs_section_heading cs_style_1">
        <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">TESTIMONIALS</h3>
        <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0">Our Valuable Customers
          Awesome Feedback</h2>
      </div>
      <div class="cs_height_20 cs_height_lg_20"></div>
      <p class="cs_section_text mb-0">Completely reinvent worldwide testing procedures with cooperative initiatives to leverage existing excellent best practices with functional</p>
      <div class="cs_height_40 cs_height_lg_30"></div>
      <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0" data-slides-per-view="responsive" data-xxs-slides="1" data-xs-slides="1" data-sm-slides="1" data-md-slides="1"
        data-lg-slides="1" data-add-slides="1">
        <div class="cs_slider_wrapper">
          <div class="slick_slide_in">
            <div class="cs_feedback cs_style_1 cs_radius_5 position-relative">
              <div class="cs_feedback_avatar">
                <div class="cs_avatar_thumb cs_radius_5 overflow-hidden">
                  <img src="assets/images/testimonial_avatar_1.jpeg" alt="Avatar">
                </div>
                <div class="cs_avatar_info">
                  <h3 class="cs_avatar_title cs_fs_24 cs_medium cs_secondary_font">Alexon Shen</h3>
                  <p class="cs_avatar_subtitle cs_accent_color mb-0">Founder & CEO</p>
                </div>
              </div>
              <div>
                <blockquote class="cs_fs_24 cs_medium cs_secondary_font cs_primary_color">“Quality Servies Good!”</blockquote>
                <p class="mb-0">Completely reinvent worldwide testing new proceds with cooperative initiatives. Seemly leverage market excellent best practices chains</p>
              </div>
            </div>
          </div>
          <div class="slick_slide_in">
            <div class="cs_feedback cs_style_1 cs_radius_5 position-relative">
              <div class="cs_feedback_avatar">
                <div class="cs_avatar_thumb cs_radius_5 overflow-hidden">
                  <img src="assets/images/testimonial_avatar_2.jpeg" alt="Avatar">
                </div>
                <div class="cs_avatar_info">
                  <h3 class="cs_avatar_title cs_fs_24 cs_medium cs_secondary_font">Alexon Shen</h3>
                  <p class="cs_avatar_subtitle cs_accent_color mb-0">Founder & CEO</p>
                </div>
              </div>
              <div>
                <blockquote class="cs_fs_24 cs_medium cs_secondary_font cs_primary_color">“Quality Servies Good!”</blockquote>
                <p class="mb-0">Completely reinvent worldwide testing new proceds with cooperative initiatives. Seemly leverage market excellent best practices chains</p>
              </div>
            </div>
          </div>
          <div class="slick_slide_in">
            <div class="cs_feedback cs_style_1 cs_radius_5 position-relative">
              <div class="cs_feedback_avatar">
                <div class="cs_avatar_thumb cs_radius_5 overflow-hidden">
                  <img src="assets/images/testimonial_avatar_2_1.jpeg" alt="Avatar">
                </div>
                <div class="cs_avatar_info">
                  <h3 class="cs_avatar_title cs_fs_24 cs_medium cs_secondary_font">Alexon Shen</h3>
                  <p class="cs_avatar_subtitle cs_accent_color mb-0">Founder & CEO</p>
                </div>
              </div>
              <div>
                <blockquote class="cs_fs_24 cs_medium cs_secondary_font cs_primary_color">“Quality Servies Good!”</blockquote>
                <p class="mb-0">Completely reinvent worldwide testing new proceds with cooperative initiatives. Seemly leverage market excellent best practices chains</p>
              </div>
            </div>
          </div>
        </div>
        <div class="cs_pagination cs_style_1"></div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="cs_testimonial_thumb cs_radius_5 overflow-hidden position-relative">
        <img src="assets/images/testimonial_right.jpeg" alt="Testimonial Thumb" class="w-100 h-100 object-fit-cover">
        <div class="cs_shape_1 position-absolute"></div>
        <div class="cs_shape_2 position-absolute">
          <img src="assets/images/Quote.png" alt="Quote">
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>
<!-- End Testimonial Section -->

<!-- Start Blog Section -->
<section class="cs_accent_bg_1">
  <div class="cs_height_135 cs_height_lg_75"></div>
  <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">News & Blogs</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Last Minute Amazing Deals</h2>
    </div>
    <div class="cs_height_55 cs_height_lg_40"></div>
    <div class="row cs_gap_y_24">
      <div class="col-lg-4">
        <article class="cs_post cs_style_2 cs_white_bg">
          <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
            <img src="assets/images/post_3.jpeg" alt="Post Thumb" class="cs_zoom_in">
            <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
            <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
          </a>
          <div class="cs_post_info">
            <ul class="cs_post_meta cs_mp0">
              <li>
                <span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By<a href="#">admin</a>
              </li>
              <li>
                <span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span>
                <a href="#">3 comments</a>
              </li>
            </ul>
            <h2 class="cs_post_title cs_fs_24 cs_semibold"><a href="{{ route('blogdetails') }}">Things to see and do when visiting Japan</a></h2>
            <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
              </a>
          </div>
        </article>
      </div>
      <div class="col-lg-4">
        <article class="cs_post cs_style_2 cs_white_bg">
          <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
            <img src="assets/images/post_4.jpeg" alt="Post Thumb" class="cs_zoom_in">
            <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
            <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
          </a>
          <div class="cs_post_info">
            <ul class="cs_post_meta cs_mp0">
              <li>
                <span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By<a href="#">admin</a>
              </li>
              <li>
                <span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span>
                <a href="#">7 comments</a>
              </li>
            </ul>
            <h2 class="cs_post_title cs_fs_24 cs_semibold"><a href="{{ route('blogdetails') }}">A place where start new life with adventure travel</a></h2>
            <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More
                <i class="fa-solid fa-arrow-right-long"></i>
              </a>
          </div>
        </article>
      </div>
      <div class="col-lg-4">
        <article class="cs_post cs_style_2 cs_white_bg">
          <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
            <img src="assets/images/post_5.jpeg" alt="Post Thumb" class="cs_zoom_in">
            <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
            <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
          </a>
          <div class="cs_post_info">
            <ul class="cs_post_meta cs_mp0">
              <li>
                <span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By<a href="#">admin</a>
              </li>
              <li>
                <span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span>
                <a href="#">4 comments</a>
              </li>
            </ul>
            <h2 class="cs_post_title cs_fs_24 cs_semibold"><a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a></h2>
            <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
               Read More
               <i class="fa-solid fa-arrow-right-long"></i>
              </a>
          </div>
        </article>
      </div>
    </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>
<div class="cs_height_135 cs_height_lg_75"></div>
<!-- End Blog Section -->

@endsection
