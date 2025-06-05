<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest; // Ensure this is updated for new fields
use App\Models\TestimonialModel;
use App\Traits\CommonFunctions; // Ensure this trait has uploadLocalFile and timeNow
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log; // Added for logging potential errors

class TestimonialController extends Controller
{
    use CommonFunctions; // Assuming this trait contains uploadLocalFile and timeNow methods

    public function testimonialSlider(){
        return view("Dashboard.Pages.testimonial");
    }

    public function testimonialData(){
        $query = TestimonialModel::select(
            TestimonialModel::ID,
            TestimonialModel::IMAGE, // Added image
            TestimonialModel::HEADING_TOP,
            TestimonialModel::HEADING_BOTTOM, // Uncommented for Testimonial Name
            TestimonialModel::HEADING_MIDDLE,
            TestimonialModel::TESTIMONIAL_CITY, // Added Testimonial City
            TestimonialModel::SLIDE_SORTING,
            TestimonialModel::SLIDE_STATUS
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                // Ensure the 'image' field is included when encoding the row for edit
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a href="javascript:void(0)" onclick="Disable('.$row->{TestimonialModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a href="javascript:void(0)" onclick="Enable('.$row->{TestimonialModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                
                if($row->{TestimonialModel::SLIDE_STATUS} == TestimonialModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit . $btn_enable;
                }else{
                    return $btn_edit . $btn_disable;
                }
            })
            // Optionally, add a column to display the image if you want
            ->addColumn('image_preview', function ($row) {
                if ($row->{TestimonialModel::IMAGE}) {
                    // Adjust the path according to where your images are publicly accessible
                    $imagePath = asset('website/uploads/Slider/' . $row->{TestimonialModel::IMAGE});
                    return '<img src="' . $imagePath . '" alt="Testimonial Image" style="width: 50px; height: 50px; object-fit: cover;">';
                }
                return 'No Image';
            })
            ->rawColumns(['action', 'image_preview']) // Make sure to rawColumns if you add image_preview
            ->make(true);
    }

    public function testimonialSaveSlide(TestimonialRequest $request){
        try{
            switch($request->input("action")){
                case "insert":
                    $return = $this->insertSlide($request);
                    break;
                case "update":
                    $return = $this->updateSlide($request);
                    break;
                case "enable":
                case "disable":
                    $return = $this->enableDisableSlide($request);
                    break;
                default:
                $return = ["status"=>false,"message"=>"Unknown action: " . $request->input("action"),"data"=>""];
            }
        }catch(Exception $exception){
            Log::error("Testimonial Save Slide Error: " . $exception->getMessage() . " on line " . $exception->getLine() . " in " . $exception->getFile());
            $return = ["status"=>false,"message"=>"An error occurred: " . $exception->getMessage(),"data"=>""];
        }
        return response()->json($return);
    }

    public function insertSlide(TestimonialRequest $request){
        $testimonialModel = new TestimonialModel();

        // Handle image upload
        if ($request->hasFile(TestimonialModel::IMAGE)) {
            $imageUpload = $this->slideImageUpload($request);
            if ($imageUpload["status"]) {
                $testimonialModel->{TestimonialModel::IMAGE} = $imageUpload["data"];
            } else {
                return $imageUpload; // Return error from image upload
            }
        } else {
            // If image is required for insert, return an error.
            // TestimonialRequest should handle this validation, but good to have a fallback.
            return ["status" => false, "message" => "Image is required for new testimonial.", "data" => null];
        }

        $testimonialModel->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
        $testimonialModel->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
        $testimonialModel->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM); // Testimonial Name
        $testimonialModel->{TestimonialModel::TESTIMONIAL_CITY} = $request->input(TestimonialModel::TESTIMONIAL_CITY); // Testimonial City
        $testimonialModel->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
        $testimonialModel->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
        $testimonialModel->{TestimonialModel::STATUS} = 1; // Assuming 'status' is always 1 for active
        $testimonialModel->{TestimonialModel::CREATED_BY} = Auth::check() ? Auth::user()->id : null; // Use null if not authenticated
        $testimonialModel->save();

