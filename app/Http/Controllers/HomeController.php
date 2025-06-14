<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\USPModel;
use App\Models\OurTeamModel;
use Illuminate\Http\Request;
use App\Models\ChooseUsModel;
use App\Models\PackageMaster;
use App\Models\WebSiteElements;
use App\Traits\CommonFunctions;
use App\Models\DestinationModel;
use App\Models\TestimonialModel;
use App\Models\HomeRecognitionsModel;
use App\Models\BookHotel;
use App\Models\Attraction;
use App\Models\Faq;

class HomeController extends Controller
{
    use CommonFunctions;
    public function index()
{
    $getPackages = (new PackageMasterController())->getActivePackages();
    $packageCategory = (new PackageCategoryController())->getActivePackagesCategoryData();
    $data = $this->getElement();

    $packages = PackageMaster::where(PackageMaster::STATUS, "1")->get();

    // Decode images and prepare storage-friendly URLs
    foreach ($packages as $package) {
        $imagesRaw = $package->package_image;

        // Handle package_image: decode if JSON string, use directly if array
        if (is_string($imagesRaw)) {
            $decoded = json_decode($imagesRaw, true);
        } elseif (is_array($imagesRaw)) {
            $decoded = $imagesRaw;
        } else {
            $decoded = [];
        }

        // Ensure it's an array
        $decoded = is_array($decoded) ? $decoded : [];

        // Convert each path to a valid public URL
        $package->decoded_images = array_map(function ($imgPath) {
            return asset(str_replace('website/uploads', 'storage', $imgPath));
        }, $decoded);
    }

    $destinations = PackageMaster::distinct()->pluck('package_country')->toArray();

    $blogs = Blog::where(Blog::BLOG_STATUS, Blog::BLOG_STATUS_LIVE)
        ->orderBy(Blog::BLOG_SORTING, 'desc')
        ->get();

    $usp = USPModel::where(USPModel::SLIDE_STATUS, USPModel::SLIDE_STATUS_LIVE)->get();
    $testimonial = TestimonialModel::where(TestimonialModel::SLIDE_STATUS, TestimonialModel::SLIDE_STATUS_LIVE)->get();
    $partners = HomeRecognitionsModel::where(HomeRecognitionsModel::SLIDE_STATUS, HomeRecognitionsModel::SLIDE_STATUS_LIVE)->get();
    $homedestinations = DestinationModel::where('status', '1')->get();
    $majorattraction = Attraction::where('status', '1')->get();
$faqs = Faq::where('status', '1')->orderBy('sort_order', 'asc')->get();
$usp = USPModel::where('status', '1')->orderBy('slide_sorting', 'asc')->get();
if ($usp->isEmpty()) {
    $usp = collect([
        (object)[
            'usp_icon' => '🌟',
            'usp_title' => 'Holistic Learning',
            'usp_description' => 'Daily yoga, digital classes, and creative learning methods.',
        ],
        (object)[
            'usp_icon' => '🏫',
            'usp_title' => 'World-Class Infrastructure',
            'usp_description' => 'Spacious classrooms and advanced laboratories.',
        ],
        (object)[
            'usp_icon' => '🛡️',
            'usp_title' => 'Safety First',
            'usp_description' => '24/7 CCTV, GPS transport & clean drinking water.',
        ],
    ]);
}




    return view('index', $data, compact(
        'getPackages',
        'packageCategory',
        'packages',
        'destinations',
        'blogs',
        'usp',
        'testimonial',
        'partners',
        'homedestinations',
        'majorattraction',
        'faqs',
        'usp',
    ));
}

public function searchDestination(Request $request)
{
    $query = $request->input('q');

    // Case-insensitive match
    $destination = DestinationModel::whereRaw('LOWER(destination) = ?', [strtolower($query)])->first();

    if ($destination) {
        return redirect()->route('destinationDetailpage', ['destination_slug' => $destination->destination_slug]);
    }

    // Optional: Redirect to 404 or show a custom message
    return redirect('/')->with('error', 'Destination not found.');
}
    
