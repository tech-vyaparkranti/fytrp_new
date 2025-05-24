@extends('layout.layout')

@section('title', 'Services')
@section('content')

<x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='Our Services' />

<!-- Tour Grid Area Start -->
<div class="default-content pt-120 pb-3">
    <div class="container"> <!-- Added container class -->
        <div class="site-title pb-3" data-aos="fade-up">
            <h2 class="text-center mt-4" data-aos="fade-up"> Our Services</h2>
            <p class="text-center p-2">
                {!! $our_services_subheading ?? 'We provide a wide range of services that cater to both individual travelers and corporate clients. <a href="https://www.book365days.com/gallery" style="color: black; font-weight: 500; text-decoration: none;">Here’s a glimpse of what we offer</a>:' !!}
            </p>
                    </div>
        <div class="midd-content">
            @if (!empty($ourServices) && count($ourServices))
            @foreach ($ourServices as $item)
                <div class="services-container">
                    <div class="left-item mb-3" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ $item->service_image }}" alt="service-img">
                    </div>
                    <div class="right-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h4>{{ $item->service_name }}</h4>
                        <p>{!! $item->service_details !!}</p>
                        <a href="{{ route('contact') }}"><p class="btn enquireNow">Enquiry Now</p></a>
                    </div>
                </div>
            @endforeach
            @else
                <!-- Static Services Section -->
                <div class="services-container">
                    <div class="left-item mb-3" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="./assets/images/package_img_7.jpeg" alt="service-img">
                    </div>
                    <div class="right-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h4>Custom Travel Packages</h4>
                        <p>Custom Travel Packages is one of the services we put forward, showing our adaptation to every
                            client&#39;s differing interests, preferences, and budgets. We know that any customer may
                            want a romantic getaway, a family vacation, or a solo adventure. We work closely with the client so
                            we come up with a tailor-made itinerary that reflects all his or her desires.</p>
                        <a href="{{ route('contact') }}"><p class="btn enquireNow">Enquiry Now</p></a>
                    </div>
                </div>
                <!-- Additional Static Services -->
                <div class="services-container">
                    <div class="left-item mb-3" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="./assets/images/package_img_7.jpeg" alt="service-img">
                    </div>
                    <div class="right-item" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <h4>Flight and Hotel Bookings</h4>
                        <p>In the present scenario, it can be very overwhelming to find the right flights and
                            accommodation given the hundreds of choices out there. At Trip Closure, we simplify the Flight and Hotel
                            Booking process by giving you varied options that just fit your needs. We have a large airline
                            network and hotel chains, so we can find the best rates and good availability
                            for your travel dates.</p>
                        <a href="{{ route('contact') }}"><p class="btn enquireNow">Enquiry Now</p></a>
                    </div>
                </div>
            @endif
        </div>
    </div> <!-- Closing container -->
</div>
<!-- Tour Grid Area End -->

<style>
    h2 {
        color: #022f5d;
    }
    .services-container:nth-child(2n+1) > div:first-child {
        order: 1;
    }
    .left-item img {
        margin-bottom: 20px;
        display: block;
        margin: auto;
        max-height: 350px;
        min-height: 350px;
        max-width: 400px;
        object-fit: cover;
        min-width: 400px;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);
        border-radius:20px;
    }
    .right-item{
  /* order:1;  */
   width:100%;
}
    .services-container {
  display:block;
  margin:auto;
  max-width:1190px;
  display:flex;
  text-align: justify;
  margin-bottom: 30px;
 }
    @media (max-width:767px){
  .services-container img{
    /* order:1; */
    margin-left:30px;
    margin-bottom:20px;
    max-width: 100% !important;
    min-width: 345px !important;
    object-fit: cover;

  }
  .services-container:nth-child(2n+1) > div:first-child {
    order: 0 !important;
    margin-bottom:20px;
  }
  .services-container{
    flex-wrap: wrap;
    padding:15px;
  }
}
@media (min-width:768px){
  .services-container{
   padding:20px;
   grid-gap:13px;
  }
  .right-item img {
     /* float:right; */
     margin-bottom: 20px;
     display: block;
    margin:auto;
    }
}
@media(max-width:560px){
    .services-container img {
    /* order: 1; */
    margin-left: 0px;
    margin-bottom: 20px;
    max-width: 100% !important;
    min-width: 345px !important;
    object-fit: cover;
}
}
@media(max-width:440px){
    .services-container img {
    /* order: 1; */
    margin-left: 0px;
    margin-bottom: 20px;
    max-width: 100% !important;
    min-width: 360px !important;
    object-fit: cover;
}
}
@media(max-width:400px){
    .services-container img {
    /* order: 1; */
    margin-left: 0px;
    margin-bottom: 20px;
    max-width: 100% !important;
    min-width: 325px !important;
    object-fit: cover;
}
}
@media(max-width:360px){
    .services-container img {
    /* order: 1; */
    margin-left: 0px;
    margin-bottom: 20px;
    max-width: 100% !important;
    min-width: 300px !important;
    object-fit: cover;
}
}
@media(max-width:300px){
    .services-container img {
    /* order: 1; */
    margin-left: 0px;
    margin-bottom: 20px;
    max-width: 100% !important;
    min-width: 297px !important;
    object-fit: cover;

}
}
.right-item .btn {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: white;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    background-color:var(--accent);
    border: 1px solid transparent;
    padding: 14px 26px;
    font-size: 18px;
    border-radius: 1.25rem;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
.right-item .btn:hover{
  background-color: white;
  color:var(--accent);
  border:1px solid var(--accent);
 }
 @media (min-width: 820px) and (max-width: 1180px){
    .services-container {
    display: block;
    margin: auto;
    max-width: 1190px;
    /* display: flex; */
    text-align: justify;
    margin-bottom: 30px;
}
  }
  @media (min-width: 768px) and (max-width: 1024px){
    .services-container {
    display: block;
    margin: auto;
    max-width: 1190px;
    /* display: flex; */
    text-align: justify;
    margin-bottom: 30px;
}
  }
  @media (min-width: 1024px) and (max-width: 1366px){
    .services-container {
    display: block;
    margin: auto;
    max-width: 1190px;
    /* display: flex; */
    text-align: justify;
    margin-bottom: 30px;
    grid-gap:20px;
}
  }
</style>
@endsection
