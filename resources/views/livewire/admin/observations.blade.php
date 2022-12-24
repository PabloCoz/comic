<div>
    <button wire:click="$set('open', true)" class="text-white bg-red-600 p-2 font-bold rounded-full">Generar
        observación</button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Observación" />
                <textarea wire:model="body" class="w-full rounded-lg"  cols="3"></textarea>
                <x-jet-input-error for="observation" />
            </div>
            <div class="flex justify-end mt-4">
                <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save"
                    class="disabled:opacity-25 bg-red-600">
                    Enviar y rechazar publicación
                </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>