    public function index2()
    {
        return view('index2');
    }

    public function index3()
    {
        return view('index3');
    }

    public function about()
    {
        $data = $this->getElement();
        $partners=HomeRecognitionsModel::where(HomeRecognitionsModel::SLIDE_STATUS,HomeRecognitionsModel::SLIDE_STATUS_LIVE)->get();
        $team = OurTeamModel::where(OurTeamModel::SLIDE_STATUS, OurTeamModel::SLIDE_STATUS_LIVE)
        ->orderBy('slide_sorting', 'asc') // Ascending order by slide_sorting
        ->get();       
         $choose_us=ChooseUsModel::where(ChooseUsModel::SLIDE_STATUS,ChooseUsModel::SLIDE_STATUS_LIVE)->get();
         $usp = USPModel::where('status', '1')->orderBy('slide_sorting', 'asc')->get();
if ($usp->isEmpty()) {
    $usp = collect([
        (object)[
            'usp_icon' => '🌟',
            'usp_title' => 'Holistic Learning',
            'usp_description' => 'Daily yoga, digital classes, and creative learning methods.',
        ],
        (object)[
            'usp_icon' => '🏫',
            'usp_title' => 'World-Class Infrastructure',
            'usp_description' => 'Spacious classrooms and advanced laboratories.',
        ],
        (object)[
            'usp_icon' => '🛡️',
            'usp_title' => 'Safety First',
            'usp_description' => '24/7 CCTV, GPS transport & clean drinking water.',
        ],
    ]);
}

        return view('about',$data,compact('partners','team','choose_us','usp'));
    }

    public function destination()
    {
        $getPackages = (new PackageMasterController())->getActivePackages();
        $packageCategory = (new PackageCategoryController())->getActivePackagesCategoryData();
        $data = $this->getElement();
        $packages = PackageMaster::where(PackageMaster::STATUS, "1")->get();
        // $destinations = PackageMaster::distinct()->pluck('package_country')->toArray();
        // $destinations=DestinationModel::where('status','1')->get();
        $homedestinations = DestinationModel::where('status','1')->get();
        return view('destination',$data,compact('getPackages','packageCategory','packages','homedestinations'));
    }

    public function destinationDetailpage($destination_slug)
    {
        $data = $this->getElement();
        $homedestinations = DestinationModel::where('destination_slug', $destination_slug)->firstOrFail();

        $destinations = PackageMaster::distinct()->pluck('package_country')->toArray();

        $package = PackageMaster::where(PackageMaster::STATUS, "1")->get();
        $packages = PackageMaster::where(PackageMaster::STATUS, 1)
            ->where('package_country', $homedestinations->destination)
            ->get();

        $otherpackage = PackageMaster::where('slug', '!=', $destination_slug)
            ->where(PackageMaster::STATUS, "1")
            ->take(4)
            ->get();
        $comments = Comment::orderBy('created_at', 'desc')->get();
        
        return view('destinationDetailpage',$data,compact('destinations','otherpackage','comments','homedestinations','packages'));
    }

    public function tour()
    {
        $getPackages = (new PackageMasterController())->getActivePackages();
        $packageCategory = (new PackageCategoryController())->getActivePackagesCategoryData();
        $data = $this->getElement();
        $packages = PackageMaster::where(PackageMaster::STATUS, "1")->get();
        return view('tour',$data,compact('getPackages','packages','packageCategory'));
    }

    public function tourDetailpage($slug)
{
    $galleryItems = $this->getCachedGalleryItems();
    $elementData = $this->getElement();

    $package = PackageMaster::where('slug', $slug)->firstOrFail();

    $otherpackages = PackageMaster::where('slug', '!=', $slug)
        ->where(PackageMaster::STATUS, "1")
        ->take(4)
        ->get();

    $data = [
        'galleryImages' => $galleryItems,
        'elementData' => $elementData,
        'package' => $package,
        'otherpackages' => $otherpackages,
    ];

    return view('tourDetailpage', $data);
}


