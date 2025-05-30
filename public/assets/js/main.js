(function ($) {
  'use strict';

  /*
  |--------------------------------------------------------------------------
  | Template Name: TravelPro
  | Author: TravelPro
  | Version: 1.0.0
  |--------------------------------------------------------------------------
  |--------------------------------------------------------------------------
  | TABLE OF CONTENTS:
  |--------------------------------------------------------------------------
  |
  | 1. Preloader
  | 2. Mobile Menu
  | 3. Sticky Header
  | 4. Dynamic Background
  | 5. Slick Slider
  | 6. Modal Video
  | 7. Parallax
  | 8. Dynamic contact form
  | 9. Ripple
  | 10. Counter Animation
  | 11. Accordian
  | 12. Tabs
  | 13. Light Gallery
  | 14. Hover To Active
  | 15. Review
  | 16. FAQ number
  | 17. FAQ number
  |
  */

  /*--------------------------------------------------------------
    Scripts initialization
  --------------------------------------------------------------*/
  $.exists = function (selector) {
    return $(selector).length > 0;
  };

  $(window).on('load', function () {
    preloader();
  });

  $(function () {
    mainNav();
    stickyHeader();
    dynamicBackground();
    counterInit();
    slickInit();
    modalVideo();
    parallaxEffect();
    rippleInit();
    accordian();
    tabs();
    lightGallery();
    hoverActive();
    lintNumberGen();
    review();
    select2Init();
    if ($.exists('.wow')) {
      new WOW().init();
    }
  });

  $(window).on('scroll', function () {
    parallaxEffect();
  });

  /*--------------------------------------------------------------
    1. Preloader
  --------------------------------------------------------------*/
  function preloader() {
    $('.cs_preloader').fadeOut();
    $('.cs_preloader_in').delay(150).fadeOut('slow');
  }

  /*--------------------------------------------------------------
    2. Mobile Menu
  --------------------------------------------------------------*/
  function mainNav() {
    $('.cs_nav').append('<span class="cs_menu_toggle"><span></span></span>');
    $('.menu-item-has-children').append(
      '<span class="cs_munu_dropdown_toggle"><span></span></span>',
    );
    $('.cs_menu_toggle').on('click', function () {
      $(this)
        .toggleClass('cs_toggle_active')
        .siblings('.cs_nav_list')
        .toggleClass('cs_active');
    });
    $('.cs_menu_toggle')
      .parents('body')
      .find('.cs_side_header')
      .addClass('cs_has_main_nav');
    $('.cs_menu_toggle')
      .parents('body')
      .find('.cs_toolbox')
      .addClass('cs_has_main_nav');
    $('.cs_munu_dropdown_toggle').on('click', function () {
      $(this).toggleClass('active').siblings('ul').slideToggle();
      $(this).parent().toggleClass('active');
    });
    // Header Search
    $('.cs_search_btn').on('click', function () {
      $('.cs_header_search').addClass('active');
    });
    $('.cs_close, .cs_sidenav_overlay').on('click', function () {
      $('.cs_sidenav, .cs_header_search').removeClass('active');
    });
  }

  /*--------------------------------------------------------------
    3. Sticky Header
  --------------------------------------------------------------*/
  function stickyHeader() {
    var $window = $(window);
    var lastScrollTop = 0;
    var $header = $('.cs_sticky_header');
    var headerHeight = $header.outerHeight() + 30;

    $window.scroll(function () {
      var windowTop = $window.scrollTop();

      if (windowTop >= headerHeight) {
        $header.addClass('cs_gescout_sticky');
      } else {
        $header.removeClass('cs_gescout_sticky');
        $header.removeClass('cs_gescout_show');
      }

      if ($header.hasClass('cs_gescout_sticky')) {
        if (windowTop < lastScrollTop) {
          $header.addClass('cs_gescout_show');
        } else {
          $header.removeClass('cs_gescout_show');
        }
      }

      lastScrollTop = windowTop;
    });
  }

  /*--------------------------------------------------------------
    4. Dynamic Background
  --------------------------------------------------------------*/
  function dynamicBackground() {
    $('[data-src]').each(function () {
      var src = $(this).attr('data-src');
      $(this).css({
        'background-image': 'url(' + src + ')',
      });
    });
  }

  /*--------------------------------------------------------------
    5. Slick Slider
  --------------------------------------------------------------*/
  function slickInit() {
    if ($.exists('.cs_slider')) {
      $('.cs_slider').each(function () {
        // Slick Variable
        var $ts = $(this).find('.cs_slider_container');
        var $slickActive = $(this).find('.cs_slider_wrapper');

        // Auto Play
        var autoPlayVar = parseInt($ts.attr('data-autoplay'), 10);
        // Auto Play Time Out
        var autoplaySpdVar = 3000;
        if (autoPlayVar > 1) {
          autoplaySpdVar = autoPlayVar;
          autoPlayVar = 1;
        }
        // Slide Change Speed
        var speedVar = parseInt($ts.attr('data-speed'), 10);
        // Slider Loop
        var loopVar = Boolean(parseInt($ts.attr('data-loop'), 10));
        // Slider Center
        var centerVar = Boolean(parseInt($ts.attr('data-center'), 10));
        // Variable Width
        var variableWidthVar = Boolean(
          parseInt($ts.attr('data-variable-width'), 10),
        );
        // Pagination
        var paginaiton = $(this)
          .find('.cs_pagination')
          .hasClass('cs_pagination');
        // Slide Per View
        var slidesPerView = $ts.attr('data-slides-per-view');
        if (slidesPerView == 1) {
          slidesPerView = 1;
        }
        if (slidesPerView == 'responsive') {
          var slidesPerView = parseInt($ts.attr('data-add-slides'), 10);
          var lgPoint = parseInt($ts.attr('data-lg-slides'), 10);
          var mdPoint = parseInt($ts.attr('data-md-slides'), 10);
          var smPoint = parseInt($ts.attr('data-sm-slides'), 10);
          var xsPoing = parseInt($ts.attr('data-xs-slides'), 10);
        }
        // Fade Slider
        var fadeVar = parseInt($($ts).attr('data-fade-slide'));
        fadeVar === 1 ? (fadeVar = true) : (fadeVar = false);

        // Slick Active Code
        $slickActive.slick({
          autoplay: autoPlayVar,
          dots: paginaiton,
          centerPadding: '28%',
          speed: speedVar,
          infinite: loopVar,
          autoplaySpeed: autoplaySpdVar,
          centerMode: centerVar,
          fade: fadeVar,
          prevArrow: $(this).find('.cs_left_arrow'),
          nextArrow: $(this).find('.cs_right_arrow'),
          appendDots: $(this).find('.cs_pagination'),
          slidesToShow: slidesPerView,
          variableWidth: variableWidthVar,
          // slidesToScroll: slidesPerView,
          responsive: [
            {
              breakpoint: 1600,
              settings: {
                slidesToShow: lgPoint,
                // slidesToScroll: lgPoint,
              },
            },
            {
              breakpoint: 1200,
              settings: {
                slidesToShow: mdPoint,
                // slidesToScroll: mdPoint,
              },
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: smPoint,
                // slidesToScroll: smPoint,
              },
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: xsPoing,
                // slidesToScroll: xsPoing,
              },
            },
          ],
        });
      });
    }
    // Testimonial Slider
    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      asNavFor: '.slider-nav',
    });

    $('.slider-nav').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      centerMode: true,
      focusOnSelect: true,
      variableWidth: true,
    });
  }

  /*--------------------------------------------------------------
    6. Modal Video
  --------------------------------------------------------------*/
  function modalVideo() {
    if ($.exists('.cs_video_open')) {
      $('body').append(`
        <div class="cs_video_popup">
          <div class="cs_video_popup-overlay"></div>
          <div class="cs_video_popup-content">
            <div class="cs_video_popup-layer"></div>
            <div class="cs_video_popup-container">
              <div class="cs_video_popup-align">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="about:blank"></iframe>
                </div>
              </div>
              <div class="cs_video_popup-close"></div>
            </div>
          </div>
        </div>
      `);
      $(document).on('click', '.cs_video_open', function (e) {
        e.preventDefault();
        var video = $(this).attr('href');

        $('.cs_video_popup-container iframe').attr('src', `${video}`);

        $('.cs_video_popup').addClass('active');
      });
      $('.cs_video_popup-close, .cs_video_popup-layer').on(
        'click',
        function (e) {
          $('.cs_video_popup').removeClass('active');
          $('html').removeClass('overflow-hidden');
          $('.cs_video_popup-container iframe').attr('src', 'about:blank');
          e.preventDefault();
        },
      );
    }
  }

  /*--------------------------------------------------------------
    7. Parallax
  --------------------------------------------------------------*/
  function parallaxEffect() {
    $('.cs_parallax').each(function () {
      var windowScroll = $(document).scrollTop(),
        windowHeight = $(window).height(),
        barOffset = $(this).offset().top,
        barHeight = $(this).height(),
        barScrollAtZero = windowScroll - barOffset + windowHeight,
        barHeightWindowHeight = windowScroll + windowHeight,
        barScrollUp = barOffset <= windowScroll + windowHeight,
        barSctollDown = barOffset + barHeight >= windowScroll;

      if (barSctollDown && barScrollUp) {
        var calculadedHeight = barHeightWindowHeight - barOffset;
        var mediumEffectPixel = barScrollAtZero / 7;
        var miniEffectPixel = calculadedHeight / 10;
        var miniEffectPixel2 = calculadedHeight / 3;
        var miniEffectPixel3 = calculadedHeight / 6;
        var miniEffectPixel4 = barScrollAtZero / 5;
        $(this)
          .find('.cs_to_left')
          .css('transform', `translateX(-${miniEffectPixel}px)`);
        $(this)
          .find('.cs_to_right')
          .css('transform', `translateX(${miniEffectPixel}px)`);
        $(this)
          .find('.cs_to_up')
          .css('transform', `translateY(-${miniEffectPixel}px)`);
        $(this)
          .find('.cs_to_up_2')
          .css('transform', `translateY(-${miniEffectPixel2}px)`);
        $(this)
          .find('.cs_to_up_3')
          .css('transform', `translateY(-${miniEffectPixel3}px)`);
        $(this)
          .find('.cs_to_up_4')
          .css('transform', `translateY(-${miniEffectPixel4}px)`);
        $(this)
          .find('.cs_to_down')
          .css('transform', `translateY(${miniEffectPixel}px)`);
        $(this)
          .find('.cs_to_down_4')
          .css('transform', `translateY(${miniEffectPixel4}px)`);
        $(this)
          .find('.cs_to_rotate')
          .css('transform', `rotate(${miniEffectPixel}deg)`);
        // $(this).css('background-position', `center -${mediumEffectPixel}px`);
      }
    });
  }

  /*--------------------------------------------------------------
    8. Dynamic contact form
  --------------------------------------------------------------*/
  if ($.exists('#cs_form')) {
    const form = document.getElementById('cs_form');
    const result = document.getElementById('cs_result');

    form.addEventListener('submit', function (e) {
      const formData = new FormData(form);
      e.preventDefault();
      var object = {};
      formData.forEach((value, key) => {
        object[key] = value;
      });
      var json = JSON.stringify(object);
      result.innerHTML = 'Please wait...';

      fetch('https://api.web3forms.com/submit', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          Accept: 'application/json',
        },
        body: json,
      })
        .then(async response => {
          let json = await response.json();
          if (response.status == 200) {
            result.innerHTML = json.message;
          } else {
            console.log(response);
            result.innerHTML = json.message;
          }
        })
        .catch(error => {
          console.log(error);
          result.innerHTML = 'Something went wrong!';
        })
        .then(function () {
          form.reset();
          setTimeout(() => {
            result.style.display = 'none';
          }, 5000);
        });
    });
  }

  /*--------------------------------------------------------------
    9. Ripple
  --------------------------------------------------------------*/
  function rippleInit() {
    if ($.exists('.cs_ripple_activate')) {
      $('.cs_ripple_activate').each(function () {
        $('.cs_ripple_activate').ripples({
          resolution: 512,
          dropRadius: 20,
          perturbance: 0.04,
        });
      });
    }
  }

  /*--------------------------------------------------------------
    10. Counter Animation
  --------------------------------------------------------------*/
  function counterInit() {
    if ($.exists('.odometer')) {
      $(window).on('scroll', function () {
        function winScrollPosition() {
          var scrollPos = $(window).scrollTop(),
            winHeight = $(window).height();
          var scrollPosition = Math.round(scrollPos + winHeight / 1.2);
          return scrollPosition;
        }

        $('.odometer').each(function () {
          var elemOffset = $(this).offset().top;
          if (elemOffset < winScrollPosition()) {
            $(this).html($(this).data('count-to'));
          }
        });
      });
    }
  }

  /*--------------------------------------------------------------
    11. Accordian
  --------------------------------------------------------------*/
  function accordian() {
    $('.cs_accordian').children('.cs_accordian_body').hide();
    $('.cs_accordian.active').children('.cs_accordian_body').show();
    $('.cs_accordian_head').on('click', function () {
      $(this)
        .parent('.cs_accordian')
        .siblings()
        .children('.cs_accordian_body')
        .slideUp(250);
      $(this).siblings().slideDown(250);
      $(this)
        .parent()
        .parent()
        .siblings()
        .find('.cs_accordian_body')
        .slideUp(250);
      /* Accordian Active Class */
      $(this).parents('.cs_accordian').addClass('active');
      $(this).parent('.cs_accordian').siblings().removeClass('active');
    });
  }

  /*--------------------------------------------------------------
    12. Tabs
  --------------------------------------------------------------*/
  function tabs() {
    $('.cs_tabs .cs_tab_links a').on('click', function (e) {
      var currentAttrValue = $(this).attr('href');
      $('.cs_tabs ' + currentAttrValue)
        .fadeIn(400)
        .siblings()
        .hide();
      $(this).parents('li').addClass('active').siblings().removeClass('active');
      e.preventDefault();
    });
  }
  /*--------------------------------------------------------------
    13. Light Gallery
  --------------------------------------------------------------*/
  function lightGallery() {
    $('.cs_gallery_list').each(function () {
      $(this).lightGallery({
        selector: '.cs_gallery_item',
        subHtmlSelectorRelative: false,
        thumbnail: false,
        mousewheel: true,
      });
    });
  }

  /*--------------------------------------------------------------
    14. Hover To Active
  --------------------------------------------------------------*/
  function hoverActive() {
    $('.cs_hover_active').hover(function () {
      $(this).addClass('active').siblings().removeClass('active');
    });
  }

  /*--------------------------------------------------------------
    15. Review
  --------------------------------------------------------------*/
  function review() {
    $('.cs_rating').each(function () {
      var review = $(this).data('rating');
      var reviewVal = review * 20 + '%';
      $(this).find('.cs_rating_percentage').css('width', reviewVal);
    });
  }

  /*--------------------------------------------------------------
    16. FAQ number
  --------------------------------------------------------------*/
  function lintNumberGen() {
    let i = 1;
    $('.cs_list_item span').each(function () {
      $(this).html(i);
      i++;
    });
  }

  /*--------------------------------------------------------------
    17. FAQ number
  --------------------------------------------------------------*/
  function select2Init() {
    if ($.exists('.st_select')) {
      $('.st_select').select2({
        minimumResultsForSearch: -1,
        placeholder: function () {
          $(this).data('placeholder');
        },
      });
    }
  }
})(jQuery); // End of use strict


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
 



  document.addEventListener("DOMContentLoaded", function () {
    new bootstrap.Carousel(document.getElementById("blogCarousel"), {
      interval: 5000,
      wrap: true
    });
  });





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

