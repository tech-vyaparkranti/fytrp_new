@extends('layout.layout')
@section('title', 'Hotels')
@section('content')

  <!-- Start Hero Section -->
  <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_single_bg.jpeg' title='Hotels' />
  <!-- End Hero Section -->

  <!-- Start destination Section -->
  <section>
    <!-- <div class="cs_height_140 cs_height_lg_50"></div> -->
    <section class="destination-details">
    <div class="cs_height_50 cs_height_lg_80"></div>
    <div class="container">
      <div class="col-md-12">
      <div class="event-collarge">

        <div class="event-collarge-container">

        @if (!empty($hotel_images) && is_array($hotel_images))

        @foreach($hotel_images as $image)
        <div class="event-collarge-item mb-2">
            <a href="{{ asset($image) }}" target="_blank">
                <img src="{{ asset($image) }}" 
                     alt="Collarge" class="img-fluid">
            </a>
        </div>
    @endforeach
        @else
        <div class="event-collarge-item mb-2">
            <a href="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (1).jpg"
            target="_blank">
            <img
              src="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (1).jpg"
              alt="Collarge" class="img-fluid">
            </a>
          </div>
          <div class="event-collarge-item mb-2">
            <a href="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (2).jpg"
            target="_blank">
            <img
              src="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (2).jpg"
              alt="Collarge" class="img-fluid">
            </a>
          </div>
          <div class="event-collarge-item mb-2">
            <a href="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (3).jpg"
            target="_blank">
            <img
              src="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (3).jpg"
              alt="Collarge" class="img-fluid">
            </a>
          </div>
          <div class="event-collarge-item mb-2">
            <a href="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (4).jpg"
            target="_blank">
            <img
              src="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (4).jpg"
              alt="Collarge" class="img-fluid">
            </a>
          </div>
          <div class="event-collarge-item mb-2">
            <a href="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (5).jpg"
            target="_blank">
            <img
              src="https://www.travelbrace.com/storage/website/uploads/destination_images/1738868771_Azerbaijan (5).jpg"
              alt="Collarge" class="img-fluid">
            </a>
          </div>
        @endif
        
        </div>




      </div>
      </div>
      <div class="iternary-container row">

      <div class="itenrary-left-section col-lg-8 col-md-6 col-sm-12 col-12 mb-3 mt-3">
        
        <h2>{{ $hotel->hotel_name ?? "Azerbaijan"}}</h2>
        <div class="iternary-section">

        </div>
        <hr>
        <div class="iternary-content">
        <h4 class="mb-3 mt-3">Trip Highlights</h4>
        <ul class="trip-details">
          <p>{!! $hotel->description?? 
           
            `The "Land of Fire" is a fascinating country where ancient customs merge seamlessly with modern
          discoveries. Baku, the capital, glistens with futuristic architecture represented by the Flame Towers
          and the Heydar Aliyev Center, i.e. the opposite of the historic Old City known as Icherisheher. The mud
          volcanoes of Gobustan, the eternal flames of Yanar Dag, and the Sheki Khan's Palace, amongst others,
          comprise Azerbaijan's natural and cultural riches. The adventure-seeking tourist may wander through the
          Caucasus mountains, while the Caspian Sea coast offers peaceful retreats. Known for its distinctive
          cuisine featuring such delicacies as plov, dolma, and kebabs, Azerbaijan is a blend of history,
          adventure, and modern-day luxury, an emerging paradise for travelers.
          Highlights include:
          • Modern Wonders: Flame Towers, Heydar Aliyev Center, Baku Boulevard
          • Historical Sites: Icherisheher, Sheki Khan's Palace, Maiden Tower
          • Natural Attractions: Mud Volcanoes, Yanar Dag, Caucasus Mountains
          • Local Cuisine: Plov, Dolma, Caspian seafood`  !!}</p>

        </ul>
        </div>
      </div>

      <div class="itenrary-right-section col-lg-4 col-md-6 col-sm-12 col-12 mb-3 ">
      <div class="cs_height_50 cs_height_lg_80"></div>
      <div class="enquiry-send-form">
    <div class="enquire-form-button pb-2">
        {{-- <div class="button-form-book">
            <button id="bookNowBtn" disabled>Book Now</button>
        </div> --}}
        <div class="button-form-book">
            <button id="enquiryNowBtn">Enquiry Now</button>
        </div>
    </div>

    <!-- Book Now Form -->
    <div id="bookNowForm" class="form-container active">
        <!-- <p class="text-center">Book Now Form</p> -->
        <form>
            <label for="bookName"> Full Name*</label>
            <input type="text" id="bookName" required><br>
            <label for="bookPhone">Phone Number*</label>
            <input type="text" id="bookPhone" required><br>
            {{-- <label for="bookAmount">Payment Amount</label>
            <input type="text" id="bookAmount"><br> --}}
            <label for="bookMessage">Message</label>
            <textarea id="bookMessage"></textarea><br>
            <div class="form-submit">
                <button type="submit">Enquiry</button>
            </div>
        </form>
    </div>

    <!-- Enquiry Now Form -->
    <div id="enquiryNowForm" class="form-container">
        <!-- <p class="text-center">Enquiry Now Form</p> -->
        <form>
            <label for="enquiryName">Full Name*</label>
            <input type="text" id="enquiryName" required><br>
            <label for="enquiryPhone">Phone Number*</label>
            <input type="text" id="enquiryPhone" required><br>
            <label for="enquiryMessage">Message</label>
            <textarea id="enquiryMessage"></textarea><br>
            <div class="form-submit">
                <button type="submit">Send Enquiry</button>
            </div>
        </form>
    </div>

