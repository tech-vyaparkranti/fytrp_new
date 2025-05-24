<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChooseUsRequest;
use App\Models\ChooseUsModel;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ChooseUSController extends Controller
{
    use CommonFunctions;
    //

    public function Choose_Us(){
        return view("Dashboard.Pages.manageChooseUs");
    }

    public function Choose_UsData(){
        try{
            $query = ChooseUsModel::select(ChooseUsModel::IMAGE,
        ChooseUsModel::ID,
        ChooseUsModel::HEADING_TOP,
        // ChooseUsModel::HEADING_BOTTOM,
        ChooseUsModel::HEADING_MIDDLE,
        ChooseUsModel::SLIDE_SORTING,
        ChooseUsModel::SLIDE_STATUS);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                
                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable('.$row->{ChooseUsModel::ID}.')" class="btn btn-danger btn-sm">Disable Slide</a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable('.$row->{ChooseUsModel::ID}.')" class="btn btn-primary btn-sm">Enable Slide</a>';
                if($row->{ChooseUsModel::SLIDE_STATUS}==ChooseUsModel::SLIDE_STATUS_DISABLED){
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

    public function saveChoose_Us(ChooseUsRequest $request){
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

    public function insertSlide(ChooseUsRequest $request){
        $imageUpload = $this->slideImageUpload($request);
        if($imageUpload["status"]){
            $ChooseUsModel = new ChooseUsModel();
            $ChooseUsModel->{ChooseUsModel::IMAGE} = $imageUpload["data"];
            $ChooseUsModel->{ChooseUsModel::HEADING_TOP} = $request->input(ChooseUsModel::HEADING_TOP);
            $ChooseUsModel->{ChooseUsModel::HEADING_MIDDLE} = $request->input(ChooseUsModel::HEADING_MIDDLE);
            // $ChooseUsModel->{ChooseUsModel::HEADING_BOTTOM} = $request->input(ChooseUsModel::HEADING_BOTTOM);
            $ChooseUsModel->{ChooseUsModel::SLIDE_STATUS} = $request->input(ChooseUsModel::SLIDE_STATUS);
            $ChooseUsModel->{ChooseUsModel::SLIDE_SORTING} = $request->input(ChooseUsModel::SLIDE_SORTING);           
            $ChooseUsModel->{ChooseUsModel::STATUS} = 1;
            $ChooseUsModel->{ChooseUsModel::CREATED_BY} = Auth::user()->id;
            $ChooseUsModel->save();
            $return = ["status"=>true,"message"=>"Saved successfully","data"=>null];
            $this->forgetSlides();
        }else{
            $return = $imageUpload;
        }
        return $return;
    }

    public function slideImageUpload(ChooseUsRequest $request){
        $maxId = ChooseUsModel::max(ChooseUsModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request,"image","/website/uploads/Slider/","slide_$maxId");
    }

    public function updateSlide(ChooseUsRequest $request){
        $check = ChooseUsModel::where([ChooseUsModel::ID=>$request->input(ChooseUsModel::ID),ChooseUsModel::STATUS=>1])->first();
        if($check){
            if($request->hasFile('image')){
                $imageUpload =$this->slideImageUpload($request);
                if($imageUpload["status"]){
                    $check->{ChooseUsModel::IMAGE} = $imageUpload["data"];
                    $check->{ChooseUsModel::SLIDE_SORTING} = $request->input(ChooseUsModel::SLIDE_SORTING);
                    $check->{ChooseUsModel::HEADING_TOP} = $request->input(ChooseUsModel::HEADING_TOP);
                    $check->{ChooseUsModel::HEADING_MIDDLE} = $request->input(ChooseUsModel::HEADING_MIDDLE);
                    // $check->{ChooseUsModel::HEADING_BOTTOM} = $request->input(ChooseUsModel::HEADING_BOTTOM);
                    $check->{ChooseUsModel::SLIDE_STATUS} = $request->input(ChooseUsModel::SLIDE_STATUS);
                    $check->{ChooseUsModel::UPDATED_BY} = Auth::user()->id;
                    $check->save();
                    $this->forgetSlides();
                    $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];
                }else{
                    $return = $imageUpload;
                }
            }else{
                $check->{ChooseUsModel::SLIDE_SORTING} = $request->input(ChooseUsModel::SLIDE_SORTING);
                $check->{ChooseUsModel::HEADING_TOP} = $request->input(ChooseUsModel::HEADING_TOP);
                $check->{ChooseUsModel::HEADING_MIDDLE} = $request->input(ChooseUsModel::HEADING_MIDDLE);
                // $check->{ChooseUsModel::HEADING_BOTTOM} = $request->input(ChooseUsModel::HEADING_BOTTOM);
                $check->{ChooseUsModel::SLIDE_STATUS} = $request->input(ChooseUsModel::SLIDE_STATUS);
                $check->{ChooseUsModel::UPDATED_BY} = Auth::user()->id;
                $check->save();
                $this->forgetSlides();
                $return = ["status"=>true,"message"=>"Updated successfully","data"=>null];            
            }
        }else{
            $return = ["status"=>false,"message"=>"Details not found.","data"=>null];
        }
        return $return;
    }

    public function enableDisableSlide(ChooseUsRequest $request){
        $check = ChooseUsModel::find($request->input(ChooseUsModel::ID));
        if($check){
            $check->{ChooseUsModel::UPDATED_BY} = Auth::user()->id;
            if($request->input("action")=="enable"){
                $check->{ChooseUsModel::SLIDE_STATUS} = ChooseUsModel::SLIDE_STATUS_LIVE;
                $return = ["status"=>true,"message"=>"Enabled successfully.","data"=>""];
            }else{
                $check->{ChooseUsModel::SLIDE_STATUS} = ChooseUsModel::SLIDE_STATUS_DISABLED;
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
