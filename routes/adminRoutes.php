<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\USPController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ChooseUSController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\OurExpertsController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EnquiryFormController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\PackageMasterController;
use App\Http\Controllers\PackageCategoryController;
use App\Http\Controllers\WebSiteElementsController;
use App\Http\Controllers\HomeDestinationsController;
use App\Http\Controllers\HomeRecognitionsController;
use App\Http\Controllers\BookHotelController;
use App\Http\Controllers\OurServicesModelController;

Route::get("login",[AdminController::class,"Login"])->name("login");
Route::post("AdminUserLogin",[AdminController::class,"AdminLoginUser"])->name("AdminLogin");
Route::get("getmenu-items",[HomePageController::class,"getMenu"]);
//pages

Route::middleware(['auth'])->group(function () {
    Route::get("/new-dashboard",[AdminController::class,"dashboard"])->name("new-dashboard");
    
    // Route::get("site-navigation",[AdminController::class,"siteNav"])->name("siteNav");
    // Route::post("addEditNavigation",[AdminController::class,"addEditNavigation"])->name("addNaviagtion");
    // Route::post("deleteNavigation",[AdminController::class,"deleteNavigation"])->name("deleteNavigation");
    // Route::post("navDataTable",[AdminController::class,"navDataTable"])->name("navDataTable");

    Route::get("manage-gallery",[AdminController::class,"manageGallery"])->name("manageGallery");
    Route::post("addGalleryItems",[AdminController::class,"addGalleryItems"])->name("addGalleryItems");
    Route::post("addGalleryDataTable",[AdminController::class,"addGalleryDataTable"])->name("addGalleryDataTable");

    // Route::get("add-destinations", [DestinationController::class, "destinationMaster"])->name("DestinationsMaster");
    // Route::post("save-destinations", [DestinationController::class, "saveDestinations"])->name("saveDestinations");
    // Route::post("destinations-data", [DestinationController::class, "destinationsData"])->name("DestinationsData");

    Route::get("our-services-master", [OurServicesModelController::class, "viewOurServicesMaster"])->name("viewOurServicesMaster");
    Route::post("save-our-services", [OurServicesModelController::class, "saveOurServicesMaster"])->name("saveOurServicesMaster");
    Route::post("our-services-data", [OurServicesModelController::class, "ourServicesData"])->name("ourServicesData");

    
    Route::get("add-web-site-elements", [WebSiteElementsController::class, "addWebSiteElements"])->name("webSiteElements");
    Route::post("save-web-site-element", [WebSiteElementsController::class, "saveWebSiteElement"])->name("saveWebSiteElement");
    Route::post("web-site-elements-data", [WebSiteElementsController::class, "getWebElementsData"])->name("webSiteElementsData");
    
    // Route::get("home-destinations-admin", [HomeDestinationsController::class, "homeDestinationsSlider"])->name("homeDestinationsSlider");
    // Route::post("home-destinations-services", [HomeDestinationsController::class, "homeDestinationsSaveSlide"])->name("homeDestinationsSaveSlide");
    // Route::post("home-destinations-data", [HomeDestinationsController::class, "homeDestinationsData"])->name("homeDestinationsData");
        
    // Route::get("awards-admin", [AwardsController::class, "awardsSlider"])->name("awardsSlider");
    // Route::post("awards-services", [AwardsController::class, "awardsSaveSlide"])->name("awardsSaveSlide");
    // Route::post("awards-data", [AwardsController::class, "awardsData"])->name("awardsData");
          
    // Route::get("our-experts-admin", [OurExpertsController::class, "ourExpertsSlider"])->name("ourExpertsSlider");
    // Route::post("our-experts-services", [OurExpertsController::class, "ourExpertsSaveSlide"])->name("ourExpertsSaveSlide");
    // Route::post("our-experts-data", [OurExpertsController::class, "ourExpertsData"])->name("ourExpertsData");
    
    // Route::get("services-admin", [ServicesController::class, "servicesSlider"])->name("servicesSlider");
    // Route::post("services", [ServicesController::class, "servicesSaveSlide"])->name("servicesSaveSlide");
    // Route::post("services-data", [ServicesController::class, "servicesData"])->name("servicesData");
    
    Route::get("mange-contact-us",[ContactUsController::class,"manageContactUs"])->name("manageContactUs");
    Route::post("contact-us-data",[ContactUsController::class,"ContactUsData"])->name("ContactUsData");

    Route::resource('packageMaster', PackageMasterController::class);
    Route::post("package-master-data-table",[PackageMasterController::class,"dataTable"])->name("packageMasterDataTable");
    Route::post("add-city",[PackageMasterController::class,"addCity"])->name("add-city");
    Route::post("enable-disable",[PackageMasterController::class,"enableDisablePackage"])->name("enableDisablePackage");

    Route::get("manage-package-categories",[PackageCategoryController::class,"managePackageCategories"])->name("managePackageCategories");
    Route::post("add-package-category-data",[PackageCategoryController::class,"addPackageCategoryData"])->name("addPackageCategoryData");
    Route::post("packageCategoryData",[PackageCategoryController::class,"packageCategoryData"])->name("packageCategoryData");

    Route::get("blog-admin", [BlogController::class, "blogSlider"])->name("blogSlider");
    Route::post("save-blog", [BlogController::class, "saveBlog"])->name("saveBlog");
    Route::post("blog-data", [BlogController::class, "blogData"])->name("blogData");

    Route::get("manage-news-letter-data",[NewsLetterController::class,"manageNewsLetterAdmin"])->name("manageNewsLetterData");
    Route::post("get-news-letter-data",[NewsLetterController::class,"getNewsLetterData"])->name("getNewsLetterData");

    Route::get("slider-admin", [SliderController::class, "slider"])->name("Slider");
    Route::post("save-Slide", [SliderController::class, "saveSlide"])->name("saveSlide");
    Route::post("slider-data", [SliderController::class, "sliderData"])->name("sliderData");

    Route::get("testimonial-admin", [TestimonialController::class, "testimonialSlider"])->name("testimonialSlider");
    Route::post("testimonial-services", [TestimonialController::class, "testimonialSaveSlide"])->name("testimonialSaveSlide");
    Route::post("testimonial-data", [TestimonialController::class, "testimonialData"])->name("testimonialData");

    Route::get("USP-admin", [USPController::class, "USP"])->name("USP");
    Route::post("save-USP", [USPController::class, "saveUSP"])->name("saveUSP");
    Route::post("USP-data", [USPController::class, "USPData"])->name("USPData");

    Route::get("home-recognitions-admin", [HomeRecognitionsController::class, "awardsSlider"])->name("awardsSlider");
    Route::post("home-recognitions-services", [HomeRecognitionsController::class, "awardsSaveSlide"])->name("awardsSaveSlide");
    Route::post("home-recognitions-data", [HomeRecognitionsController::class, "awardsData"])->name("awardsData");

    Route::get("our_team-admin", [OurTeamController::class, "ourteamSlider"])->name("ourteamSlider");
    Route::post("save-our_team", [OurTeamController::class, "ourteamSaveSlide"])->name("ourteamSaveSlide");
    Route::post("our_team-data", [OurTeamController::class, "ourteamData"])->name("ourteamData");

    Route::get("Choose_Us-admin", [ChooseUSController::class, "Choose_Us"])->name("Choose_Us");
    Route::post("save-Choose_US", [ChooseUSController::class, "saveChoose_Us"])->name("saveChoose_Us");
    Route::post("Choose_Us-data", [ChooseUSController::class, "Choose_UsData"])->name("Choose_UsData");

    Route::get("enquiry-admin-page", [EnquiryFormController::class, "enquiryAdminPage"])->name("enquiryAdminPage");
    Route::post("enquiry-data-table", [EnquiryFormController::class, "enquiryDataTable"])->name("enquiryDataTable");

    Route::get("destination-master", [DestinationController::class, "viewDestinationMaster"])->name("viewDestinationMaster");
    Route::post("save-destination", [DestinationController::class, "saveDestinationMaster"])->name("saveDestinationMaster");
    Route::post("destination-data", [DestinationController::class, "destinationData"])->name("destinationData");
    Route::get("manage-hotel", [BookHotelController::class, "manageHotel"])->name("manageHotel");
    Route::post("save-hotel", [BookHotelController::class, "store"])->name("storeHotel");
    Route::post("get-hotel-data", [BookHotelController::class, "hotelData"])->name("hotelData");
    Route::post("hotel-action", [BookHotelController::class, "action"])->name("hotelAction");


});