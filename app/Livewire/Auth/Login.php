<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Login')]
class Login extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            if (Auth::user()->perfil === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('usuario.dashboard');
        }

        $this->addError('email', 'As credenciais fornecidas não correspondem aos nossos registros.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
