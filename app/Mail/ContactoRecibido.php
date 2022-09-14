<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    private $contacto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->contacto['email'],$this->contacto['nombre'])
            ->from('contacto@umes.edu.gt', 'Atencion al Cliente')
            ->replyTo('mauricio@incodemode.com', 'Luis')
            ->subject('Contacto Recibido')
            ->view('emails.contactado')->with($this->contacto);

    }
}
