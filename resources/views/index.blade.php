@extends('layout.layout')
@section('title', 'Flying Trip Online')
@section('content')

<!-- Slick CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
<!-- Optional: Slick Theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

<!-- jQuery (required by Slick) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


@php
    $discountBanner = App\Models\WebSiteElements::where('element', 'discount_banner')->first();
    $backgroundImage = $discountBanner && $discountBanner->element_details
        ? asset($discountBanner->element_details) // assumes it's stored under /public/
        : 'https://cdn.pixabay.com/photo/2018/01/15/09/45/panorama-3083591_1280.jpg';

    $discountText = $elements['discount_text']->element_details ?? '27% DISCOUNT OFFER';

@endphp
<!-- Responsive CSS -->
<style>
  .carousel-card-blog {
    flex: 0 0 100%;
    max-width: 100%;
  }

  @media (min-width: 768px) {
    .carousel-card-blog {
      flex: 0 0 50%;
      max-width: 50%;
    }
  }

  @media (min-width: 992px) {
    .carousel-card-blog {
      flex: 0 0 33.3333%;
      max-width: 33.3333%;
    }
  }

  .carousel-item > .d-flex {
    display: flex;
  }

  .carousel .carousel-inner {
    padding-bottom: 30px; /* space below the cards */
  }
</style>

{{-- new testimonial section start--}}


    <style>


      .testimonials-section {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        padding: 60px 0;
        margin: 0 20px;
        overflow: hidden;
      }

      .section-title {
        text-align: center;
        margin-bottom: 60px;
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s ease forwards;
      }

      .section-title h2 {
        font-size: 3rem;
        font-weight: 700;
        background: linear-gradient(
          45deg,
          var(--primary-color),
          var(--secondary-color)
        );
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 20px;
      }

      .section-title p {
        font-size: 1.2rem;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
      }

      .carousel-container-testimonial {
        position: relative;
        overflow: hidden;
        margin: 0 auto;
        max-width: 1200px;
      }

      .carousel-track {
        display: flex;
        transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        will-change: transform;
      }

      .testimonial-slide {
        flex: 0 0 33.333%;
        padding: 0 15px;
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s ease forwards;
      }

      .testimonial-slide:nth-child(1) {
        animation-delay: 0.2s;
      }
      .testimonial-slide:nth-child(2) {
        animation-delay: 0.4s;
      }
      .testimonial-slide:nth-child(3) {
        animation-delay: 0.6s;
      }
      .testimonial-slide:nth-child(4) {
        animation-delay: 0.8s;
      }
      .testimonial-slide:nth-child(5) {
        animation-delay: 1s;
      }
      .testimonial-slide:nth-child(6) {
        animation-delay: 1.2s;
      }

      .testimonial-card {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
      }

      .testimonial-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: linear-gradient(
          90deg,
          var(--primary-color),
          var(--secondary-color)
        );
        transition: left 0.5s ease;
      }

      .testimonial-card:hover::before {
        left: 0;
      }

      .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
      }

      .video-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 15px;
        margin-bottom: 20px;
        cursor: pointer;
        transition: transform 0.3s ease;
      }

      .video-container:hover {
        transform: scale(1.02);
      }

      .video-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 15px;
      }

      .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 15px;
      }

      .testimonial-content {
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .testimonial-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
        margin-bottom: 20px;
        font-style: italic;
        position: relative;
        flex-grow: 1;
      }

      .testimonial-text::before,
      .testimonial-text::after {
        content: '"';
        font-size: 2.5rem;
        color: var(--primary-color);
        font-family: serif;
        position: absolute;
        opacity: 0.3;
      }

      .testimonial-text::before {
        top: -10px;
        left: -10px;
      }

      .testimonial-text::after {
        bottom: -30px;
        right: -10px;
      }

      .client-info {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin-top: auto;
      }

      .client-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 3px solid var(--secondary-color);
        object-fit: cover;
        transition: transform 0.3s ease;
      }

      .client-avatar:hover {
        transform: scale(1.1);
      }

      .client-details h5 {
        margin: 0;
        color: var(--dark-color);
        font-weight: 600;
        font-size: 0.9rem;
      }

      .client-details p {
        margin: 0;
        color: #888;
        font-size: 0.8rem;
      }

      .rating-testimonial {
        color: #ffc107;
        font-size: 1rem;
        margin-top: 8px;
        display: flex;
        justify-content: center;
        gap: 2px;
      }

      .play-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(255, 107, 107, 0.9);
        border-radius: 50%;
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        transition: all 0.3s ease;
        opacity: 0;
        pointer-events: none;
      }

      .video-container:hover .play-overlay {
        opacity: 1;
      }

      .carousel-indicators {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 40px;
      }

      .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #ccc;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .indicator.active {
        background: var(--primary-color);
        transform: scale(1.2);
      }

      .carousel-controls {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        opacity: 0;
      }

      .carousel-container-testimonial:hover .carousel-controls {
        opacity: 1;
      }

      .carousel-controls:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
      }

      .prev-btn {
        left: -25px;
      }

      .next-btn {
        right: -25px;
      }

      @keyframes fadeInUp {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @keyframes pulse {
        0%,
        100% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.05);
        }
      }

      .pulse-animation {
        animation: pulse 2s infinite;
      }

      /* Mobile Styles */
      @media (max-width: 768px) {
        .section-title h2 {
          font-size: 2rem;
        }

        .testimonials-section {
          margin: 0 10px;
          padding: 40px 0;
        }

        .testimonial-slide {
          flex: 0 0 100%;
          padding: 0 10px;
        }

        .testimonial-card {
          padding: 20px;
        }

        .carousel-controls {
          display: none;
        }

        .video-container {
          margin-bottom: 15px;
        }

        .testimonial-text {
          font-size: 0.95rem;
        }

        .client-avatar {
          width: 45px;
          height: 45px;
        }
      }

      /* Tablet Styles */
      @media (min-width: 769px) and (max-width: 1024px) {
        .testimonial-slide {
          flex: 0 0 50%;
        }
      }

      /* Auto-play progress bar */
      .progress-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background: var(--primary-color);
        transition: width 0.1s linear;
        border-radius: 0 0 20px 20px;
      }
    </style>

    {{-- new testimonial section end--}}


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

    {{-- package start --}}

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
        height: 45%;
        overflow: hidden;
        flex: 0 0 45%;
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
       background-color: var(--primary);
        color: white;
        padding: 8px 16px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 25px;
        box-shadow: 0 4px 15px rgba(60, 174, 231, 0.4);
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
        border: 3px solid var(--primary);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        backdrop-filter: blur(5px);
    }

    .carousel-control-prev:hover, .carousel-control-next:hover {
        background: var(--primary);
        box-shadow: 0 8px 25px rgba(60, 171, 231, 0.4);
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
        color: var(--primary);
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
            width: 30px;
            height: 30px;
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
            padding: 0 5px;
        }

        .section-title {
            font-size: 24px;
        }
    }
