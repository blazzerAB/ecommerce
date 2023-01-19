<?php

namespace App\Http\Livewire;

use App\Models\Canal;
use App\Models\Usuario as ModelsUsuario;
use CreateCanalsTable;
use Livewire\Component;

class Usuario extends Component
{
    public $usuario = [], $sameName = false, $canal = [];

    public function saveUser()
    {
        $user = ModelsUsuario::create($this->usuario);
        $this->canal['usuario_id'] = $user->id;
        $this->canal['usuario'] = '@'.$this->canal['usuario'];

        $canal = Canal::create($this->canal);
    }

    public function sameName()
    {
        if ($this->sameName && isset($this->usuario['nombre'])) {
            $this->canal['nombre'] = $this->usuario['nombre'];
        }
        else{
            $this->canal['nombre'] = null;
        }
    }

    public function render()
    {
        return view('livewire.usuario');
    }
}
