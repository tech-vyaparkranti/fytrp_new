<?php

namespace App\Http\Controllers;

use App\Models\NewsLetterEmail;
use App\Traits\CommonFunctions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class NewsLetterController extends Controller
{
    use CommonFunctions;
    // public function subscribeNewsLetter(Request $request){
    //     try{
    //         $validate = Validator::make($request->all(),
    //         [
    //             NewsLetterEmail::EMAIL_ID=>"required|unique:news_letter_emails",
    //             "captcha"=>"required|captcha"
    //         ],
    //         [
    //             "captcha.required"=>"Captcha text is required.",
    //             "captcha.captcha"=>"Captcha text is not correct."
    //         ]);
    //         if($validate->fails()){
    //             $response = $this->returnMessage($validate->getMessageBag()->first());
    //         }else{
    //             $object = new NewsLetterEmail();
    //             $object->{NewsLetterEmail::EMAIL_ID} = $request->{NewsLetterEmail::EMAIL_ID};
    //             $object->{NewsLetterEmail::IP_ADDRESS} = $this->getIp();
    //             $object->{NewsLetterEmail::USER_AGENT} = $request->userAgent();
    //             $object->save();
    //             $response = $this->returnMessage("Thank you subscribed successfully.",true);
    //         }
    //     }catch(Exception $exception){
    //         report($exception);
    //         $response = $this->returnMessage("Something went wrong.");
    //     }
    //     return response()->json($response);
    // }

    public function subscribeNewsLetter(Request $request)
{
    try {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email_id' => 'required|email|unique:news_letter_emails,email_id',
        ]);

        if ($validator->fails()) {
            // Flash error message to session
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // Save subscription
        $newsletter = new NewsLetterEmail();
        $newsletter->email_id = $request->email_id;
        $newsletter->ip_address = $request->ip();
        $newsletter->user_agent = $request->header('User-Agent');
        $newsletter->save();

        // Flash success message to session
        return redirect()->back()->with('success', 'Thank you for subscribing!');
    } catch (\Exception $e) {
        \Log::error('Subscription error:', ['exception' => $e]);
        // Flash error message to session
        return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
    }
}

    public function manageNewsLetterAdmin(){
        return view("Dashboard.Pages.manageNewsLetterAdmin");
    }

    // public function getNewsLetterData(){
        
    //     $query = NewsLetterEmail::select(
    //         NewsLetterEmail::ID,
    //         NewsLetterEmail::EMAIL_ID,
    //         NewsLetterEmail::CREATED_AT,
    //         NewsLetterEmail::IP_ADDRESS,
    //         NewsLetterEmail::USER_AGENT
    //     );
    //     return DataTables::of($query)
    //         ->addIndexColumn()
    //         ->addColumn('created_at', function ($row) {
    //             return Carbon::parse($row->{NewsLetterEmail::CREATED_AT})->toDayDateTimeString();
    //         })
    //         ->make(true);
    // }
    public function getNewsLetterData()
{
    $query = NewsLetterEmail::select(
        'id',
        'email_id',
        'ip_address',
        'created_at'
    );

    return DataTables::of($query)
        ->addIndexColumn() // Adds DT_RowIndex for "Sr.No."
        ->editColumn('created_at', function ($row) {
            return $row->created_at
                ? $row->created_at->setTimezone('Asia/Kolkata')->toDayDateTimeString() // Convert to IST
                : null;
        })        
        ->make(true);
}
}
