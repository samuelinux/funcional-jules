<?php

namespace App\Livewire\Usuario;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.app')]
#[Title('Minha Carteira Funcional')]
class Funcional extends Component
{
    use WithFileUploads;

    public $arquivo;
    public $caminhoArquivo;

    public function mount()
    {
        $this->caminhoArquivo = auth()->user()->caminho_funcional;
    }

    public function save()
    {
        $this->validate([
            'arquivo' => 'required|mimes:pdf|max:2048', // 2MB Max
        ]);

        $path = $this->arquivo->storeAs(
            'documentos',
            auth()->id() . '_' . time() . '.pdf',
            'local'
        );

        $user = auth()->user();
        
        if ($user->caminho_funcional && Storage::disk('local')->exists($user->caminho_funcional)) {
            Storage::disk('local')->delete($user->caminho_funcional);
        }

        $user->caminho_funcional = $path;
        $user->save();
        
        $this->caminhoArquivo = $path;
        $this->dispatch('swal', title: 'Sucesso', text: 'Documento enviado com sucesso!', icon: 'success');
    }

    public function render()
    {
        return view('livewire.usuario.funcional');
    }
}
