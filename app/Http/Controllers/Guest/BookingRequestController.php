<?php
namespace App\Http\Controllers\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\BookingRequest;
class BookingRequestController extends Controller
{


    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country_code' => 'required',
            'contact' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'message' => 'required',
            'property_id' => 'numeric|required',
            'unit_id' => 'numeric|required',
        ]);
        if(!$validator->fails())
        {
           $bookingRequest = $request->only(['name','country_code','contact','email','message','property_id','unit_id']);
           if(auth()->check())
           {
               $bookingRequest['user_id'] = auth()->user()->id;
           }
            if (BookingRequest::create($bookingRequest))
            {
                return response()->json(['status'=>1,'response' => 'success',  'message' => 'Booking Request Received Successfully,We Will Call You Back Soon,Thank You.']);
            } else {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Something Went Wrong ,Please Try Again.']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
