<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
#[Title('Gerenciar Usuários')]
class Usuarios extends Component
{
    use WithPagination;

    public $search = '';
    
    public $showModal = false;
    public $userId;
    public $name;
    public $email;
    public $cpf;
    public $perfil = 'usuario';
    public $password;

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'cpf' => 'nullable|unique:users,cpf,' . $this->userId,
            'perfil' => 'required|in:admin,usuario',
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
        ];
    }

    public function create()
    {
        $this->resetInput();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->cpf = $user->cpf;
        $this->perfil = $user->perfil;
        $this->password = '';
        $this->showModal = true;
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'cpf' => $this->cpf,
                'perfil' => $this->perfil,
            ];
            if ($this->password) {
                $data['password'] = bcrypt($this->password);
            }
            $user->update($data);
            $this->dispatch('swal', title: 'Sucesso', text: 'Usuário atualizado com sucesso!', icon: 'success');
        } else {
            $validatedData['password'] = bcrypt($this->password);
            User::create($validatedData);
            $this->dispatch('swal', title: 'Sucesso', text: 'Usuário criado com sucesso!', icon: 'success');
        }

        $this->showModal = false;
        $this->resetInput();
    }
    
    public function delete($id)
    {
        if ($id == auth()->id()) {
            $this->dispatch('swal', title: 'Erro', text: 'Você não pode excluir a si mesmo.', icon: 'error');
            return;
        }

        User::find($id)->delete();
        $this->dispatch('swal', title: 'Sucesso', text: 'Usuário excluído com sucesso!', icon: 'success');
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    private function resetInput()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->cpf = '';
        $this->perfil = 'usuario';
        $this->password = '';
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.usuarios', [
            'usuarios' => User::where('name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('cpf', 'like', '%'.$this->search.'%')
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }
}
