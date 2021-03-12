<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correo extends Mailable
{
    use Queueable, SerializesModels;
    public $nPed;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $nPed)
    {
        $this->nPed=$nPed;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $num=$this->nPed;
        return $this->view('mails.correo',compact('num'));
    }
}
