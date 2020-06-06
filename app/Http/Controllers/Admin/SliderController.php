<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\DataTable\Api;
use App\Slider;
use App\SliderContent;
USE Auth;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $model = new SliderContent();
        $api    = new Api($model,$request);
        echo json_encode($api->apply());
    }
    public function index()
    {
        $sliders = Slider::orderBy('created_at','DESC')->paginate(10);
        return view('admin.slider.index',\compact('sliders'));
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
            'page' => 'required',
            'position' => 'required',
            'title.*' => 'required',
            'short_description.*' => 'required',
            'description.*' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1920,min_height=1080,ratio:16/9',
        ]);
        if(!$validator->fails()) 
        {
            $slider                = $request->only(['page', 'position']);
            $slider['admin_id']    = Auth::guard('admin')->user()->id;
            $slider['is_disabled'] = '0';
            $slider['created_at']  = date('Y-m-d H:i:s');
            $insert                = Slider::create($slider);
            if($insert->id) 
            {
                $sliderContents = $request->only(['title','short_description', 'description']);
                if ($request->hasfile('image')) 
                {
                    $files = $request->file("image");
                    $i     = 0;
                    foreach ($files as $file) 
                    {
                        $fileNameStore = NULL;
                        $ext           = NULL;
                        $sliderContent = [];
                        if($file->isValid()) 
                        {
                            $ext                                = $file->getClientOriginalExtension();
                            $fileNameStore                      = 'SLIDER' . time() . rand(1000, 9999) . '.' . $ext;
                            $path                               = $file->move(public_path() . '/images/slider/', $fileNameStore);
                            $sliderContent['image']             = basename($path);
                            $sliderContent['slider_id']         = $insert->id;
                            $sliderContent['title']             = $sliderContents['title'][$i];
                            $sliderContent['short_description'] = $sliderContents['short_description'][$i];
                            $sliderContent['description']       = $sliderContents['description'][$i];
                            $sliderContent['created_at']        = date('Y-m-d H:i:s');
                            $sliderContent['is_disabled']       = '0';
                            SliderContent::create($sliderContent);
                        }
                    }
                }
                $sliders = Slider::with('sliderContents')->find($insert->id);
                return response()->json(['response' => 'success', 'base_url' => asset('/images/slider/'), 'data' => $sliders, 'message' => 'Slider added successfully.']);
            } 
            else 
            {
                return response()->json(['response' => 'error', 'message' => 'Slider addition failed']);
            }
        } 
        else 
        {
            return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if (!$validator->fails()) 
        {
            $slider = Slider::with('sliderContents')->find($request->input('id'))->toArray();
            if ($slider) 
            {
                return response()->json(['response' => 'success', 'base_url' => asset('/images/slider').'/', 'data' => $slider, 'message' => 'Slider found.']);
            } 
            else 
            {
                return response()->json(['response' => 'error', 'message' => 'Specified Slider not found']);
            }
        }
        return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'page' => 'required',
            'position' => 'required',
            'title.*' => 'required',
            'short_description.*' => 'required',
            'description.*' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=1920,min_height=1080,ratio:16/9',
        ]);
        if (!$validator->fails()) 
        {
            $slider            = Slider::find($request->input('id'));
            if($slider) 
            {
                $slider->page     = $request->input('page');
                $slider->position = $request->input('position');
                $slider->admin_id = Auth::guard('admin')->user()->id;
                $slider->save();
                $sliderContents = $request->only(['title', 'short_description', 'description']);
                if($request->hasfile('image')) 
                {
                    $files = $request->file("image");
                    $i     = 0;
                    foreach ($files as $file) 
                    {
                        $fileNameStore = NULL;
                        $ext           = NULL;
                        $sliderContent = [];
                        if($file->isValid()) 
                        {
                            $ext                                = $file->getClientOriginalExtension();
                            $fileNameStore                      = 'SLIDER' . time() . rand(1000, 9999) . '.' . $ext;
                            $path                               = $file->move(public_path() . '/images/slider/', $fileNameStore);
                            $sliderContent['image']             = basename($path);
                            $sliderContent['slider_id']         = $request->input('id');
                            $sliderContent['title']             = $sliderContents['title'][$i];
                            $sliderContent['short_description'] = $sliderContents['short_description'][$i];
                            $sliderContent['description']       = $sliderContents['description'][$i];
                            $sliderContent['created_at']        = date('Y-m-d H:i:s');
                            $sliderContent['is_disabled']       = '0';
                            SliderContent::create($sliderContent);
                        }
                    }
                }
                $sliders = Slider::with('sliderContents')->find($request->input('id'))->toArray();
                return response()->json(['response' => 'success', 'base_url' => asset('/images/slider/'), 'data' => $sliders, 'message' => 'Slider updated successfully.']);
            }
            else 
            {
                return response()->json(['response' => 'error', 'message' => 'Slider not found']);
            }
        }
         else 
        {
            return response()->json(['response' => 'error', 'message' => $validator->errors()->all()]);
        }
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
