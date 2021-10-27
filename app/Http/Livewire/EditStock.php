<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditStock extends ModalComponent
{
    public function render()
    {
        return view('livewire.edit-stock');
    }
}
