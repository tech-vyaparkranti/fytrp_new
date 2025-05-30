<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourTypeController extends Controller
{
   public function tourSlider(){
        // $package_types = PackageMaster::PACKAGE_TYPES;
        return view("Dashboard.Pages.manageTourType");
        // return view("Dashboard.Pages.manageTourType", compact("package_types"));

    }
}
