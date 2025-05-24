<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookHotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Traits\CommonFunctions;
use Exception;

class BookHotelController extends Controller
{
    const ACTIVE_HOTEL = "getActiveHotel";

    public function manageHotel()
    {
        return view('Dashboard.Pages.manageHotel');
    }

    public function store(Request $request)
    {
        switch ($request->input("action"))
        {
            case "insert":
                $return = $this->save($request);
                break;
            case "update":
                $return = $this->updateHotel($request);
                break;
            default:
                $return = ["status" => false, "message" => "Unknown action.", "data" => null];
        }
        return response()->json($return);
    }

    public function save(Request $request)
    {       
        try {
            $validate = $this->validateHOTELData($request);
            if ($validate->fails()) {
                return response()->json([
                    "status" => false, 
                    "message" => $validate->getMessageBag()->first(), 
                    "data" => null
                ]);
            }
           

            // Check for uploaded images
            if ($request->hasFile('hotel_image')) {
                // $images = $this->uploadMultipleImages($request); 

                $imagePaths = [];
                foreach ($request->file(BookHotel::HOTEL_IMAGE) as $index => $image) {

                    $imageName = $image->getClientOriginalName();

                    $image->move(public_path('images/hotel_images'), $imageName);
                    $imagePaths[] = 'images/hotel_images/' . $imageName;

                }
                $imageJson = json_encode($imagePaths);
            }
    
            
            $HOTEL = new BookHotel();
            $HOTEL->{BookHotel::HOTEL_NAME} = $request->input(BookHotel::HOTEL_NAME);
            $HOTEL->{BookHotel::HOTEL_IMAGE} = $imageJson;
            $HOTEL->{BookHotel::DESCRIPTION} = $request->input(BookHotel::DESCRIPTION);
            $HOTEL->{BookHotel::META_TITLE} = $request->input(BookHotel::META_TITLE);
            $HOTEL->{BookHotel::META_KEYWORD} = $request->input(BookHotel::META_KEYWORD);
            $HOTEL->{BookHotel::META_DESCRIPTION} = $request->input(BookHotel::META_DESCRIPTION);
            $HOTEL->{BookHotel::CREATED_BY} = Auth::user()->id;
            $HOTEL->{BookHotel::STATUS} = 1;
    
            $HOTEL->save();
    
            return $this->returnMessage("Saved successfully.", true);
    
        } catch (\Throwable $th) {
            return response()->json([
                'message' => "Upload failed", 
                'error' => $th->getMessage()
            ], 422);
        }
    }

    public function validateHOTELData(Request $request){
        return  Validator::make($request->all(),
          [
             "id"=>"nullable|bail|required_if:action,edit",
            "hotel_name"=>"required",
            "hotel_image" => "required_if:action,insert|array",
            "hotel_image.*" => "file|mimes:jpeg,jpg,png,gif",
            // 'meta_title' => "required|string",
            // 'meta_keyword' => "required|string",
            // 'meta_description' => "required|string",

          ]);
    }


    public function hotelData()
    {

        $query = BookHotel::select(
            BookHotel::HOTEL_IMAGE,
            BookHotel::HOTEL_NAME,
            BookHotel::META_KEYWORD,
            BookHotel::META_TITLE,
            BookHotel::META_DESCRIPTION,
            BookHotel::DESCRIPTION,
            // BookHotel::SORTING_NUMBER,
            BookHotel::STATUS,
            BookHotel::ID
        );
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<a data-row="' . base64_encode(json_encode($row)) . '" href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';

                $btn_disable = ' <a   href="javascript:void(0)" onclick="Disable(' . $row->{BookHotel::ID} . ')" class="btn btn-danger btn-sm">Disable </a>';
                $btn_enable = ' <a   href="javascript:void(0)" onclick="Enable(' . $row->{BookHotel::ID} . ')" class="btn btn-primary btn-sm">Enable </a>';
                if ($row->{BookHotel::STATUS} == 1) {
                    return $btn_edit . $btn_disable;
                } else {
                    return $btn_edit . $btn_enable;
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function action(Request $request)
    {
        switch ($request->input("action"))
        {
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

    public function enableRow(Request $request)
   {
       $check = BookHotel::where(BookHotel::ID, $request->input(BookHotel::ID))->first();
       if ($check) {
           $check->{BookHotel::STATUS} = "1";
           $check->save();
          
            
            $return = $this->returnMessage("Enable successfully.", true);
        }
          else {
            // return response()->json(['message' => 'Details not found.'], 200);
        $return = $this->returnMessage("Details not found.");
         }
         return $return;
       

   }
   public function disableRow(Request $request)
   {
       $check = BookHotel::where(BookHotel::ID, $request->input(BookHotel::ID))->first();
       if ($check) {
           $check->{BookHotel::STATUS} = "0";
           $check->save();
           $return = $this->returnMessage("Disabled successfully.", true);
        } 
        else {
            $return = $this->returnMessage("Details not found.");
        }
        return $return;
       
   }
   

   public function returnMessage($message,$status=false,$data = []){
    return ["status"=>$status,"message"=>$message,"data"=>$data];
    }

    public function updateHotel(Request $request)
    {
        try{
           $validate = Validator::make($request->all(),
          [
             "id"=>"nullable|bail|required_if:action,edit",
            "hotel_name"=>"required",          
            'meta_title' => "required|string",
            'meta_keyword' => "required|string",
            'meta_description' => "required|string",

          ]);
            $BookHotel = BookHotel::where([
                [BookHotel::ID,$request->input(BookHotel::ID)]])->first();

            if($BookHotel){
                if ($validate->fails()) {
                    return response()->json([
                        "status" => false, 
                        "message" => $validate->getMessageBag()->first(), 
                        "data" => null
                    ]);
                }
                $images = [];
                
                if ($request->hasFile('hotel_image')) {
                    $imagePaths = [];
                    foreach ($request->file(BookHotel::HOTEL_IMAGE) as $index => $image) {

                    $imageName = $image->getClientOriginalName();

                    $image->move(public_path('images/hotel_images'), $imageName);
                    $imagePaths[] = 'images/hotel_images/' . $imageName;

                }
                $imageJson = json_encode($imagePaths);
                $BookHotel->hotel_image = $imageJson;
                }

                $BookHotel->description = $request->description;
                $BookHotel->status = "1";
                $BookHotel->hotel_name = $request->hotel_name;
                $BookHotel->meta_keyword = $request->meta_keyword;
                $BookHotel->meta_title = $request->meta_title;
                $BookHotel->meta_description = $request->meta_description;
               
                $BookHotel->save();
                return $this->returnMessage("update successfully.", true);

            }else{
                $return = ["status"=>false,"message"=>"Not found.","data"=>"null"];
            }  
            return $this->returnMessage(" data not found in database.", false);
  
        }catch (\Throwable $th) {
            return response()->json([
                'message' => "Upload failed", 
                'error' => $th->getMessage()
            ], 422);
        }
    }
  

}