</style>


    {{-- package end  --}}

    {{-- package new start --}}

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


    {{-- package new end  --}}

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
   @foreach ($packages as $package)
             {{-- <a href="{{ route('tourDetailpage', $package->slug) }}"> --}}

   @php
                  // Ensure package_image is a valid JSON string before decoding
                  $images = is_string($package->package_image)
                      ? json_decode($package->package_image, true)
                      : $package->package_image;

                  // Check if images is a valid array and get the first image
                  $displayImage = is_array($images) && !empty($images) ? $images[0] : null;
              @endphp

    <div class="tour-grid-item">
              {{-- <a href="{{ route('tourDetailpage', $package->slug) }}" class="text-decoration-none text-dark d-block h-100"> --}}

        <div class="tour-card colored-card visible">

<div class="tour-image" style="background-image: url('{{ asset('storage/' . $displayImage) }}'); background-size: fill; background-repeat: no-repeat; background-position: center; ">
  <div class="nights-badge">{{ $package->package_duration_days }}D/{{ $package->package_duration_nights }}N</div>

                {{-- <div class="nights-badge">{{ $package->package_duration_nights ?? 'N/A' }} Nights</div> --}}
            </div>
            <div class="tour-content">
<h5 class="tour-title">
    <a href="{{ route('tourDetailpage', $package->slug) }}" class="text-decoration-none text-white">
        {{ $package->package_name ?? 'Tour Package' }}
    </a>
</h5>                <div class="tour-icons">
                    <div class="tour-icon"><i class="fas fa-plane"></i></div>
                    <div class="tour-icon"><i class="fas fa-hotel"></i></div>
                    <div class="tour-icon"><i class="fas fa-car"></i></div>
                    <div class="tour-icon"><i class="fas fa-utensils"></i></div>
                </div>
                <div class="price-section">
    @if($package->package_price && $package->package_offer_price < $package->package_price)
        <span class="original-price" style="text-decoration: line-through; color: #888;">
            ₹{{ number_format($package->package_price) }}
        </span>
    @endif
    <span class="current-price" style="font-weight: bold; color: #e7e723;">
        ₹{{ number_format($package->package_offer_price) }}
    </span>
</div>
            </div>
        </div>
    </div>
@endforeach

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


<!-- End Destination Section -->




{{-- package card start --}}





