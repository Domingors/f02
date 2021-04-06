<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class correo extends Mailable
{
    use Queueable, SerializesModels;
    public $nPed;
    public $artsPedi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $nPed, Collection $artsPedi)
    {
        $this->nPed=$nPed;
        $this->artsPedi=$artsPedi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $num=$this->nPed;
        $artsPedi=$this->artsPedi;
        return $this->view('mails.correo',compact('num','artsPedi'));
    }
}