    public function blog()
    {
        $data = $this->getElement();
        $blogs = Blog::where(Blog::BLOG_STATUS, Blog::BLOG_STATUS_LIVE)
            ->orderBy(Blog::BLOG_SORTING, 'desc')
            ->get();
            $otherBlogs =Blog::where(Blog::BLOG_STATUS, Blog::BLOG_STATUS_LIVE)
            ->orderBy(Blog::BLOG_SORTING, 'desc')
            ->get();

        return view("blog", $data, compact('blogs','otherBlogs'));
    }
    public function blogdetail($slug)
    {
        $data = $this->getElement();
        $blogs = Blog::where('slug', $slug)
            ->where(Blog::BLOG_STATUS, Blog::BLOG_STATUS_LIVE)
            ->firstOrFail();
        $otherBlogs = Blog::where('slug', '!=', $slug)
            ->where(Blog::BLOG_STATUS, Blog::BLOG_STATUS_LIVE)
            ->orderBy(Blog::BLOG_SORTING, 'desc')
            ->get();
        return view("blogdetail", $data, compact('blogs', 'otherBlogs'));
    }
    public function contact()
    {
        $data = $this->getElement();
        return view('contact',$data);
    }
    public function hotels()
    {
        $data = $this->getElement();

        $hotel = BookHotel::where('status','1')->get();
        return view('hotelCard',compact('data','hotel'));
    }
    public function hotelDetails($slug)
    {
        $hotel = BookHotel::where('hotel_name',$slug)->first();
        $hotel_images = json_decode($hotel->hotel_image, true);
        $allhotels = BookHotel::where('status','1')->get();
        return view('hotels',compact('hotel','hotel_images','allhotels'));
    }

    public function privacypolicy()
    {
        $data = $this->getElement();
        return view('privacypolicy',$data);
    }

    public function CancellationRefundPolicy()
    {
        $data = $this->getElement();
        return view('CancellationRefundPolicy',$data);
    }

    public function termsConditions()
    {
        $data = $this->getElement();
        return view('termsConditions',$data);
    }

    public function ourServices(){
        $data = $this->getElement();
        $ourServices = (new OurServicesModelController())->getOurServiceData();
        return view("ourServicesPage",compact('ourServices'),$data);
    }
    
    

    public function galleryPages()
    {
        // return view('galleryPages');
        $galleryItems = $this->getCachedGalleryItems();
        $elementData = $this->getElement();
        $data["galleryImages"] = $galleryItems;
        $data = array_merge($data, $elementData);
        return view("galleryPages", $data);
    }
    public function filterPackages(Request $request)
    {
        // Fetch filters from the request
        $destination = $request->input('city'); // Destination filter
        $category = $request->input('activity'); // Package type filter
    
        // Query for packages
        $query = PackageMaster::where(PackageMaster::STATUS, 1);
    
        if (!empty($destination)) {
            $query->where(PackageMaster::PACKAGE_COUNTRY, 'LIKE', '%' . $destination . '%');
        }
    
        // if (!empty($category)) {
        //     $query->where(PackageMaster::PACKAGE_TYPE, 'LIKE', '%' . $category . '%');
        // }
    
        $packages = $query->get(); // Fetch the filtered packages
    
        // Get distinct destinations and categories for filters
        $destinations = PackageMaster::distinct()->pluck(PackageMaster::PACKAGE_COUNTRY)->toArray();
        // $travelCategories = PackageMaster::distinct()->pluck(PackageMaster::PACKAGE_TYPE)->toArray();
    
        return view('filteredList', compact('packages', 'destinations'));
    }
    public function getElement()
    {
        $elements = $this->getWebSiteElements();
        $data = [];
        if (!empty($elements)) {
            foreach ($elements as $item) {
                $data[$item->{WebSiteElements::ELEMENT}] = $item->{WebSiteElements::ELEMENT_DETAILS};
            }
        }
        return $data;
    }
}
