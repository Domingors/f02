<div>
  <x-jet-secondary-button class="bg-green-200" wire:click="$set('open',true)">
    verAdjunto
  </x-jet-secondary-button>


  <x-jet-dialog-modal wire:model='open'>
    <x-slot name='title'>
    </x-slot>
    <x-slot name='content'>
      {{asset($path)}}
      <embed src="{{asset($path)}}" type="application/pdf" width="100%" height="600px" />    
    </x-slot>
    <x-slot name='footer'>
      <x-jet-secondary-button wire:click="$set('open',false)">
        Cerrar
      </x-jet-secondary-button>
        </x-slot>
  </x-jet-dialog-modal>
</div>