<section style="padding-top: 20px; padding-bottom: 10px;">
<div class="tours-container">
    <div class="section-header">
        {{-- <h2 class="section-title">Browse Our Group Tours</h2> --}}
        <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">BROWSE OUR GROUP TOURS </h3>
        <a href="{{ route('tour') }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold" style="background-color: var(--primary)">
    View All <i class="fas fa-arrow-right"></i>
</a>
    </div>

    <div class="carousel-container">
    <div id="tourCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach ($packages->chunk(4) as $chunkIndex => $chunk)
             {{-- <a href="{{ route('tourDetailpage', $package->slug) }}" class="text-decoration-none text-white"> --}}
                <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                    <div class="d-flex">
                        @foreach ($chunk as $package)
                            @php
                                $images = is_string($package->package_image)
                                    ? json_decode($package->package_image, true)
                                    : $package->package_image;
                                $displayImage = is_array($images) && !empty($images) ? $images[0] : null;

                                $discount = $package->package_price && $package->package_offer_price
                                    ? round((($package->package_price - $package->package_offer_price) / $package->package_price) * 100)
                                    : 0;
                            @endphp

                            <div class="tour-card-2 me-3">
                                <div class="card-image">
                                    <img src="{{ asset('storage/' . $displayImage) }}" alt="{{ $package->package_name }}" style="width: 100%; height: 200px; object-fit: cover;">
                                    @if($package->is_best_selling)
                                        <div class="best-selling">BEST SELLING</div>
                                    @endif
                                </div>
                               <a href="{{ route('tourDetailpage', $package->slug) }}" class="text-decoration-none text-white">
    <div class="card-content">
        <h3 class="cs_card_title cs_fs_24 cs_semibold">{{ $package->package_name }}</h3>
        <div class="duration">{{ $package->package_duration_days }}D {{ $package->package_duration_nights }}N</div>
        <div class="rating"><span class="stars">★★★★★</span></div>
        <div class="tour-icons">
            <i class="fas fa-plane tour-icon" style="color: #e74c3c;"></i>
            <i class="fas fa-building tour-icon" style="color: #3498db;"></i>
            <i class="fas fa-camera tour-icon" style="color: #f39c12;"></i>
            <i class="fas fa-utensils tour-icon" style="color: #27ae60;"></i>
        </div>
        <div class="pricing">
            <div>
                @if ($package->package_price && $package->package_offer_price < $package->package_price)
                    <div class="original-price">₹{{ number_format($package->package_price) }}</div>
                @endif
                <div class="current-price">₹{{ number_format($package->package_offer_price) }}</div>
            </div>
            @if($discount > 0)
                <div class="discount-badge">{{ $discount }}% OFF</div>
            @endif
        </div>
    </div>
</a>

                            </div>
                        @endforeach
                    </div>
                </div>
              </a>
            @endforeach
        </div>

        <!-- Controls -->
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
</section>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}





{{-- pacakage card end  --}}


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
      
      @if (!empty($homedestinations) && count($homedestinations) > 0)
        @foreach ($homedestinations as $item)
          <div class="cs_card cs_style_4 cs_hover_active {{ $loop->first ? 'active' : '' }}">
            {{-- Background image --}}
            <a href="{{ route('destinationDetailpage', ['destination_slug' => $item->destination_slug]) }}" 
               class="cs_card_thumb cs_bg_filed" 
               style="background-image: url('{{ asset($item->destination_image) }}');">
            </a>

            {{-- Icon overlay --}}
            <a href="{{ route('destinationDetailpage', ['destination_slug' => $item->destination_slug]) }}" 
               class="cs_card_icon cs_center position-absolute">
              <i class="fa-solid fa-chevron-right"></i>
            </a>

            {{-- Text content --}}
            <div class="cs_card_in">
              <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0">
                <a href="{{ route('destinationDetailpage', ['destination_slug' => $item->destination_slug]) }}">
                  {{ $item->destination ?? 'Unknown Destination' }}
                </a>
              </h2>
            </div>
          </div>
        @endforeach
      @else
        {{-- Optional fallback static cards here --}}
        <div class="cs_card cs_style_4 cs_hover_active active">
          <a href="{{ route('tourdetails') }}" class="cs_card_thumb cs_bg_filed" data-src="https://cdn.pixabay.com/photo/2022/01/01/16/29/antelope-6908215_1280.jpg"></a>
          <a href="{{ route('tourdetails') }}" class="cs_card_icon cs_center position-absolute"><i class="fa-solid fa-chevron-right"></i></a>
          <div class="cs_card_in">
            <h2 class="cs_card_title cs_fs_35 cs_white_color mb-0"><a href="{{ route('tourdetails') }}">Copenhagen,<br> Denmark</a></h2>
          </div>
        </div>
      @endif

    </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>







