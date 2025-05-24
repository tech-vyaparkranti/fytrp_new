<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\TestimonialModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    use CommonFunctions;
    //

    public function testimonialSlider(){
        return view("Dashboard.Pages.testimonial");
    }

    public function testimonialData(){
        $query = TestimonialModel::select(
        TestimonialModel::ID,
        TestimonialModel::HEADING_TOP,
        // TestimonialModel::HEADING_BOTTOM,
        TestimonialModel::HEADING_MIDDLE,
        TestimonialModel::SLIDE_SORTING,
        TestimonialModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{TestimonialModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{TestimonialModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{TestimonialModel::SLIDE_STATUS}==TestimonialModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
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
                $return = ["status"=>false,"message"=>"Unknown case","data"=>""];
            }
        }catch(Exception $exception){
            $return = $this->reportException($exception);
        }
        return response()->json($return);
    }

    public function insertSlide(TestimonialRequest $request){
        // $imageUpload = $this->slideImageUpload($request);
        $TestimonialModel = new TestimonialModel();
            // $TestimonialModel->{TestimonialModel::IMAGE} = $imageUpload["data"];
            $TestimonialModel->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
            $TestimonialModel->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
            // $TestimonialModel->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
            $TestimonialModel->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
            $TestimonialModel->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);           
            $TestimonialModel->{TestimonialModel::STATUS} = 1;
            $TestimonialModel->{TestimonialModel::CREATED_BY} = Auth::user()->id;
            $TestimonialModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        // if($imageUpload["status"]){
        //     $TestimonialModel = new TestimonialModel();
        //     // $TestimonialModel->{TestimonialModel::IMAGE} = $imageUpload["data"];
        //     $TestimonialModel->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
        //     $TestimonialModel->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
        //     $TestimonialModel->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
        //     $TestimonialModel->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
        //     $TestimonialModel->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);           
        //     $TestimonialModel->{TestimonialModel::STATUS} = 1;
        //     $TestimonialModel->{TestimonialModel::CREATED_BY} = Auth::user()->id;
        //     $TestimonialModel->save();
        //     $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
        //     $this->forgetSlides();
        // }else{
        //     $return = $imageUpload;
        // }
        return $return;
    }

    // public function slideImageUpload(TestimonialRequest $request){
    //     $maxId = TestimonialModel::max(TestimonialModel::ID);
    //     $maxId += 1;
    //     $timeNow = strtotime($this->timeNow());
    //     $maxId .= "_$timeNow";
    //     return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    // }

    public function updateSlide(TestimonialRequest $request){
        $check = TestimonialModel::where([TestimonialModel::ID=>$request->input(TestimonialModel::ID),TestimonialModel::STATUS=>1])->first();
        if($check){
            // if($request->input(TestimonialModel::IMAGE)){
            //     $imageUpload =$this->slideImageUpload($request);
            //     if($imageUpload["status"]){
            //         $check->{TestimonialModel::IMAGE} = $imageUpload["data"];
            //         $check->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
            //         $check->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
            //         $check->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
            //         $check->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
            //         $check->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
            //         $check->{TestimonialModel::UPDATED_BY} = Auth::user()->id;
            //         $check->save();
            //         $this->forgetSlides();
            //         $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
            //     }else{
            //         $return = $imageUpload;
            //     }
                $check->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
                $check->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
                $check->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
                // $check->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
                $check->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);                    $check->{TestimonialModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
            // }else{
            //     $check->{TestimonialModel::SLIDE_SORTING} = $request->input(TestimonialModel::SLIDE_SORTING);
            //     $check->{TestimonialModel::HEADING_TOP} = $request->input(TestimonialModel::HEADING_TOP);
            //     $check->{TestimonialModel::HEADING_MIDDLE} = $request->input(TestimonialModel::HEADING_MIDDLE);
            //     $check->{TestimonialModel::HEADING_BOTTOM} = $request->input(TestimonialModel::HEADING_BOTTOM);
            //     $check->{TestimonialModel::SLIDE_STATUS} = $request->input(TestimonialModel::SLIDE_STATUS);
            //     $check->{TestimonialModel::UPDATED_BY} = Auth::user()->id;
            //     $check->save();
            //     $this->forgetSlides();
            //     $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            // }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(TestimonialRequest $request){
    //     $check = TestimonialModel::find($request->input(TestimonialModel::ID));
    //     if($check){
    //         $check->{TestimonialModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{TestimonialModel::SLIDE_STATUS} = TestimonialModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{TestimonialModel::SLIDE_STATUS} = TestimonialModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(TestimonialRequest $request) {
        $check = TestimonialModel::find($request->input(TestimonialModel::ID));
        
        if ($check) {
            $check->{TestimonialModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{TestimonialModel::SLIDE_STATUS} = TestimonialModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{TestimonialModel::SLIDE_STATUS} = TestimonialModel::SLIDE_STATUS_DISABLED;
                $return = ["status" => 1, "message" => "Disabled successfully.", "data" => ""];
            }
            
            $this->forgetSlides();
            $check->save();
        } else {
            $return = ["status" => 0, "message" => "Details not found.", "data" => ""];
        }
        
        return $return;
    }
    
}
