<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotaCliente extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    public $nota;

 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $nota)
    {
        $this->mailData = $mailData;
        $this->nota = $nota;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('RECUPERACION DE DATOS')
        ->view('emails.notaCliente');
    }
}
