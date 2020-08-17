<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Document;
use App\Http\Controllers\Controller;
use App\Notifications\AlertDocumentExpiryDate;
use App\Owner;
use App\OwnerAuthPerson;
use App\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:admin");
    }

    public function create_document_notification(Request $request)
    {

        $validator = Validator::make($request->all(),[
            "document.*"=>"required|numeric"
        ]);
        if(!$validator->fails())
        {
            try {
                foreach ($request->document as $id) {
                    $doc = Document::find($id);
                    if (!empty($doc)) {

                        switch ($doc->archive_type) {
                            case "owner":
                                $class = Owner::class;
                                break;
                            case "tenant":
                                $class = Tenant::class;
                                break;
                            case "owner_auth_person":
                                $class = OwnerAuthPerson::class;
                                break;
                            default:
                                $class = null;

                        }

                        $user = $class::find($doc->archive_id);
                        if (!empty($user)) {
                            $notification = [
                                'greeting' => 'Hi Artisan',
                                'body' => 'This is our example notification tutorial',
                                'thanks' => 'Thank you for visiting our website',
                            ];
                            $user->notify(new AlertDocumentExpiryDate($notification));
                        }
                    }
                }

                $result = ["status"=>1,"response"=>"success","message"=>"Notification sent successfully"];
            }
            catch (\Exception $exception)
            {
                $result = ["status"=>0,"response"=>"error","message"=>"Notification not sent,please try again or contact website administrator"];
            }

        }
        else
        {
            $result = ["status"=>0,"response"=>"error","message"=>$validator->errors()->all()];
        }
        return response()->json($result,200);
    }
}
