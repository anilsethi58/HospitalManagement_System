<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App/Mail/Se

class EmailController extends Controller
{
    public function sendEmail(){

        $to="anilkumar71870@gmail.com";
        $msg="Hello, this is a test email from Laravel.";
        $subject="Test Email";
    Mail::to($to)->send(new SendMail($msg,$subject));

    }
}
