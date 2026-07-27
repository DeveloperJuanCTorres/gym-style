<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    public $image;

    public function __construct($request,$image)
    {
        $this->request=$request;
        $this->image=$image;
    }

    public function build()
    {

        $mail = $this->subject('Nueva solicitud de producto')
                    ->view('emails.product-request');

        if($this->image){

            $mail->attach(
                storage_path('app/public/'.$this->image)
            );

        }

        return $mail;

    }
}
