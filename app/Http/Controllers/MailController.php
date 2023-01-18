<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    //

    public function index()
    {
        $mailData = [
            'title' => 'Orden de Trabajo #',
            'body' => 'Estimado/a: '
        ];
        
        //Mail::to('alexcalle64@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
