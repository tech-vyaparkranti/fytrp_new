    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/ripples.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/light_gallery.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <a class="footer-whatsapp" aria-label="Whatsapp Button"
    href="https://wa.me/+91{!! $whatsapp_footer_link ?? '9711433495' !!}?text=Let%27s+start+build+a+project"><img
        src="{{ asset('./assets/images/whatsapp.png') }}" alt="Whatsapp" class="img-fluid" height=""
        width="150"></a>
<a class="footer-whatsapp footer-call" aria-label="Phone Call Button"
    href="tel:+91{{ isset($phone_footer_link) ? str_replace(' ', '', $phone_footer_link) : '9711433495' }}"><img
        src="{{ asset('./assets/images/phone-call.png') }}" alt="Phone Call" class="img-fluid" height=""
        width="150"></a>
    <script>
      function errorMessage(error_message) {
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: error_message
          });
      }
  
      function successMessage(success_message, reload = false) {
          Swal.fire({
              icon: 'success',
              title: 'Success',
              text: success_message
          }).then(function() {
              if (reload) {
                  window.location.reload();
              }
          });
      }
  </script>
    <script>
  AOS.init();
</script>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            const submitButton = form.querySelector('button');

            submitButton.disabled = true;

            fetch("{{ route('subscribeNewsLetter') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: formData,
                })
                .then((response) => response.json())
                .then((data) => {
                    alert(data.message);
                    if (data.status) form.reset();
                })
                .catch((error) => {
                    alert("An error occurred. Please try again.");
                    console.error("Error:", error);
                })
                .finally(() => {
                    submitButton.disabled = false;
                });
        });
    });
</script>
<script>
    var swiper = new Swiper('.testimonial', {
        loop: true, // Enable infinite loop
            autoplay: {
                delay: 5000, // Auto-slide every 5 seconds
            },
            // pagination: {
            //     el: '.swiper-pagination',
            //     clickable: true, // Enable pagination clicks
            // },
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            slidesPerView: 1, // Show one slide at a time
            effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },

            
     });
  </script>
  <script>
    var swiper = new Swiper('.usp', {
        loop: true,
       spaceBetween: 20, 
       autoplay: {
         delay: 2500,
         disableOnInteraction: false,
       },
       breakpoints: {
           500:{slidePerView:1},
           768: { slidesPerView: 2 }, 
           1024: { slidesPerView: 4 }
       }       
     });
  </script>
    <script>
        var swiper = new Swiper('.tour_packages', {
            loop: true,
           spaceBetween: 10, 
           autoplay: {
             delay: 2500,
             disableOnInteraction: false,
           },
           breakpoints: {
               500:{slidePerView:1},
               768: { slidesPerView: 2 }, 
               1024: { slidesPerView: 4 }
           }       
         });
      </script>
       <script>
        var swiper = new Swiper('.packages', {
            loop: true,
           spaceBetween: 10, 
           autoplay: {
             delay: 2500,
             disableOnInteraction: false,
           },
           breakpoints: {
               500:{slidePerView:1},
               768: { slidesPerView: 2 }, 
               1024: { slidesPerView: 4 }
           }       
         });
      </script>
          <script>
            var swiper = new Swiper('.destination-package', {
                loop: true,
               spaceBetween: 20, 
               autoplay: {
                 delay: 2500,
                 disableOnInteraction: false,
               },
               breakpoints: {
                   500:{slidePerView:1},
                   768: { slidesPerView: 2 }, 
                   1024: { slidesPerView: 3}
               }       
             });
          </script>
            <script>
                var swiper = new Swiper('.partners', {
                    loop: true,
                   spaceBetween: 20, 
                   autoplay: {
                     delay: 2500,
                     disableOnInteraction: false,
                   },
                   breakpoints: {
                       500:{slidePerView:1},
                       768: { slidesPerView: 2 }, 
                       1024: { slidesPerView: 4}
                   }       
                 });
              </script>
              <script>
                var swiper = new Swiper('.blogs', {
                    loop: true,
                   spaceBetween: 20, 
                   autoplay: {
                     delay: 2500,
                     disableOnInteraction: false,
                   },
                   breakpoints: {
                       500:{slidePerView:1},
                       768: { slidesPerView: 1 }, 
                       1024: { slidesPerView: 2}
                   }       
                 });
              </script>
              <script>
                var swiper = new Swiper('.team', {
                    loop: true,
                   spaceBetween: 20, 
                   autoplay: {
                     delay: 2500,
                     disableOnInteraction: false,
                   },
                   breakpoints: {
                       500:{slidePerView:1},
                       768: { slidesPerView: 2 }, 
                       1024: { slidesPerView: 3}
                   }       
                 });
              </script>