        $this->forgetSlides(); // Assuming this clears cache related to slides
        return ["status"=>true,"message"=>"Testimonial saved successfully.","data"=>null];
    }

    public function slideImageUpload(TestimonialRequest $request){
        // Ensure that TestimonialModel::ID gives a numeric ID if it's not null.
        // For new records, ID might not be set yet, so use a unique identifier like time() or UUID.
        // A common pattern is to save the record first, get its ID, then upload the file using the ID.
        // For simplicity, here we'll use a timestamp + a random string, or current max ID + 1.
        
        $maxId = TestimonialModel::max(TestimonialModel::ID);
        $maxId = $maxId ? ($maxId + 1) : 1; // Get max ID + 1, or 1 if no records yet
        $timeNow = now()->timestamp; // Use Laravel's now() helper for consistent timestamps
        $uniqueId = $maxId . "_" . $timeNow; // Simple unique identifier for filename

        // Assuming uploadLocalFile exists in CommonFunctions and handles file saving
        // and returns ['status' => true/false, 'data' => filename/error_message]
        // Make sure the "image" key matches the name attribute of your file input.
        return $this->uploadLocalFile($request, TestimonialModel::IMAGE, "website/uploads/Slider/", "testimonial_" . $uniqueId);
    }

    public function updateSlide(TestimonialRequest $request){
        $testimonialId = $request->input(TestimonialModel::ID);
        $check = TestimonialModel::where([
            TestimonialModel::ID => $testimonialId,
            TestimonialModel::STATUS => 1 // Only update if status is 1
        ])->first();

        if($check){
            // Handle image upload if a new image is provided
            if ($request->hasFile(TestimonialModel::IMAGE)) {
                $imageUpload = $this->slideImageUpload($request); // Re-use image upload logic
                if ($imageUpload["status"]) {
                    // Optionally delete old image if it exists
                    // if ($check->{TestimonialModel::IMAGE} && file_exists(public_path('website/uploads/Slider/' . $check->{TestimonialModel::IMAGE}))) {
                    //     unlink(public_path('website/uploads/Slider/' . $check->{TestimonialModel::IMAGE}));
                    // }
                    $check->{TestimonialModel::IMAGE} = $imageUpload["data"];
                } else {
                    return $imageUpload; // Return error from image upload
                }
            }
            // Update other fields
            $check->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
            $check->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
            $check->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
            $check->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM); // Testimonial Name
            $check->{TestimonialModel::TESTIMONIAL_CITY} = $request->input(TestimonialModel::TESTIMONIAL_CITY); // Testimonial City
            $check->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
            $check->{TestimonialModel::UPDATED_BY} = Auth::check() ? Auth::user()->id : null; // Use null if not authenticated
            $check->save();

            $this->forgetSlides(); // Assuming this clears cache related to slides
            $return = ["status"=>true,"message"=>"Testimonial updated successfully.","data"=>null];
        }else{
            $return = ["status"=>false,"message"=>"Testimonial details not found or invalid.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(TestimonialRequest $request) {
        $check = TestimonialModel::find($request->input(TestimonialModel::ID));
        
        if ($check) {
            $check->{TestimonialModel::UPDATED_BY} = Auth::check() ? Auth::user()->id : null;
            
            if ($request->input("action") == "enable") {
                $check->{TestimonialModel::SLIDE_STATUS} = TestimonialModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Testimonial enabled successfully.", "data" => ""];
            } else {
                $check->{TestimonialModel::SLIDE_STATUS} = TestimonialModel::SLIDE_STATUS_DISABLED;
                $return = ["status" => 1, "message" => "Testimonial disabled successfully.", "data" => ""];
            }
            
            $this->forgetSlides();
            $check->save();
        } else {
            $return = ["status" => 0, "message" => "Testimonial details not found.", "data" => ""];
        }
        
        return $return;
    }
    
   
}