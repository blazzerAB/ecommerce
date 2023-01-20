<div class="row p-2 m-0">
    <div class="col-3">
        <div class="card p-2">
            <span class="form-text text-primary">Referencias del usuario.</span>
                <label  class="form-label w-100 mb-3">Nombre
                    <input wire:model='usuario.nombre' type="text" class="form-control">
                </label>

                <label class="form-label mb-3">Correo
                    <input wire:model='usuario.correo' type="text" class="form-control" id="exampleInputPassword1">
                </label>

                    <div id="emailHelp" class="form-text text-primary">Referencias del canal.</div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" wire:model='sameName' wire:change='sameName'>
                    <label class="form-check-label" >El canal tiene el mismo nombre del usuario?</label>
                </div>
                <label class="form-label mb-3">Nombre del canal
                    <input wire:model='canal.nombre' type="text" class="form-control w-100" {{ $sameName ? 'disabled' : '' }}>
                </label>
                <label class="form-label mb-3">Nombre de usuario
                    <input wire:model='canal.usuario' type="text" class="form-control">
                </label>

                <button wire:click='saveUser' class="btn {{ $submit ? 'btn-primary' : 'btn-outline-danger '}}"{{ !$submit ? 'disabled' : '' }}>Crear</button>
        </div>
    </div>
</div>
