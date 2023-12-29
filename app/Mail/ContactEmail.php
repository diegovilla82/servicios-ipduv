<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $phone, $email, $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $content) {

        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ChacoFM - Email de contacto')->view('emails.contact-email');
    }
}
