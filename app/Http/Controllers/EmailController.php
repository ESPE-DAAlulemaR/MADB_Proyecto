<?php

namespace App\Http\Controllers;

use App\Mail\ErrorSuccesMailable;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'destination_address' => 'required',
        ]);

        $email = new ErrorSuccesMailable($request->all());
        Mail::to($request->destination_address)->send($email);

        return response()->json([ 'message' => 'Correo Enviado' ]);
    }
}
