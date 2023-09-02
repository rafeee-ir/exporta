<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test emails.'
        ];

        Mail::to('sales@exportaworld.com')->send(new SendMail($testMailData));

        dd('Success! Email has been sent successfully.');
    }
}
