<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Document;
use App\Http\Controllers\Controller;
use App\Notifications\AlertDocumentExpiryDate;
use App\Owner;
use App\OwnerAuthPerson;
use App\TenancyContract;
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


                        $item[] = $doc->archive_type;

                        switch ($doc->archive_type) {
                            case "owner":
                                $class = Owner::class;
                                $id    = $doc->archive_id;
                                break;
                            case "owner_auth_person":
                            case "authorised_person":
                                $class = OwnerAuthPerson::class;
                                $id    = $doc->archive_id;
                                break;
                            case "tenant":
                                $class = Tenant::class;
                                $id    = $doc->archive_id;
                                break;
                            case "tenancy_contracts":
                                $class    = Tenant::class;
                                $contract = TenancyContract::find($doc->archive_id);
                                $id       = $contract->tenant_id;
                                break;
                            default:
                                $class = null;
                                $id    = null;
                                break;

                        }



                        $user = $class::find($id);
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
                $result = ["status"=>0,"response"=>"error","message"=>$exception->getMessage()];
            }

        }
        else
        {
            $result = ["status"=>0,"response"=>"error","message"=>$validator->errors()->all()];
        }
        return response()->json($result,200);
    }
}