</div>
<style>
    .form-container {
        display: none;
    }

    .form-container.active {
        display: block;
    }
</style>


<script>
    const bookNowBtn = document.getElementById('bookNowBtn');
    const enquiryNowBtn = document.getElementById('enquiryNowBtn');
    const bookNowForm = document.getElementById('bookNowForm');
    const enquiryNowForm = document.getElementById('enquiryNowForm');

    enquiryNowBtn.addEventListener('click', () => {
        bookNowForm.classList.remove('active');
        enquiryNowForm.classList.add('active');
        enquiryNowBtn.disabled = true;
        bookNowBtn.disabled = false;
    });

    bookNowBtn.addEventListener('click', () => {
        enquiryNowForm.classList.remove('active');
        bookNowForm.classList.add('active');
        bookNowBtn.disabled = true;
        enquiryNowBtn.disabled = false;
    });
</script>

<style>
    .form-container {
        width: 100%;
        /* max-width: 400px; */
        background: #fff;
        padding: 20px;
        border-radius: 10px;
       
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .form-container input,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 9px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-container button {
        width: 100%;
        padding: 10px;
        background-color: var(--primary);
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-container button:hover {
        background-color: var(--primary);
    }

    /* General fixed size for most images */
    .fixed-image-size img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 5px;
        margin-top: 10px;
    }
.enquiry-send-form{
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
    /* Unique style for the second image */
    .unique-image-size img {
        width: 100%;
        margin-top: 10px;
        height: 610px;
        object-fit: cover;
        /* Taller height for the second image */
        /* object-fit: contain; Ensures the whole image is visible */
        border-radius: 10px;
        /* Different rounded corners */
        /* border: 2px solid #ccc; Optional: Add a border for distinction */
    }

    .cross li i {
        font-size: 18px;
        margin-right: 15px;
        /* color: green; */
        color: red;
    }

    @media(max-width:992px) {
        .below-image {
            display: flex;
            justify-content: center !important;
            grid-gap: 10px;
            margin-top: -10px !important;
        }

        .fixed-image-size img {
            width: 100%;
            height: 300px;
            max-width: 552px !important;
            min-width: 376px !important;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
        }
    }


    @media (max-width: 768px) {
        .form-container {
            width: 95%;
            padding: 15px;
        }

        .form-container h2 {
            font-size: 18px;
        }

        .form-container input,
        .form-container select {
            font-size: 13px;
            padding: 8px;
        }

        .form-container button {
            font-size: 14px;
            padding: 8px;
        }

        .below-image {
            display: block;
            justify-content: center !important;
            grid-gap: 10px;
            margin-top: -10px !important;
        }

        .fixed-image-size img {
            width: 100% !important;
            min-width: 100% !important;
            object-fit: cover;
        }

        .unique-image-size img {
            width: 100%;
            margin-top: 0px !important;
            height: 300px;
            /* Taller height for the second image */
            /* object-fit: contain; Ensures the whole image is visible */
            border-radius: 10px;
            object-fit: cover;
            /* Different rounded corners */
            /* border: 2px solid #ccc; Optional: Add a border for distinction */
        }
    }

    @media (max-width: 480px) {
        .form-container {
            width: 100%;
            border-radius: 0;
        }

        .form-container h2 {
            font-size: 16px;
        }
    }
</style>
<style>
    .button-form-book button {
        background-color: #56a356;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .button-form-book button.active {
        opacity: 0.8;
        /* background-color: red;  */
    }

    .button-form-book button:disabled {
        background-color:var(--accent);
        /* cursor: not-allowed; */
    }

    .form-container {
        display: none;
    }

    .form-container.active {
        display: block;
    }
</style>

<script>
    const bookNowBtn = document.getElementById('bookNowBtn');
    const enquiryNowBtn = document.getElementById('enquiryNowBtn');
    const bookNowForm = document.getElementById('bookNowForm');
    const enquiryNowForm = document.getElementById('enquiryNowForm');

    // Add initial active class for Book Now button
    bookNowBtn.classList.add('active');

    enquiryNowBtn.addEventListener('click', () => {
        bookNowForm.classList.remove('active');
        enquiryNowForm.classList.add('active');
        enquiryNowBtn.classList.add('active');
        bookNowBtn.classList.remove('active');
    });

    bookNowBtn.addEventListener('click', () => {
        enquiryNowForm.classList.remove('active');
        bookNowForm.classList.add('active');
        bookNowBtn.classList.add('active');
        enquiryNowBtn.classList.remove('active');
    });
</script>






<style>
    form.tab-content {
        display: none
    }

    .tabBtns {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
    }

    .tab-button.active {
        background-color: rgb(var(--steel-blue));
    }

    .tour-include-exclude .check li i {
        color: #63ab45;
    }

    .list-style-one li i {
        color: red
    }

    .tour-include-exclude {
        border-radius: 10px;
        padding: 35px 50px 28px;
        border: 1px solid rgb(var(--steel-blue));
    }

    .accordion-button:not(.collapsed) {
        color: rgb(var(--steel-blue));
        background-color: rgb(var(--steel-blue) / 10%);
        box-shadow: none;
        outline: none !important;
    }

    @media(max-width:992px) {
        .tour-include-exclude {
            border-radius: 10px;
            padding: 10px 10px 20px !important;
            border: 1px solid rgb(var(--steel-blue));
        }
    }

    /* .button-form-book button {
        background-color: green;
        padding: 8px 50px;
        color: white;
        border-radius: 8px;
        grid-gap: 10px;
        /* width:50%; */

    .enquire-form-button {
        display: flex;
        grid-gap: 50px;
        justify-content: center;

    }

    .button-book button {
        width: 100%;
        background-color:var(--primary) ;
        color: white;
        display: block;
        margin: auto;
        padding: 8px 50px;
        border-radius: 8px;
        margin-left: 7px;

    }
    input, textarea {
    color: var(--primary);
    transition: all 0.4sease;
    width: 100%;
}

    .button-form-book button {
        width: 100%;
        background-color:var(--primary);
        color: white;
        display: block;
        margin: auto;
        padding: 8px 50px;
        border-radius: 8px;
        /* margin-left: 7px; */
    }

    .form-submit button {
        background-color:var(--accent) !important;
    }

    button#bookNowBtn :active{
        background-color: var(--accent) !important;
    }

    button#enquiryNowForm :active {
        background-color: var(--accent) !important;
    }
