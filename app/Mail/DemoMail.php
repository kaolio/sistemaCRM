<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    public $datos;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $datos)
    {
        $this->mailData = $mailData;
        $this->datos = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('RECUPERACION DE DATOS')
        ->view('emails.demoMail',compact($this->datos));
    }
}
