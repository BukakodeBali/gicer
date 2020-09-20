<?php


namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Mails\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        if ($request->has('website') && $request->website != '') {
            return response()->json(['message' => 'Hi newbeeee :-)'], 400);
        }

        Mail::to('arisudarma@gmail.com')->send(new ContactMail($request->all()));
        return response()->json(['message' => 'Email berhasil dikirim'], 200);
    }
}
