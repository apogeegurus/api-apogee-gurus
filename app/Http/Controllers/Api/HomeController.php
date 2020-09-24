<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreContact;
use App\Mail\SendAdminEmail;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function services(){
        $services  = Service::query()->where('status',Service::ACTIVE)->get();
        return response()->json([
            'services' => $services
        ]);
    }

    public function portfolios(){
        $portfolios = Portfolio::all();
        return response()->json([
            'portfolios' => $portfolios
        ]);
    }

    public function contact(StoreContact $request){
        $request->request->add(['status' => 0]);
        $contact = Contact::query()->create($request->only(['name','email','message','status']));
        if($contact){
            Mail::to(config('app.admin_email'))->send(new SendAdminEmail($contact));
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
