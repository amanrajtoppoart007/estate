<?php

namespace App\Http\Controllers\Admin;

use App\DataTable\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Designation;

class DesignationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function fetch(Request $request)
    {
        echo json_encode((new Api((new Designation())))->getResult());
    }

    public function index()
    {
        $designations = Designation::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.designation.index')->with('designations', $designations);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if (!$validator->fails()) {
            $designation = $request->all();
            $designation['admin_id'] = Auth::guard('admin')->user()->id;
            $designation['is_disabled'] = '0';
            $designation['created_at'] = date('Y-m-d H:i:s');
            $insert = Designation::create($designation);
            if ($insert->id) {
                $designation = Designation::find($insert->id);
                return response()->json(['status' => 1, 'response' => 'success', 'data' => $designation, 'message' => 'Designation added successfully.']);
            } else {
                return response()->json(['status' => 0, 'response' => 'error', 'message' => 'Designation addition failed']);
            }
        } else {
            return response()->json(['status' => 0, 'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if (!$validator->fails()) {
            $designation = Designation::find($request->input('id'));
            if ($designation) {
                return response()->json(['status' => 1, 'response' => 'success', 'data' => $designation, 'message' => 'Designation found.']);
            } else {
                return response()->json(['status' => 0, 'response' => 'error', 'message' => 'Specified Designation not found']);
            }
        }
        return response()->json(['status' => 0, 'response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
        ]);
        if (!$validator->fails()) {
            $designation = Designation::find($request->input('id'));
            $designation->name = $request->input('name');
            $designation->updated_at = date('Y-m-d H:i:s');
            if ($designation->save()) {
                $designation = Designation::find($request->input('id'));
                return response()->json(['status' => 1, 'response' => 'success', 'data' => $designation, 'message' => 'Designation updated successfully.']);
            } else {
                return response()->json(['status' => 0, 'response' => 'error', 'message' => 'Designation updation failed']);
            }
        }
        return response()->json(['status' => 0, 'response' => 'error', 'message' => $validator->errors()->all()]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), ['id' => 'required']);
        if (!$validator->fails()) {
            if (Designation::destroy($request->input('id'))) {
                return response()->json(['status' => 1, 'response' => 'success', 'message' => 'Designation deleted successfully.']);
            } else {
                return response()->json(['status' => '0', 'response' => 'error', 'message' => 'Designation deletion failed.']);
            }
        } else {
            return response()->json(['status' => '0', 'response' => 'error', 'message' => $validator->errors()->all()]);
        }
    }

    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'numeric|required',
            'is_disabled' => 'numeric',
        ]);
        if (!$validator->fails()) {
            $status = ($request->is_disabled) ? '0' : '1';
            if (Designation::where(['id' => $request->id])->update(['is_disabled' => $status])) {
                return response()->json(['status' => 1, 'response' => 'success', 'data' => ['is_disabled' => $status, 'id' => $request->id], 'message' => 'Status updated successfully.']);
            } else {
                return response()->json(['status' => '0', 'response' => 'error', 'message' => 'Status not updated.']);
            }
        }
        return response()->json(['status' => '0', 'response' => 'error', 'message' => $validator->errors()->all()]);
    }
}
