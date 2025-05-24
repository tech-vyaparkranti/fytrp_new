@extends('layout.layout')
@section('title', $blogs->meta_title)
@section('meta_description', $blogs->meta_description)
@section('meta_keywords', $blogs->meta_keyword)
@section('content')
    <!-- Start Hero Section -->
    <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='Single Blog' />
    <!-- End Hero Section -->
    
    <!-- Start Blog Section -->
   <section>
    <div class="cs_height_140 cs_height_lg_80"></div>
    <div class="container">
      <div class="row cs_gap_y_50">
        <div class="col-lg-8">
          <article class="cs_post_details">
            <div class="position-relative" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
              <img src="{{ asset($blogs->image) }}" alt="Post Thumb">
              <span class="cs_post_label"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Travel/Tour</span>
            </div>
            <h2 data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{{ $blogs->title }}</h2>
            <p data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50" class="text-justify">{{ $blogs->content }}</p>
            </p>
            <!-- <blockquote>“Ei elit omnes impedit ius, vel et hinc agam fabulas. Ut audiamre iracundia vim. An sumo diam ea. Cu omnis.”</blockquote> -->
            <div class="row blog-detail-images">
              <div class="col-sm-5" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <img src="{{ asset($blogs->image2) }}" alt="Destination Image">
              </div>
              <div class="col-sm-7" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                <img src="{{ asset($blogs->image3) }}" alt="Destination Image">
              </div>
            </div>
            <p data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{{ $blogs->short_content }}</p>
          </article>
        </div>
        <aside class="col-lg-4">
          <div class="cs_sidebar cs_right_sidebar">
            <div class="cs_sidebar_item cs_gray_bg">
              <h3 class="cs_sidebar_widget_title cs_fs_24 cs_semibold" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Popular Post</h3>
              <hr>
              <ul class="cs_recent_posts cs_mp0">
                @foreach($otherBlogs as $otherBlog)
                <li>
                  <article class="cs_recent_post">
                    <a href="{{ route('blogdetail', ['slug' => $otherBlog->slug]) }}" class="cs_recent_post_thumb cs_zoom" data-aos="fade-up">
                      <img src="{{ asset($otherBlog->image) }}" alt="{{ $otherBlog->title }}" class="cs_zoom_in w-100 h-100 object-fit-cover">
                    </a>
                    <div class="cs_recent_post_info">
                      <h3 class="cs_recent_post_title cs_fs_16 cs_medium cs_secondary_font"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <a href="{{ route('blogdetail', ['slug' => $otherBlog->slug]) }}">{{ $otherBlog->title }}</a>
                      </h3>
                      <div class="cs_recent_post_date cs_fs_14" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{{ $otherBlog->blog_date }}</div>
                    </div>
                  </article>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
    <div class="cs_height_140 cs_height_lg_80"></div>
   </section>
   <!-- End Blog Section -->
    <style>
      .blog-detail-images img{
        max-height: 400px;
        min-height: 400px;
        object-fit: cover;
      }
      .cs_post_details p {
    margin-bottom: 30px;
    text-align: justify !important;
}
.cs_post_details img {
    border-radius: 0px;
    margin-bottom: 30px;
    max-width: 100%;
    max-height: 400px;
    min-height: 400px;
    object-fit: cover;
    min-width: 100%;
}
    </style>
  @endsection