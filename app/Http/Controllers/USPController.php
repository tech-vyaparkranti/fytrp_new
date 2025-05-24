<?php

namespace App\Http\Controllers;

use App\Http\Requests\USPRequest;
use App\Models\USPModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class USPController extends Controller
{
    use CommonFunctions;
    //

    public function USP(){
        return view("Dashboard.Pages.manageUSP");
    }

    public function USPData(){
        try{
            $query = USPModel::select(USPModel::IMAGE,
        USPModel::ID,
        USPModel::HEADING_TOP,
        // USPModel::HEADING_BOTTOM,
        USPModel::HEADING_MIDDLE,
        USPModel::SLIDE_SORTING,
        USPModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{USPModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{USPModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{USPModel::SLIDE_STATUS}==USPModel::SLIDE_STATUS_DISABLED){
                    return $btn_edit.$btn_enable;
                }else{
                    return $btn_edit.$btn_disable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        catch(Exception $except){
            dd([$except->getMessage()]);
        }
    }

    public function saveUSP(USPRequest $request){
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

    public function insertSlide(USPRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $USPModel = new USPModel();
            $USPModel->{USPModel::IMAGE} = $imageUpload["data"];
            $USPModel->{USPModel::HEADING_TOP} = $request->input(USPModel::HEADING_TOP);
            $USPModel->{USPModel::HEADING_MIDDLE} = $request->input(USPModel::HEADING_MIDDLE);
            // $USPModel->{USPModel::HEADING_BOTTOM} = $request->input(USPModel::HEADING_BOTTOM);
            $USPModel->{USPModel::SLIDE_STATUS} = $request->input(USPModel::SLIDE_STATUS);
            $USPModel->{USPModel::SLIDE_SORTING} = $request->input(USPModel::SLIDE_SORTING);           
            $USPModel->{USPModel::STATUS} = 1;
            $USPModel->{USPModel::CREATED_BY} = Auth::user()->id;
            $USPModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(USPRequest $request){
        $maxId = USPModel::max(USPModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(USPRequest $request){
        $check = USPModel::where([USPModel::ID=>$request->input(USPModel::ID),USPModel::STATUS=>1])->first();
        if($check){
            if($request->hasFile('image')){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{USPModel::IMAGE} = $imageUpload["data"];
                    $check->{USPModel::SLIDE_SORTING} = $request->input(USPModel::SLIDE_SORTING);
                    $check->{USPModel::HEADING_TOP} = $request->input(USPModel::HEADING_TOP);
                    $check->{USPModel::HEADING_MIDDLE} = $request->input(USPModel::HEADING_MIDDLE);
                    // $check->{USPModel::HEADING_BOTTOM} = $request->input(USPModel::HEADING_BOTTOM);
                    $check->{USPModel::SLIDE_STATUS} = $request->input(USPModel::SLIDE_STATUS);
                    $check->{USPModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{USPModel::SLIDE_SORTING} = $request->input(USPModel::SLIDE_SORTING);
                $check->{USPModel::HEADING_TOP} = $request->input(USPModel::HEADING_TOP);
                $check->{USPModel::HEADING_MIDDLE} = $request->input(USPModel::HEADING_MIDDLE);
                // $check->{USPModel::HEADING_BOTTOM} = $request->input(USPModel::HEADING_BOTTOM);
                $check->{USPModel::SLIDE_STATUS} = $request->input(USPModel::SLIDE_STATUS);
                $check->{USPModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(USPRequest $request){
        $check = USPModel::find($request->input(USPModel::ID));
        if($check){
            $check->{USPModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{USPModel::SLIDE_STATUS} = USPModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{USPModel::SLIDE_STATUS} = USPModel::SLIDE_STATUS_DISABLED;
                $return = ["status"=>true,"message"=>"Disabled successfully.","data"=>""];
            }
            $this->forgetSlides();
            $check->save();
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>""];
        }
        return $return;
    }
}