</style>
      </div>
      </div>
      <h4 class="text-center mb-2 mt-2">Similar Hotels</h4>
      <div class="swiper packages mt-4">
      <div class="swiper-wrapper">
        @if (isset($allhotels) && count($allhotels) > 0)
        @foreach ($allhotels as $item)
            @php
                // Ensure hotel_image is a valid JSON string before decoding
                $images = is_string($item->hotel_image)
                    ? json_decode($item->hotel_image, true)
                    : $item->hotel_image;

                // Check if images is a valid array and get the first image
                $displayImage = is_array($images) && !empty($images) ? $images[0] : null;
            @endphp
              <div class="swiper-slide image" onclick="window.location.href='{{ route('hotelDetails', ['slug' => $item->hotel_name]) }}'">
                <img src="{{ asset($displayImage) }}" alt="Almaty &amp; Baku">
                <h4 class="text-center mt-2">{{ $item->hotel_name }}</h4>
            </div>
            @endforeach
        @else

        <div class="swiper-slide image">
           <img src="https://www.travelbrace.com/storage/website/uploads/package_images/1738903357_image1.jpg"
              alt="Almaty &amp; Baku">
              <h3 class="text-center mt-2">Nepal</h3>
         </div>
         <div class="swiper-slide image">
           <img src="https://www.travelbrace.com/storage/website/uploads/package_images/1738903357_image1.jpg"
              alt="Almaty &amp; Baku">
              <h3 class="text-center mt-2">Nepal</h3>
         </div>
         <div class="swiper-slide image">
           <img src="https://www.travelbrace.com/storage/website/uploads/package_images/1738903357_image1.jpg"
              alt="Almaty &amp; Baku">
              <h3 class="text-center mt-2">Nepal</h3>
         </div>
         <div class="swiper-slide image">
           <img src="https://www.travelbrace.com/storage/website/uploads/package_images/1738903357_image1.jpg"
              alt="Almaty &amp; Baku">
              <h3 class="text-center mt-2">Nepal</h3>
         </div>
         <div class="swiper-slide image">
           <img src="https://www.travelbrace.com/storage/website/uploads/package_images/1738903357_image1.jpg"
              alt="Almaty &amp; Baku">
              <h3 class="text-center mt-2">Nepal</h3>
         </div>
         @endif
      </div>
      </div>
    </div>
    </section>
    <style>
        .img-fluid {
    max-width: 100%;
    min-width: 100%;
    /* height: 100%; */
    object-fit: cover;
    /* height: auto; */
}
.event-collarge-item img.img-fluid {
    height: 100%;
    width: 100%;
    object-fit: cover;
}
.event-collarge-container {
    display: grid
;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2px 10px;
    height: 100%;
}
    button.btn.default-btn.font-weight-bold {
      background-color: #30306c !important;
      color: white;
    }
    @media (max-width: 460px) {
    .event-collarge-container {
        display: block;
    }
}
    </style>
    <div class="cs_height_140 cs_height_lg_80"></div>
  </section>
  <!-- End destination Section -->
  <style>
    .swiper-slide {
      box-shadow:10px 10px 20px rgba(0, 0, 0, 0.3);
      padding:5px;
    }
    .swiper-slide img{
        width: 310px;
        height:200px;
    }
    .cs_card_thumb.destination-image img {
    max-width: 400px;
    min-width: 400px;
    min-height: 400px;
    max-height: 400px;
    object-fit: cover;
    }

    .cs_grid.detsination-page {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    }

    @media(max-width:768px) {
    .cs_grid.detsination-page {
      display: block !important;
      /* grid-template-columns: repeat(3,1fr); */
    }
    }

    button.btn.default-btns.font-weight-bold {
    background-color: white !important;
    color: #30306c;
    }

    .main-one {
    display: flex;
    }
