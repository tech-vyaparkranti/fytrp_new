<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\TestimonialModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File; // Added for file operations

class TestimonialController extends Controller
{
    use CommonFunctions;

    public function testimonialSlider(){
        return view("Dashboard.Pages.testimonial");
    }

    public function testimonialData(){
        $query = TestimonialModel::select(
            TestimonialModel::ID,
            TestimonialModel::IMAGE,
            TestimonialModel::HEADING_TOP,
            TestimonialModel::HEADING_BOTTOM,
            TestimonialModel::HEADING_MIDDLE,
            TestimonialModel::TESTIMONIAL_CITY,
            TestimonialModel::SLIDE_SORTING,
            TestimonialModel::SLIDE_STATUS
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';

                $btn_disable = ' <a href="javascript:void(0)" onclick="Disable('.$row->{TestimonialModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a href="javascript:void(0)" onclick="Enable('.$row->{TestimonialModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';

                if($row->{TestimonialModel::SLIDE_STATUS} == TestimonialModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit . $btn_enable;
                }else{
                    return $btn_edit . $btn_disable;
                }
            })
            ->addColumn('image_preview', function ($row) {
                if ($row->{TestimonialModel::IMAGE}) {
                    $imagePath = asset('website/uploads/Slider/' . $row->{TestimonialModel::IMAGE});
                    return '<img src="' . $imagePath . '" alt="Testimonial Image" style="width: 50px; height: 50px; object-fit: cover;">';
                }
                return 'No Image';
            })
            ->rawColumns(['action', 'image_preview'])
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
            // If image is required for insert, TestimonialRequest should handle this validation.
            // This is a fallback if the request validation somehow misses it.
            return ["status" => false, "message" => "Image is required for new testimonial.", "data" => null];
        }

        $testimonialModel->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
        $testimonialModel->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
        $testimonialModel->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
        $testimonialModel->{TestimonialModel::TESTIMONIAL_CITY} = $request->input(TestimonialModel::TESTIMONIAL_CITY);
        $testimonialModel->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
        $testimonialModel->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
        $testimonialModel->{TestimonialModel::STATUS} = 1;
        $testimonialModel->{TestimonialModel::CREATED_BY} = Auth::check() ? Auth::user()->id : null;
        $testimonialModel->save();

        $this->forgetSlides();
        return ["status"=>true,"message"=>"Testimonial saved successfully.","data"=>null];
    }

    /**
     * Handles the image upload for testimonials.
     * Stores the image in the public directory and returns the filename.
     *
     * @param TestimonialRequest $request
     * @return array
     */
    public function slideImageUpload(TestimonialRequest $request){
        if ($request->hasFile(TestimonialModel::IMAGE)) {
            $image = $request->file(TestimonialModel::IMAGE);
            // Generate a unique filename using timestamp and a random string
            $fileName = 'testimonial_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('website/uploads/Slider/');

            // Ensure the directory exists
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Move the file to the public directory
            try {
                $image->move($destinationPath, $fileName);
                return ["status" => true, "message" => "Image uploaded successfully.", "data" => $fileName];
            } catch (Exception $e) {
                Log::error("Testimonial Image Upload Error: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
                return ["status" => false, "message" => "Failed to upload image: " . $e->getMessage(), "data" => null];
            }
        }
        return ["status" => false, "message" => "No image file found for upload.", "data" => null];
    }


    public function updateSlide(TestimonialRequest $request){
        $testimonialId = $request->input(TestimonialModel::ID);
        $check = TestimonialModel::where([
            TestimonialModel::ID => $testimonialId,
            TestimonialModel::STATUS => 1
        ])->first();

        if($check){
            // Handle image upload if a new image is provided
            if ($request->hasFile(TestimonialModel::IMAGE)) {
                $imageUpload = $this->slideImageUpload($request);
                if ($imageUpload["status"]) {
                    // Delete old image if a new one is uploaded and old one exists
                    if ($check->{TestimonialModel::IMAGE} && File::exists(public_path('website/uploads/Slider/' . $check->{TestimonialModel::IMAGE}))) {
                        File::delete(public_path('website/uploads/Slider/' . $check->{TestimonialModel::IMAGE}));
                    }
                    $check->{TestimonialModel::IMAGE} = $imageUpload["data"];
                } else {
                    return $imageUpload; // Return error from image upload
                }
            }
            // Update other fields
            $check->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
            $check->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
            $check->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
            $check->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
            $check->{TestimonialModel::TESTIMONIAL_CITY} = $request->input(TestimonialModel::TESTIMONIAL_CITY);
            $check->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
            $check->{TestimonialModel::UPDATED_BY} = Auth::check() ? Auth::user()->id : null;
            $check->save();

            $this->forgetSlides();
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