<?php

namespace App\Http\Controllers;

use App\Http\Requests\OurTeamRequest;
use App\Models\OurTeamModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OurTeamController extends Controller
{
    use CommonFunctions;
    //

    public function ourteamSlider(){
        return view("Dashboard.Pages.ourTeam");
    }

    public function ourteamData(){
        $query = OurTeamModel::select(
        OurTeamModel::ID,
        OurTeamModel::IMAGE,
        OurTeamModel::HEADING_TOP,
        // OurTeamModel::HEADING_BOTTOM,
        OurTeamModel::HEADING_MIDDLE,
        OurTeamModel::SLIDE_SORTING,
        OurTeamModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{OurTeamModel::ID}.')" class="btn btn-danger btn-sm">Disable</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{OurTeamModel::ID}.')" class="btn btn-primary btn-sm">Enable</a>';
                if($row->{OurTeamModel::SLIDE_STATUS}==OurTeamModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function ourteamSaveSlide(OurTeamRequest $request){
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

    public function insertSlide(OurTeamRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $OurTeamModel = new OurTeamModel();
            $OurTeamModel->{OurTeamModel::IMAGE} = $imageUpload["data"];
            $OurTeamModel->{OurTeamModel::HEADING_TOP} = $request->input(OurTeamModel::HEADING_TOP);
            $OurTeamModel->{OurTeamModel::HEADING_MIDDLE} = $request->input(OurTeamModel::HEADING_MIDDLE);
            // $OurTeamModel->{OurTeamModel::HEADING_BOTTOM} = $request->input(OurTeamModel::HEADING_BOTTOM);
            $OurTeamModel->{OurTeamModel::SLIDE_STATUS} = $request->input(OurTeamModel::SLIDE_STATUS);
            $OurTeamModel->{OurTeamModel::SLIDE_SORTING} = $request->input(OurTeamModel::SLIDE_SORTING);           
            $OurTeamModel->{OurTeamModel::STATUS} = 1;
            $OurTeamModel->{OurTeamModel::CREATED_BY} = Auth::user()->id;
            $OurTeamModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(OurTeamRequest $request){
        $maxId = OurTeamModel::max(OurTeamModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(OurTeamRequest $request){
        $check = OurTeamModel::where([OurTeamModel::ID=>$request->input(OurTeamModel::ID),OurTeamModel::STATUS=>1])->first();
        if($check){
            if($request->hasFile('image')){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{OurTeamModel::IMAGE} = $imageUpload["data"];
                    $check->{OurTeamModel::SLIDE_SORTING} = $request->input(OurTeamModel::SLIDE_SORTING);
                    $check->{OurTeamModel::HEADING_TOP} = $request->input(OurTeamModel::HEADING_TOP);
                    $check->{OurTeamModel::HEADING_MIDDLE} = $request->input(OurTeamModel::HEADING_MIDDLE);
                    // $check->{OurTeamModel::HEADING_BOTTOM} = $request->input(OurTeamModel::HEADING_BOTTOM);
                    $check->{OurTeamModel::SLIDE_STATUS} = $request->input(OurTeamModel::SLIDE_STATUS);
                    $check->{OurTeamModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }
            else{
                $check->{OurTeamModel::SLIDE_SORTING} = $request->input(OurTeamModel::SLIDE_SORTING);
                $check->{OurTeamModel::HEADING_TOP} = $request->input(OurTeamModel::HEADING_TOP);
                $check->{OurTeamModel::HEADING_MIDDLE} = $request->input(OurTeamModel::HEADING_MIDDLE);
                // $check->{OurTeamModel::HEADING_BOTTOM} = $request->input(OurTeamModel::HEADING_BOTTOM);
                $check->{OurTeamModel::SLIDE_STATUS} = $request->input(OurTeamModel::SLIDE_STATUS);
                $check->{OurTeamModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    // public function enableDisableSlide(OurTeamRequest $request){
    //     $check = OurTeamModel::find($request->input(OurTeamModel::ID));
    //     if($check){
    //         $check->{OurTeamModel::UPDATED_BY} = Auth::user()->id;
    //         if($request->input("action")=="enable"){
    //             $check->{OurTeamModel::SLIDE_STATUS} = OurTeamModel::SLIDE_STATUS_LIVE;
    //             $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
    //         }else{
    //             $check->{OurTeamModel::SLIDE_STATUS} = OurTeamModel::SLIDE_STATUS_DISABLED;
    //             $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
    //         }
    //         $this->forgetSlides();
    //         $check->save();
    //     }else{
    //         $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
    //     }
    //     return $return;
    // }
    public function enableDisableSlide(OurTeamRequest $request) {
        $check = OurTeamModel::find($request->input(OurTeamModel::ID));
        
        if ($check) {
            $check->{OurTeamModel::UPDATED_BY} = Auth::user()->id;
            
            if ($request->input("action") == "enable") {
                $check->{OurTeamModel::SLIDE_STATUS} = OurTeamModel::SLIDE_STATUS_LIVE;
                $return = ["status" => 1, "message" => "Enabled successfully.", "data" => ""];
            } else {
                $check->{OurTeamModel::SLIDE_STATUS} = OurTeamModel::SLIDE_STATUS_DISABLED;
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