@media(min-width:769px){
    .event-collarge-container {
    display: grid;
    grid-template-rows: repeat(2, 1fr);
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2px 10px;
    height: 100%;
    }
.event-collarge{
    /* position:relative; */
    overflow: hidden;
    height:440px;
}
.event-collarge-container{
    position: abosolute !important;
    overflow: hidden;

}
    .event-collarge-container .event-collarge-item:first-child {
    grid-column: 1 / 3;
    grid-row: 1 / 3;
    }

    .event-collarge-container .event-collarge-item:nth-child(2) {
    grid-column: 3 / 4;
    grid-row: 1 / 2;
    }

    .event-collarge-container .event-collarge-item:nth-child(3) {
    grid-column: 3 / 4;
    grid-row: 2 / 3;
    }
  }
    .trip-details {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    /* height: 615px; */
    /* height: 615px; */
    margin: 20px auto;
}


@media (max-width: 768px) {
    .trip-details {
        height: 600px;
    }
}


@media (max-width: 480px) {
    .trip-details {
        height: auto;
        min-height: 600px;
    }
}
/* .enquiry-send-form {
    border: 1px solid lightgrey;
    border-radius: 8px;
    padding: 10px 15px;
}
.form-group {
    margin-bottom: 15px;
}
.form-group button {
    background-color: var(--accent);
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}
.price-details {
    display: flex
;
    grid-gap: 10px;
    align-items: center;
}
input {
    transition: all 500msease;
}
.form-group {
    margin-bottom: 15px;
}
.form-group .phone-number .nice-select, .form-group input, .form-group textarea, .form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    color: grey;
} */
  </style>
  
@endsection