<section style="padding-top: 20px; padding-bottom: 10px;">
    <div class="container" style="padding-bottom: 20px">
        <div class="text-center">
            <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">
                YOU CAN'T AFFORD TO MISS THESE
            </h3>
            <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp"
                data-wow-duration="0.8s" data-wow-delay="0.2s">
                Major Attractions
            </h2>
        </div>

        <p class="hero-description text-center">
            You will never get enough of fun and adventure while in Russia and
            other CIS countries. Have a look at these snippets and decide for
            yourself for how long will you postpone your travel plans for these.
        </p>

        <div class="row g-4">
            @if(!empty($majorattraction) && $majorattraction->isNotEmpty())
               @foreach($majorattraction as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="attraction-card" style="background-image: url('{{ asset($item->image) }}'); background-size: cover; background-position: center; height: 250px; border-radius: 10px; position: relative;">
                            <div class="card-content-2"style="background: rgba(0, 0, 0, 0.5); padding: 15px; position: absolute; bottom: 0; width: 100%; color: #fff;">
<h3 class="card-title" style="color: black; font-weight: bold;">{{ $item->title }}</h3>
                                <p class="card-description">{{ $item->short_description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Static fallback content exactly as in your original design --}}
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
            @endif
        </div>

        {{-- <div class="text-center mt-4">
            <button class="view-all-btn">
                VIEW ALL MAJOR ATTRACTIONS <i class="fas fa-arrow-right ms-2"></i>
            </button>
        </div> --}}
    </div>
</section>


<!-- Start CTA Section -->
<section class="cs_cta cs_style_1 cs_bg_filed cs_primary_bg cs_bg_fixed" data-src="{{ $backgroundImage }}" style="background-image: url('{{ $backgroundImage }}');">
  <div class="cs_height_150 cs_height_lg_80"></div>
  <div class="container">
    <div class="row cs_gap_y_40">
      <div class="col-lg-6">
        <div class="cs_cta_text">
          <h3 class="cs_cta_title_mini cs_fs_24 cs_medium cs_white_color cs_ternary_font wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.2s">27% DISCOUNT OFFER </h3>
          <h2 class="cs_cta_title cs_fs_56 cs_bold cs_white_color">Discount Popup Examples to Elevate</h2>
          <p class="cs_cta_subtitle cs_fs_18 cs_white_color">
            Denouncing pleasure and praising pain was born and will give you <br> complete great explorer of the truth the master-builder.
          </p>
          <a href="{{ route('tour') }}" class="cs_btn cs_style_1 cs_fs_18 cs_semibold">
            Read More
            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M19.5866 5.69629H0.41235C0.184269 5.69629 0 5.46776 0 5.1849C0 4.90204 0.184269 4.67352 0.41235 4.67352H18.5906L16.0881 1.57004C15.927 1.37028 15.927 1.04587 16.0881 0.846109C16.2492 0.646349 16.5108 0.646349 16.6718 0.846109L19.8792 4.82374C19.9977 4.97076 20.0325 5.1897 19.9681 5.38147C19.9036 5.57164 19.7529 5.69629 19.5866 5.69629Z" fill="currentColor"/>
              <path d="M16.3435 9.11986C16.2384 9.11986 16.1333 9.08012 16.0538 8.99935C15.8935 8.83909 15.8935 8.57884 16.0538 8.41858L19.2487 5.22371C19.4089 5.06345 19.6692 5.06345 19.8294 5.22371C19.9897 5.38396 19.9897 5.64422 19.8294 5.80448L16.6346 8.99935C16.5538 9.08012 16.4487 9.11986 16.3435 9.11986Z" fill="currentColor"/>
            </svg>
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="cs_partners_wrap overflow-hidden">
          <div class="cs_partners">
            @foreach (range(6, 11) as $num)
              <div class="cs_partner">
                <img src="{{ asset('assets/images/brand_' . $num . '.png') }}" alt="Brand Logo">
              </div>
            @endforeach
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




{{-- updated old code end here --}}

{{-- updated new code end  --}}





<!-- Start Team Section -->
 <section style="padding-top: 10px">
  {{-- <div class="cs_height_135 cs_height_lg_75"></div> --}}
  <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">WHY TRAVEL WITH FLYTRP</h3>
      {{-- <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Our Experts Team Member</h2> --}}
    </div>
    <div class="cs_height_55 cs_height_lg_40"></div>
    <div class="row cs_gap_y_10">
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







<!-- Start Accordian Section -->
<section class="cs_primary_bg cs_bg_filed cs_bg_fixed cs_parallax" data-src="https://cdn.pixabay.com/photo/2020/05/10/21/07/habitat-5155539_1280.jpg">
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
                  <img src="https://cdn.pixabay.com/photo/2016/10/16/22/44/glass-ball-1746506_1280.jpg" alt="Avatar">
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
                  <img src="https://cdn.pixabay.com/photo/2015/09/05/05/24/landscape-923769_1280.jpg" alt="Avatar">
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
      {{-- <div class="cs_testimonial_thumb cs_radius_5 overflow-hidden position-relative">
        <img src="https://cdn.pixabay.com/photo/2021/01/20/09/42/lake-5933622_1280.jpg" alt="Testimonial Thumb" class="w-100 h-100 object-fit-cover">
        <div class="cs_shape_1 position-absolute"></div>
        <div class="cs_shape_2 position-absolute">
          <img src="assets/images/Quote.png" alt="Quote">
        </div>
      </div> --}}
       {{-- <div class="cs_height_140 cs_height_lg_60"></div> --}}
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
    </div>
  </div>
  </div>
  <div class="cs_height_140 cs_height_lg_80"></div>
</section>



<!-- End Testimonial Section -->



    <section class="cs_accent_bg_1">
    <div class="cs_height_135 cs_height_lg_75"></div>
     <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">TESTIMONIALS</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">What Our Clients Say</h2>
    </div>
      <div class="cs_height_55 cs_height_lg_40"></div>

    <div class="container-fluid">
      <section class="testimonials-section">
        {{-- <div class="section-title">
          <h2><i class="fas fa-video me-3"></i>What Our Clients Say</h2>
          <p>
            Don't just take our word for it - hear directly from our satisfied
            customers about their experience with our services.
          </p>
        </div> --}}

        <div class="carousel-container-testimonial">
          <div class="carousel-track" id="carouselTrack">
            <div class="testimonial-slide">
              <div class="testimonial-card">
                <div
                  class="video-container"
                  onclick="playVideo(this, 'dQw4w9WgXcQ')"
                >
                  <img
                    src="https://img.youtube.com/vi/dQw4w9WgXcQ/maxresdefault.jpg"
                    alt="Customer Testimonial"
                  />
                  <div class="play-overlay">
                    <i class="fas fa-play"></i>
                  </div>
                </div>
                <div class="testimonial-content">
                  <p class="testimonial-text">
                    "This service completely transformed our business
                    operations. The results exceeded all our expectations and
                    the team was incredibly professional throughout the entire
                    process."
                  </p>
                  <div class="client-info">
                    <img
                      src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face"
                      alt="John Smith"
                      class="client-avatar"
                    />
                    <div class="client-details">
                      <h5>John Smith</h5>
                      <p>CEO, Tech Solutions Inc.</p>
                      <div class="rating-testimonial">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-slide">
              <div class="testimonial-card">
                <div
                  class="video-container"
                  onclick="playVideo(this, 'ScMzIvxBSi4')"
                >
                  <img
                    src="https://img.youtube.com/vi/ScMzIvxBSi4/maxresdefault.jpg"
                    alt="Customer Testimonial"
                  />
                  <div class="play-overlay">
                    <i class="fas fa-play"></i>
                  </div>
                </div>
                <div class="testimonial-content">
                  <p class="testimonial-text">
                    "Outstanding customer service and incredible attention to
                    detail. They delivered exactly what we needed on time and
                    within budget. Highly recommended!"
                  </p>
                  <div class="client-info">
                    <img
                      src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face"
                      alt="Sarah Johnson"
                      class="client-avatar"
                    />
                    <div class="client-details">
                      <h5>Sarah Johnson</h5>
                      <p>Marketing Director, Creative Agency</p>
                      <div class="rating-testimonial">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-slide">
              <div class="testimonial-card">
                <div
                  class="video-container"
                  onclick="playVideo(this, 'jNQXAC9IVRw')"
                >
                  <img
                    src="https://img.youtube.com/vi/jNQXAC9IVRw/maxresdefault.jpg"
                    alt="Customer Testimonial"
                  />
                  <div class="play-overlay">
                    <i class="fas fa-play"></i>
                  </div>
                </div>
                <div class="testimonial-content">
                  <p class="testimonial-text">
                    "The innovation and creativity they brought to our project
                    was remarkable. Our ROI increased by 300% within the first
                    quarter after implementation."
                  </p>
                  <div class="client-info">
                    <img
                      src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
                      alt="Michael Chen"
                      class="client-avatar"
                    />
                    <div class="client-details">
                      <h5>Michael Chen</h5>
                      <p>Founder, StartupXYZ</p>
                      <div class="rating-testimonial">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-slide">
              <div class="testimonial-card">
                <div
                  class="video-container"
                  onclick="playVideo(this, '9bZkp7q19f0')"
                >
                  <img
                    src="https://img.youtube.com/vi/9bZkp7q19f0/maxresdefault.jpg"
                    alt="Customer Testimonial"
                  />
                  <div class="play-overlay">
                    <i class="fas fa-play"></i>
                  </div>
                </div>
                <div class="testimonial-content">
                  <p class="testimonial-text">
                    "Professional, reliable, and results-driven. They understood
                    our vision perfectly and brought it to life beyond our
                    expectations. A truly exceptional experience."
                  </p>
                  <div class="client-info">
                    <img
                      src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face"
                      alt="Emily Rodriguez"
                      class="client-avatar"
                    />
                    <div class="client-details">
                      <h5>Emily Rodriguez</h5>
                      <p>Operations Manager, Global Corp</p>
                      <div class="rating-testimonial">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-slide">
              <div class="testimonial-card">
                <div
                  class="video-container"
                  onclick="playVideo(this, 'L_jWHffIx5E')"
                >
                  <img
                    src="https://img.youtube.com/vi/L_jWHffIx5E/maxresdefault.jpg"
                    alt="Customer Testimonial"
                  />
                  <div class="play-overlay">
                    <i class="fas fa-play"></i>
                  </div>
                </div>
                <div class="testimonial-content">
                  <p class="testimonial-text">
                    "Absolutely amazing results! The team went above and beyond
                    to ensure our success. Their expertise and dedication made
                    all the difference in our project."
                  </p>
                  <div class="client-info">
                    <img
                      src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&h=150&fit=crop&crop=face"
                      alt="David Wilson"
                      class="client-avatar"
                    />
                    <div class="client-details">
                      <h5>David Wilson</h5>
                      <p>CTO, Innovation Labs</p>
                      <div class="rating-testimonial">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-slide">
              <div class="testimonial-card">
                <div
                  class="video-container"
                  onclick="playVideo(this, 'kJQP7kiw5Fk')"
                >
                  <img
                    src="https://img.youtube.com/vi/kJQP7kiw5Fk/maxresdefault.jpg"
                    alt="Customer Testimonial"
                  />
                  <div class="play-overlay">
                    <i class="fas fa-play"></i>
                  </div>
                </div>
                <div class="testimonial-content">
                  <p class="testimonial-text">
                    "Exceptional service quality and outstanding support. They
                    transformed our vision into reality with precision and
                    creativity. Couldn't be happier with the results!"
                  </p>
                  <div class="client-info">
                    <img
                      src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=150&h=150&fit=crop&crop=face"
                      alt="Lisa Anderson"
                      class="client-avatar"
                    />
                    <div class="client-details">
                      <h5>Lisa Anderson</h5>
                      <p>VP Marketing, Future Corp</p>
                      <div class="rating-testimonial">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="progress-bar" id="progressBar"></div>
        </div>

        <div class="carousel-indicators" id="indicators"></div>
      </section>
    </div>
     </div>
    </section>






{{-- new testimonial section end  --}}

<!-- Start Blog Section -->
{{-- <section class="cs_accent_bg_1">
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
            <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
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
            <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
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
            <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
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
            <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
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
</section> --}}


<section class="cs_accent_bg_1">
    <div class="cs_height_135 cs_height_lg_75"></div>
     <div class="container">
    <div class="cs_section_heading cs_style_1 text-center">
      <h3 class="cs_section_title_up cs_ternary_font cs_accent_color cs_normal cs_fs_24">News & Blogs</h3>
      <h2 class="cs_section_title cs_semibold cs_fs_56 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Last Minute Amazing Deals</h2>
    </div>
      <div class="cs_height_55 cs_height_lg_40"></div>
 <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
  <div class="carousel-inner">

    <!-- First Slide -->
    <div class="carousel-item active">
      <div class="d-flex">
        <!-- Card 1 -->
        <div class="carousel-card-blog px-2">
          <!-- Your card HTML -->
          <article class="cs_post cs_style_2 cs_white_bg">
            <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
              <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
              <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
              <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_mp0">
                <li><span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By <a href="#">admin</a></li>
                <li><span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span><a href="#">4 comments</a></li>
              </ul>
              <h2 class="cs_post_title cs_fs_24 cs_semibold">
                <a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a>
              </h2>
              <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>

        <!-- Repeat for Card 2 -->
        <div class="carousel-card-blog px-2">
         <article class="cs_post cs_style_2 cs_white_bg">
            <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
              <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
              <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
              <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_mp0">
                <li><span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By <a href="#">admin</a></li>
                <li><span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span><a href="#">4 comments</a></li>
              </ul>
              <h2 class="cs_post_title cs_fs_24 cs_semibold">
                <a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a>
              </h2>
              <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>

        <!-- Repeat for Card 3 -->
        <div class="carousel-card-blog px-2 d-none d-lg-block">
          <article class="cs_post cs_style_2 cs_white_bg">
            <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
              <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
              <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
              <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_mp0">
                <li><span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By <a href="#">admin</a></li>
                <li><span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span><a href="#">4 comments</a></li>
              </ul>
              <h2 class="cs_post_title cs_fs_24 cs_semibold">
                <a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a>
              </h2>
              <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>

    <!-- Second Slide -->
    <div class="carousel-item">
      <div class="d-flex">
        <!-- Card 4 -->
        <div class="carousel-card-blog px-2">
        <article class="cs_post cs_style_2 cs_white_bg">
            <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
              <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
              <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
              <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_mp0">
                <li><span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By <a href="#">admin</a></li>
                <li><span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span><a href="#">4 comments</a></li>
              </ul>
              <h2 class="cs_post_title cs_fs_24 cs_semibold">
                <a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a>
              </h2>
              <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>

        <!-- Card 5 -->
        <div class="carousel-card-blog px-2">
         <article class="cs_post cs_style_2 cs_white_bg">
            <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
              <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
              <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
              <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_mp0">
                <li><span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By <a href="#">admin</a></li>
                <li><span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span><a href="#">4 comments</a></li>
              </ul>
              <h2 class="cs_post_title cs_fs_24 cs_semibold">
                <a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a>
              </h2>
              <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>

        <!-- Card 6 or clone -->
        <div class="carousel-card-blog px-2 d-none d-lg-block">
         <article class="cs_post cs_style_2 cs_white_bg">
            <a href="{{ route('blogdetails') }}" class="cs_post_thumb cs_zoom overflow-hidden position-relative">
              <img src="https://cdn.pixabay.com/photo/2020/03/14/14/07/asia-4930731_1280.jpg" alt="Post Thumb" class="cs_zoom_in">
              <div class="cs_posted_by cs_radius_2 cs_fs_16 cs_medium cs_white_color position-absolute">30 May</div>
              <div class="cs_post_overlay cs_radius_5 position-absolute"></div>
            </a>
            <div class="cs_post_info">
              <ul class="cs_post_meta cs_mp0">
                <li><span class="cs_primary_color"><i class="fa-regular fa-circle-user"></i></span>By <a href="#">admin</a></li>
                <li><span class="cs_primary_color"><i class="fa-regular fa-comment"></i></span><a href="#">4 comments</a></li>
              </ul>
              <h2 class="cs_post_title cs_fs_24 cs_semibold">
                <a href="{{ route('blogdetails') }}">Travel the most beautiful places in the world</a>
              </h2>
              <hr>
              <a href="{{ route('blogdetails') }}" class="cs_post_btn cs_fs_18 cs_medium cs_primary_color">
                Read More <i class="fa-solid fa-arrow-right-long"></i>
              </a>
            </div>
          </article>
        </div>
      </div>
    </div>

  </div>
</div>
     </div>
</section>


{{-- hero part start js --}}
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



{{-- hero part end js--}}

{{-- package js start  --}}

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

{{-- pacakage js end  --}}

{{-- testimonial start js  --}}
<script>
  $(document).ready(function () {
    $('.cs_slider_wrapper').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 4000,
      infinite: true,
      arrows: false,
      dots: true,
      adaptiveHeight: true
    });
  });
