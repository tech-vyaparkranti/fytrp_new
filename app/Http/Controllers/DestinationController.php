<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationRequest;
use App\Models\DestinationModel;
use App\Traits\CommonFunctions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DestinationController extends Controller
{
    use CommonFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewDestinationMaster()
    {
        
        return view("Dashboard.Pages.managedestination");
    }

    public function saveDestinationMaster(DestinationRequest $request)
    {
        Cache::forget("our_destinations");
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

    public function ImageUpload(DestinationRequest $request)
    {
        $maxId = DestinationModel::max(DestinationModel::ID);
        $maxId += 1;
        $timeNow = strtotime($this->timeNow());
        $maxId .= "_$timeNow";
        return $this->uploadLocalFile($request, DestinationModel::DESTINATION_IMAGE, "/website/uploads/destination_images/", "destination_image_$maxId");
    }
    public function insertData(DestinationRequest $request)
{
    $checkDuplicate = DestinationModel::where(DestinationModel::DESTINATION, $request->input(DestinationModel::DESTINATION))->first();

    if ($checkDuplicate) {
        $return = $this->returnMessage("Destination name is already taken");
    } else {
        $image_url = "";
        $imageUpload = $this->ImageUpload($request);
        if ($imageUpload["status"]) {
            $image_url = $imageUpload["data"];
        } else {
            return $imageUpload;
        }

        $createNewRow = new DestinationModel();
        $createNewRow->{DestinationModel::DESTINATION} = $request->input(DestinationModel::DESTINATION);
        $createNewRow->{DestinationModel::DESTINATION_IMAGE} = $image_url;
        $createNewRow->{DestinationModel::DESTINATION_DETAILS} = $request->input(DestinationModel::DESTINATION_DETAILS);
        $createNewRow->{DestinationModel::POSITION} = $request->input(DestinationModel::POSITION);
        $createNewRow->{DestinationModel::META_TITLE} = $request->input('meta_title');  // Save Meta Title
        $createNewRow->{DestinationModel::META_DESCRIPTION} = $request->input('meta_description');  // Save Meta Description
        $createNewRow->{DestinationModel::META_KEYWORDS} = $request->input('meta_keywords');  // Save Meta Keywords
        $createNewRow->{DestinationModel::STATUS} = 1;
        $createNewRow->{DestinationModel::CREATED_BY} = Auth::user()->id;
        $createNewRow->save();

        $return = $this->returnMessage("Saved successfully.", true);
    }
    return $return;
}


public function updateData(DestinationRequest $request)
{
    $checkDuplicate = DestinationModel::where([
        [DestinationModel::DESTINATION, $request->input(DestinationModel::DESTINATION)],
        [DestinationModel::ID, "<>", $request->input(DestinationModel::ID)]
    ])->first();

    if ($checkDuplicate) {
        $return = $this->returnMessage("Destination name is already taken");
    } else {
        $updateModel = DestinationModel::find($request->input(DestinationModel::ID));
        $image_url = $updateModel->{DestinationModel::DESTINATION_IMAGE};
        if ($request->file(DestinationModel::DESTINATION_IMAGE)) {
            $imageUpload = $this->ImageUpload($request);
            if ($imageUpload["status"]) {
                $image_url = $imageUpload["data"];
            } else {
                return $imageUpload;
            }
        }

        $updateModel->{DestinationModel::DESTINATION} = $request->input(DestinationModel::DESTINATION);
        $updateModel->{DestinationModel::DESTINATION_IMAGE} = $image_url;
        $updateModel->{DestinationModel::DESTINATION_DETAILS} = $request->input(DestinationModel::DESTINATION_DETAILS);
        $updateModel->{DestinationModel::POSITION} = $request->input(DestinationModel::POSITION);
        $updateModel->{DestinationModel::META_TITLE} = $request->input('meta_title');  // Update Meta Title
        $updateModel->{DestinationModel::META_DESCRIPTION} = $request->input('meta_description');  // Update Meta Description
        $updateModel->{DestinationModel::META_KEYWORDS} = $request->input('meta_keywords');  // Update Meta Keywords
        $updateModel->{DestinationModel::STATUS} = 1;
        $updateModel->{DestinationModel::UPDATED_BY} = Auth::user()->id;
        $updateModel->save();

        $return = $this->returnMessage("Saved successfully.", true);
    }
    return $return;
}


    public function enableRow(DestinationRequest $request)
    {
        $check = DestinationModel::where(DestinationModel::ID, $request->input(DestinationModel::ID))->first();
        if ($check) {
            $check->{DestinationModel::STATUS} = 1;
            $check->{DestinationModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Enabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }

    public function disableRow(DestinationRequest $request)
    {
        $check = DestinationModel::where(DestinationModel::ID, $request->input(DestinationModel::ID))->first();
        if ($check) {
            $check->{DestinationModel::STATUS} = 0;
            $check->{DestinationModel::UPDATED_BY} = Auth::user()->id;
            $check->save();
             
            $return = $this->returnMessage("Disabled successfully.", true);
        } else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
    }

    public function destinationData()
{
    $query = DestinationModel::query()->select(
        DestinationModel::DESTINATION,
        DestinationModel::DESTINATION_IMAGE,
        DestinationModel::DESTINATION_DETAILS,
        DestinationModel::POSITION,
        DestinationModel::META_TITLE,
        DestinationModel::META_DESCRIPTION,
        DestinationModel::META_KEYWORDS,
        DestinationModel::STATUS,
        DestinationModel::ID
    );

    return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm mt-2">Edit</a>';
            $btn_toggle = $row->{DestinationModel::STATUS} == 1
                ? '<a href="javascript:void(0)" onclick="Disable(' . $row->{DestinationModel::ID} . ')" class="btn btn-danger btn-sm mt-2">Disable</a>'
                : '<a href="javascript:void(0)" onclick="Enable(' . $row->{DestinationModel::ID} . ')" class="btn btn-primary btn-sm mt-2">Enable</a>';
            return $btn_edit . $btn_toggle;
        })
        ->rawColumns(['action'])
        ->make(true);
}

    

    public function getDestination(){
        $destination = $this->getdestinationData();
        if(empty($destination)){
            Cache::forget("our_destinations");
        }
        return response()->json($destination);
    }

    public function getdestinationData(){
        return Cache::rememberForever('our_destinations', function () {
            return DestinationModel::where(DestinationModel::STATUS,1)
            ->select(DB::raw("concat('".url('')."',".DestinationModel::DESTINATION_IMAGE.") as ".DestinationModel::DESTINATION_IMAGE),DestinationModel::DESTINATION,
            DestinationModel::DESTINATION_DETAILS,DestinationModel::ID)->orderBy(DestinationModel::POSITION,"asc")
            ->get();
        });
    }
}
