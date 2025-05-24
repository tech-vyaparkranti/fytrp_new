@extends('layout.layout')
@section('title', 'Blogs')
@section('content')
    <!-- Start Hero Section -->
    <x-hero subTitle='Modern & Beautiful' img='assets/images/destination_header_bg.jpeg' title='Latest Blog' />
    <!-- End Hero Section -->

    <!-- Start Blog Section -->
    <div class="cs_height_140 cs_height_lg_80"></div>
    <div class="container">
        <div class="row cs_gap_y_50">
            <div class="col-lg-8">
              @if (isset($blogs) && count($blogs) > 0)
                   @foreach ($blogs as $item)
                <article class="cs_post cs_style_5">
                    <a href="{{ route('blogdetail', ['slug' => $item->slug]) }}"
                        class="cs_post_thumb cs_zoom"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="w-100 h-100 cs_zoom_in blog-image">
                        <span class="cs_link_hover"><i class="fas fa-link"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"></i></span>
                    </a>
                    <ul class="cs_post_meta cs_mp0 cs_primary_color">
                        <!-- <li class="cs_accent_color">OCTOBER 01, 2024</li> -->
                        <!-- <li>By <a href="#" class="cs_accent_color">JOHN ALEX</a></li> -->
                    </ul>
                    <h2 class="cs_post_title cs_fs_35 cs_semibold"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"><a
                            href="{{ route('blogdetail', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h2>
                    <div class="cs_post_subtitle"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">{{ $item->short_content }}</div>
                    <a href="{{ route('blogdetail', ['slug' => $item->slug]) }}"
                        class="cs_post_btn cs_fs_18 cs_medium cs_primary_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span>Continue Reading</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </article>
                @endforeach
                @else

                <article class="cs_post cs_style_5">
                    <a href=""
                        class="cs_post_thumb cs_zoom"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="assets/images/post_10.jpeg" alt="Post Thumb" class="w-100 h-100 cs_zoom_in">
                        <span class="cs_link_hover"><i class="fas fa-link"></i></span>
                    </a>
                    <ul class="cs_post_meta cs_mp0 cs_primary_color">
                        <!-- <li class="cs_accent_color">OCTOBER 01, 2024</li> -->
                        <!-- <li>By <a href="#" class="cs_accent_color">JOHN ALEX</a></li> -->
                    </ul>
                    <h2 class="cs_post_title cs_fs_35 cs_semibold" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"><a
                            href="">How To Get Strangers To Take Epic
                            Travel</a></h2>
                    <div class="cs_post_subtitle"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Globally coordinate user friendly interfaces through
                        24/365 niche markets. Seamlessly supply accurate human capital with corporate e-markets. Efficiently
                        architect enterprise-wide platforms after error-free process are Completely envisioneer
                        market-driven e-markets through </div>
                    <a href=""
                        class="cs_post_btn cs_fs_18 cs_medium cs_primary_color" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span>Continue Reading</span>
                        <i class="fa-solid fa-arrow-right"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"></i>
                    </a>
                </article>
                <article class="cs_post cs_style_5">
                    <a href=""
                        class="cs_post_thumb cs_zoom"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <img src="assets/images/post_11.jpeg" alt="Post Thumb" class="w-100 h-100 cs_zoom_in">
                        <span class="cs_link_hover"><i class="fas fa-link"></i></span>
                    </a>
                    <ul class="cs_post_meta cs_mp0 cs_primary_color">
                        <!-- <li class="cs_accent_color">OCTOBER 01, 2024</li> -->
                        <!-- <li>By <a href="#" class="cs_accent_color">JOHN ALEX</a></li> -->
                    </ul>
                    <h2 class="cs_post_title cs_fs_35 cs_semibold"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"><a
                            href="">The Top 10 Destinations You Should
                            Visit In</a></h2>
                    <div class="cs_post_subtitle"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Globally coordinate user friendly interfaces through
                        24/365 niche markets. Seamlessly supply accurate human capital with corporate e-markets. Efficiently
                        architect enterprise-wide platforms after error-free process are Completely envisioneer
                        market-driven e-markets through </div>
                    <a href=""
                        class="cs_post_btn cs_fs_18 cs_medium cs_primary_color"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">
                        <span>Continue Reading</span>
                        <i class="fa-solid fa-arrow-right"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50"></i>
                    </a>
                </article>
                @endif
                <!-- <ul class="cs_pagination_box cs_mp0">
                <li>
                  <a class="cs_pagination_item cs_center cs_fs_18 cs_medium active" href="#">1</a>
                </li>
                <li>
                  <a class="cs_pagination_item cs_center cs_fs_18 cs_medium" href="#">2</a>
                </li>
                <li>
                  <a class="cs_pagination_item cs_center cs_fs_18 cs_medium" href="#">3</a>
                </li>
                <li>
                  <a href="#" class="cs_pagination_item cs_center cs_fs_18 cs_medium">
                    <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul> -->
            </div>
            <aside class="col-lg-4">
                <div class="cs_sidebar cs_right_sidebar">
                    {{-- <div class="cs_sidebar_item cs_gray_bg widget_search">
                        <form class="cs_sidebar_search cs_white_bg" action="#">
                            <input type="text" placeholder="Search...">
                            <button class="cs_sidebar_search_btn cs_accent_bg cs_white_color">
                                <i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div> --}}
                    {{-- <div class="cs_sidebar_item cs_gray_bg widget_categories">
                        <h3 class="cs_sidebar_widget_title cs_fs_24 cs_semibold"data-aos="fade-up">Category</h3>
                        <hr>
                        <ul class="cs_mp0">
                            <li class="cs_cat_item cs_primary_color"data-aos="fade-up">
                                <a href="#">Travels</a>
                                <span>(20)</span>
                            </li>
                            <li class="cs_cat_item cs_primary_color"data-aos="fade-up">
                                <a href="#">Camping</a>
                                <div>(35)</div>
                            </li>
                            <li class="cs_cat_item cs_primary_color"data-aos="fade-up">
                                <a href="#">Life Style</a>
                                <div>(10)</div>
                            </li>
                            <li class="cs_cat_item cs_primary_color"data-aos="fade-up">
                                <a href="#">Sight Seeing</a>
                                <span>(25)</span>
                            </li>
                            <li class="cs_cat_item cs_primary_color"data-aos="fade-up">
                                <a href="#">Trekking</a>
                                <span>(40)</span>
                            </li>
                            <li class="cs_cat_item"data-aos="fade-up">
                                <a href="#">Traveling</a>
                                <span>(25)</span>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="cs_sidebar_item cs_gray_bg">
                        <h3 class="cs_sidebar_widget_title cs_fs_24 cs_semibold"data-aos="fade-up" data-aos-duration="1500" data-aos-offset="50">Popular Post</h3>
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
                            {{-- <li>
                                <article class="cs_recent_post">
                                    <a href=""
                                        class="cs_recent_post_thumb cs_zoom"data-aos="fade-up">
                                        <img src="assets/images/latest_post_2.jpeg" alt="Post Thumb"
                                            class="cs_zoom_in w-100 h-100 object-fit-cover">
                                    </a>
                                    <div class="cs_recent_post_info">
                                        <h3
                                            class="cs_recent_post_title cs_fs_16 cs_medium cs_secondary_font"data-aos="fade-up">
                                            <a href="">Top 10 New Car
                                                Available in our Showroom</a>
                                        </h3>
                                        <div class="cs_recent_post_date cs_fs_14"data-aos="fade-up">October 01, 2024</div>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="cs_recent_post">
                                    <a href=""
                                        class="cs_recent_post_thumb cs_zoom"data-aos="fade-up">
                                        <img src="assets/images/latest_post_3.jpeg" alt="Post Thumb"
                                            class="cs_zoom_in w-100 h-100 object-fit-cover">
                                    </a>
                                    <div class="cs_recent_post_info">
                                        <h3
                                            class="cs_recent_post_title cs_fs_16 cs_medium cs_secondary_font"data-aos="fade-up">
                                            <a href="">How to Cool Your
                                                Car Engine Emidietly</a>
                                        </h3>
                                        <div class="cs_recent_post_date cs_fs_14"data-aos="fade-up">October 01, 2024</div>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="cs_recent_post">
                                    <a href=""
                                        class="cs_recent_post_thumb cs_zoom"data-aos="fade-up">
                                        <img src="assets/images/latest_post_4.jpeg" alt="Post Thumb"
                                            class="cs_zoom_in w-100 h-100 object-fit-cover">
                                    </a>
                                    <div class="cs_recent_post_info">
                                        <h3
                                            class="cs_recent_post_title cs_fs_16 cs_medium cs_secondary_font"data-aos="fade-up">
                                            <a href="">Classification of
                                                Car Wash Type By Service</a>
                                        </h3>
                                        <div class="cs_recent_post_date cs_fs_14"data-aos="fade-up">October 01, 2024</div>
                                    </div>
                                </article>
                            </li> --}}
                        </ul>
                    </div>
                    {{-- <div class="cs_sidebar_item cs_gray_bg widget_tag_cloud">
                        <h3 class="cs_sidebar_widget_title cs_fs_24 cs_semibold"data-aos="fade-up">Tag Cloud</h3>
                        <hr>
                        <div class="cs_tag_cloud">
                            <a href="#"
                                class="cs_tag_link cs_radius_5 cs_white_bg cs_primary_color"data-aos="fade-up">Campaign</a>
                            <a href="#"
                                class="cs_tag_link cs_radius_5 cs_white_bg cs_primary_color"data-aos="fade-up">Making</a>
                            <a href="#"
                                class="cs_tag_link cs_radius_5 cs_white_bg cs_primary_color"data-aos="fade-up">Life
                                Style</a>
                            <a href="#"
                                class="cs_tag_link cs_radius_5 cs_white_bg cs_primary_color"data-aos="fade-up">Traveling</a>
                            <a href="#"
                                class="cs_tag_link cs_radius_5 cs_white_bg cs_primary_color"data-aos="fade-up">Trekking</a>
                            <a href="#"
                                class="cs_tag_link cs_radius_5 cs_white_bg cs_primary_color"data-aos="fade-up">Travels</a>
                        </div>
                    </div> --}}
                    {{-- <div class="cs_sidebar_item cs_gray_bg">
                        <h3 class="cs_sidebar_widget_title cs_fs_24 cs_semibold"data-aos="fade-up">Newsletter</h3>
                        <hr>
                        <form class="cs_subscribe_form">
                            <div class="cs_input_field">
                                <input type="text" placeholder="Enter E-Mail">
                                <span><i class="fa-regular fa-envelope"></i></span>
                            </div>
                            <button type="submit"
                                class="cs_btn cs_style_1 cs_fs_18 cs_medium cs_radius_4"data-aos="fade-up">Subscribe
                                Now</button>
                        </form>
                    </div> --}}
                </div>
            </aside>
        </div>
    </div>
    <div class="cs_height_140 cs_height_lg_80"></div>
    <!-- End Blog Section -->
    <style>
        img.w-100.h-100.cs_zoom_in.blog-image {
    max-height: 400px;
    min-height: 400px;
    object-fit: cover;
}
    </style>
@endsection
