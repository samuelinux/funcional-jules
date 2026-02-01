<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Minha Carteira')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.usuario.dashboard');
    }
}
