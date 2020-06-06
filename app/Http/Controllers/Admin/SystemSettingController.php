<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\SystemSetting;
class SystemSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function system_setting()
    {
        $setting = SystemSetting::all()->toArray();
        $setting = key_extractor($setting, 'name', 'value');
        return view('admin.settings.systemSetting',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  function to stor website email,links,address and contact number
     */
    public function index()
    {
        return view('admin.settings.index');
    }
    public function store_website_setting(Request $request)
    {
        $input = $request->all();
        foreach($input as $key=>$value)
        {
            $setting['name']      = $key;
            $setting['value']     = $value;
            $setting['admin_id']  = Auth::guard('admin')->user()->id;
            if(!empty($key))
            {
                if (SystemSetting::where(['name' => $key])->first()) 
                {
                    SystemSetting::where('name', $key)->update($setting);
                } 
                else 
                {
                    SystemSetting::create($setting);
                }
            }
            
            
        }
        return response()->json(['response' => 'success', 'message' => 'Setting Updated Successfully']);
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