</script>

{{-- testtimonial end js --}}

{{-- new testimonial start js  --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
      class TestimonialCarousel {
        constructor() {
          this.track = document.getElementById("carouselTrack");
          this.slides = document.querySelectorAll(".testimonial-slide");
          this.indicators = document.getElementById("indicators");
          this.progressBar = document.getElementById("progressBar");
          this.currentIndex = 0;
          this.isAutoPlaying = true;
          this.autoPlayInterval = null;
          this.progressInterval = null;
          this.autoPlayDuration = 5000; // 5 seconds

          this.init();
        }

        init() {
          this.createIndicators();
          this.updateCarousel();
          this.startAutoPlay();
          this.addEventListeners();
        }

        createIndicators() {
          const totalSlides = this.slides.length;
          const slidesToShow = this.getSlidesToShow();
          const totalIndicators = Math.ceil(totalSlides / slidesToShow);

          for (let i = 0; i < totalIndicators; i++) {
            const indicator = document.createElement("div");
            indicator.classList.add("indicator");
            if (i === 0) indicator.classList.add("active");
            indicator.addEventListener("click", () => this.goToSlide(i));
            this.indicators.appendChild(indicator);
          }
        }

        getSlidesToShow() {
          if (window.innerWidth <= 768) return 1;
          if (window.innerWidth <= 1024) return 2;
          return 3;
        }

        updateCarousel() {
          const slidesToShow = this.getSlidesToShow();
          const slideWidth = 100 / slidesToShow;
          const translateX = -this.currentIndex * slideWidth;

          this.track.style.transform = `translateX(${translateX}%)`;
          this.updateIndicators();
        }

        updateIndicators() {
          const indicators = this.indicators.querySelectorAll(".indicator");
          const slidesToShow = this.getSlidesToShow();
          const activeIndicator = Math.floor(this.currentIndex / slidesToShow);

          indicators.forEach((indicator, index) => {
            indicator.classList.toggle("active", index === activeIndicator);
          });
        }

        nextSlide() {
          const slidesToShow = this.getSlidesToShow();
          const maxIndex = this.slides.length - slidesToShow;

          if (this.currentIndex >= maxIndex) {
            this.currentIndex = 0;
          } else {
            this.currentIndex++;
          }

          this.updateCarousel();
          this.resetAutoPlay();
        }

        previousSlide() {
          const slidesToShow = this.getSlidesToShow();
          const maxIndex = this.slides.length - slidesToShow;

          if (this.currentIndex <= 0) {
            this.currentIndex = maxIndex;
          } else {
            this.currentIndex--;
          }

          this.updateCarousel();
          this.resetAutoPlay();
        }

        goToSlide(index) {
          const slidesToShow = this.getSlidesToShow();
          this.currentIndex = index * slidesToShow;
          this.updateCarousel();
          this.resetAutoPlay();
        }

        startAutoPlay() {
          if (!this.isAutoPlaying) return;

          this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
          }, this.autoPlayDuration);

          this.startProgressBar();
        }

        startProgressBar() {
          let progress = 0;
          this.progressInterval = setInterval(() => {
            progress += 100 / (this.autoPlayDuration / 100);
            this.progressBar.style.width = `${progress}%`;

            if (progress >= 100) {
              progress = 0;
              this.progressBar.style.width = "0%";
            }
          }, 100);
        }

        resetAutoPlay() {
          if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
          }
          if (this.progressInterval) {
            clearInterval(this.progressInterval);
          }
          this.progressBar.style.width = "0%";
          this.startAutoPlay();
        }

        addEventListeners() {
          window.addEventListener("resize", () => {
            this.updateCarousel();
          });

          // Pause auto-play on hover
          const container = document.querySelector(".carousel-container-testimonial");
          container.addEventListener("mouseenter", () => {
            this.isAutoPlaying = false;
            if (this.autoPlayInterval) clearInterval(this.autoPlayInterval);
            if (this.progressInterval) clearInterval(this.progressInterval);
          });

          container.addEventListener("mouseleave", () => {
            this.isAutoPlaying = true;
            this.resetAutoPlay();
          });

          // Touch/swipe support for mobile
          let startX = 0;
          let endX = 0;

          container.addEventListener("touchstart", (e) => {
            startX = e.touches[0].clientX;
          });

          container.addEventListener("touchend", (e) => {
            endX = e.changedTouches[0].clientX;
            const diffX = startX - endX;

            if (Math.abs(diffX) > 50) {
              if (diffX > 0) {
                this.nextSlide();
              } else {
                this.previousSlide();
              }
            }
          });
        }
      }

      function playVideo(container, videoId) {
        const iframe = document.createElement("iframe");
        iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
        iframe.allow =
          "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
        iframe.allowFullscreen = true;
        iframe.style.width = "100%";
        iframe.style.height = "100%";
        iframe.style.border = "none";
        iframe.style.borderRadius = "15px";

        container.innerHTML = "";
        container.appendChild(iframe);

        // Add pulse animation to the card
        const card = container.closest(".testimonial-card");
        card.classList.add("pulse-animation");
        setTimeout(() => {
          card.classList.remove("pulse-animation");
        }, 2000);
      }

      function nextSlide() {
        carousel.nextSlide();
      }

      function previousSlide() {
        carousel.previousSlide();
      }

      // Initialize carousel when DOM is loaded
      let carousel;
      document.addEventListener("DOMContentLoaded", () => {
        carousel = new TestimonialCarousel();
      });
    </script>

{{-- new testimonial end js  --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    new bootstrap.Carousel(document.getElementById("blogCarousel"), {
      interval: 5000,
      wrap: true
    });
  });
</script>



{{-- <div class="cs_height_135 cs_height_lg_75"></div> --}}
<!-- End Blog Section -->

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('tourGrid');
        const cards = Array.from(container.children);
        const totalCards = cards.length;
        let start = 0;
        const visibleCount = 6;
        const interval = 3000; // 3 seconds

        function updateCards() {
            container.innerHTML = ''; // Clear container

            for (let i = 0; i < visibleCount; i++) {
                const index = (start + i) % totalCards;
                container.appendChild(cards[index].cloneNode(true));
            }

            start = (start + 1) % totalCards;
        }

        updateCards(); // Initial load
        setInterval(updateCards, interval); // Rotate every 3s
    });
</script>
