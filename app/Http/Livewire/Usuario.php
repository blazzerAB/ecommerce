<?php

namespace App\Http\Livewire;

use App\Models\Canal;
use App\Models\Usuario as ModelsUsuario;
use CreateCanalsTable;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Usuario extends Component
{
    public $usuario = [], $sameName = false, $canal = [], $submit = false, $reserve, $check = false;

    public function saveUser()
    {
        $user = ModelsUsuario::create($this->usuario);
        $this->canal['usuario_id'] = $user->id;
        $this->canal['usuario'] = '@'.$this->canal['usuario'];

        $canal = Canal::create($this->canal);
    }

    public function sameName()
    {
        $this->reserve = $this->canal['nombre'];

        if ($this->sameName && isset($this->usuario['nombre'])) {
            $this->canal['nombre'] = $this->usuario['nombre'];
        }
        elseif($this->reserve){
            $this->reserve;
        }

        $this->updateValidation();
    }


    public function updated(){
        $this->updateValidation();
    }

    public function updateValidation()
    {

    $this->submit = false;

    $validate = [
        'usuario.nombre' => 'required|string',
        'usuario.correo' => 'required|string',
        'canal.usuario' => 'required|string'
    ];

    if (!$this->sameName) {
       $validate['canal.nombre'] = 'required|string';
    }

    $this->validate($validate);

    $this->submit = true;
    }


    public function render()
    {
        return view('livewire.usuario');
    }
}
