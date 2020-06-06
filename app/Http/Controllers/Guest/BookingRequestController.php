<?php
namespace App\Http\Controllers\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\BookingRequest;
class BookingRequestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'message' => 'required',
            'property_id' => 'numeric|required',
        ]);
        if(!$validator->fails()) 
        {
           $bookingRequest = $request->only(['name','contact','email','message','property_id']);
            if (BookingRequest::create($bookingRequest)) 
            {
                return response()->json(['status'=>1,'response' => 'success', 'data' => $bookingRequest, 'message' => 'Booking Request Recieved Successfully,We Will Call You Back Soon,Thank You.']);
            } else {
                return response()->json(['status'=>0,'response' => 'error', 'message' => 'Something Went Wrong ,Please Try Again.']);
            }
        }
        return response()->json(['status'=>0,'response' => 'error', 'message' => $validator->errors()->all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
