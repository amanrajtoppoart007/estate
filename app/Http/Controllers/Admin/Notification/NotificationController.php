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
        $id_list = [1,2,3,4,5,6,7,8,9];
        $validator = Validator::make($id_list,[
        ]);
        if(!$validator->fails())
        {
            $id_list = $id_list;
            foreach($id_list as $id)
            {
                $doc = Document::find($id);
                if(!empty($doc))
                {

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
        }
    }
}
