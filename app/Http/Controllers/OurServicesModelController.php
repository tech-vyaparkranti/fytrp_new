<?php

namespace App\Http\Controllers;

use App\Http\Requests\OurServicesRequest;
use App\Http\Requests\StoreOurServicesModelRequest;
use App\Http\Requests\UpdateOurServicesModelRequest;
use App\Models\OurServicesModel;
use App\Traits\CommonFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OurServicesModelController extends Controller
{
    use CommonFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewOurServicesMaster()
    {
        
        return view("Dashboard.Pages.ourServicesAdmin");
    }

    public function saveOurServicesMaster(OurServicesRequest $request)
    {
        Cache::forget("our_services");
        switch ($request->input("action")) {
            case "insert":
                $return = $this->insertData($request);
                break;
            case "update":
                $return = $this->updateData($request);
                break;
            case "enable":
                $return = $this->enableRow($request);
                break;
            case "disable":
                $return = $this->disableRow($request);
                break;
            default:
                $return = ["status" => false, "message" => "Unknown action.", "data" => null];
        }
        return response()->json($return);
    }

    public function ImageUpload(OurServicesRequest $request)
    {
        $maxId = OurServicesModel::max(OurServicesModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request, OurServicesModel::SERVICE_IMAGE, "/website/uploads/service_images/", "service_image_$maxId");
    }
    public function insertData(OurServicesRequest $request)
    {
        $checkDuplicate = OurServicesModel::where(OurServicesModel::SERVICE_NAME, $request->input(OurServicesModel::SERVICE_NAME))->first();

        if ($checkDuplicate) {
            $return = $this->returnMessage("Service name is already taken");
        } else {
            $image_url = "";
            $imageUpload = $this->ImageUpload($request);
            if ($imageUpload["status"]) {
                $image_url = $imageUpload["data"];
            } else {
                return $imageUpload;
            }
            $createNewRow = new OurServicesModel();
            $createNewRow->{OurServicesModel::SERVICE_NAME} = $request->input(OurServicesModel::SERVICE_NAME);
            $createNewRow->{OurServicesModel::SERVICE_IMAGE} = $image_url;
            $createNewRow->{OurServicesModel::SERVICE_DETAILS} = $request->input(OurServicesModel::SERVICE_DETAILS);
            $createNewRow->{OurServicesModel::POSITION} = $request->input(OurServicesModel::POSITION);
            $createNewRow->{OurServicesModel::STATUS} = 1;
            $createNewRow->{OurServicesModel::CREATED_BY} = Auth::user()->id;
            $createNewRow->save();
            $return = $this->returnMessage("Saved successfully.", true);
        }
        return $return;
    }

    public function  updateData(OurServicesRequest $request)
    {
        $checkDuplicate = OurServicesModel::where([
            [OurServicesModel::SERVICE_NAME, $request->input(OurServicesModel::SERVICE_NAME)],
            [OurServicesModel::ID, "<>", $request->input(OurServicesModel::ID)]
        ])->first();

        if ($checkDuplicate) {
            $return = $this->returnMessage("Service name is already taken");
        } else {
            $updateModel = OurServicesModel::find($request->input(OurServicesModel::ID));
            $image_url = $updateModel->{OurServicesModel::SERVICE_IMAGE};
            if($request->file(OurServicesModel::SERVICE_IMAGE)){
                $imageUpload = $this->ImageUpload($request);
                if ($imageUpload["status"]) {
                    $image_url = $imageUpload["data"];
                } else {
                    return $imageUpload;
                }
            }          
            
            
            $updateModel->{OurServicesModel::SERVICE_NAME} = $request->input(OurServicesModel::SERVICE_NAME);
            $updateModel->{OurServicesModel::SERVICE_IMAGE} = $image_url;
            $updateModel->{OurServicesModel::SERVICE_DETAILS} = $request->input(OurServicesModel::SERVICE_DETAILS);
            $updateModel->{OurServicesModel::POSITION} = $request->input(OurServicesModel::POSITION);
            $updateModel->{OurServicesModel::STATUS} = 1;
            $updateModel->{OurServicesModel::UPDATED_BY} = Auth::user()->id;
            $updateModel->save();
            $return = $this->returnMessage("Saved successfully.", true);
        }
        return $return;
    }

    public function enableRow(OurServicesRequest $request)
    {
        $check = OurServicesModel::where(OurServicesModel::ID, $request->input(OurServicesModel::ID))->first();
        if ($check) {
            $check->{OurServicesModel::STATUS} = 1;
            $check->{OurServicesModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Enabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }

    public function disableRow(OurServicesRequest $request)
    {
        $check = OurServicesModel::where(OurServicesModel::ID, $request->input(OurServicesModel::ID))->first();
        if ($check) {
            $check->{OurServicesModel::STATUS} = 0;
            $check->{OurServicesModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Disabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }

    public function ourServicesData()
    {
        $query = OurServicesModel::query()->select(
            OurServicesModel::SERVICE_NAME,
            OurServicesModel::SERVICE_IMAGE,
            OurServicesModel::SERVICE_DETAILS,
            OurServicesModel::POSITION,
            OurServicesModel::STATUS,
            OurServicesModel::ID
        );
    
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm mt-2">Edit</a>';
                $btn_toggle = $row->{OurServicesModel::STATUS} == 1
                    ? '<a href="javascript:void(0)" onclick="Disable(' . $row->{OurServicesModel::ID} . ')" class="btn btn-danger btn-sm mt-2">Disable</a>'
                    : '<a href="javascript:void(0)" onclick="Enable(' . $row->{OurServicesModel::ID} . ')" class="btn btn-primary btn-sm mt-2">Enable</a>';
                return $btn_edit . $btn_toggle;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    

    public function getHomePageServices(){
        $homeServices = $this->getOurServiceData();
        if(empty($homeServices)){
            Cache::forget("our_services");
        }
        return response()->json($homeServices);
    }

    public function getOurServiceData(){
        return Cache::rememberForever('our_services', function () {
            return OurServicesModel::where(OurServicesModel::STATUS,1)
            ->select(DB::raw("concat('".url('')."',".OurServicesModel::SERVICE_IMAGE.") as ".OurServicesModel::SERVICE_IMAGE),OurServicesModel::SERVICE_NAME,
            OurServicesModel::SERVICE_DETAILS,OurServicesModel::ID)->orderBy(OurServicesModel::POSITION,"asc")
            ->get();
        });
    }
}
