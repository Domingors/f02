<?php

namespace App\Http\Livewire;

use Illuminate\Queue\Listener;
use Livewire\Component;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;

class LivePhpModal extends Component
{
    public $open=false;
    public $idP;
    public $path;
    public function render()
    {
        $this->path="pdf/".$this->idP.".pdf";
        return view('livewire.live-php-modal');
    }
}
