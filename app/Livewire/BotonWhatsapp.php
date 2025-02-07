<?php

namespace App\Livewire;

use Livewire\Component;

class BotonWhatsapp extends Component
{
    public $algo = "hola";
    
    public function render()
    {
        return view('livewire.boton-whatsapp');
    }

    public function registrarClicks (){

    }
}
