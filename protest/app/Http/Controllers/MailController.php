<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Hi there! TGLS here',
            'body' => 'Sending you this test mail'
        ];

        Mail::to("admin1@test.com")->send(new TestMail($details));
        return "Email sent";
    }
}
