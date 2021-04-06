<div>
    <div class="py-1  flex items-center justify-between ">
        <div class="max-w-8xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
                <div class="bg-white-500 rounded-lb shadow hoverflow-hiden p-4">
                    <div class='flex p-2  flex items-center justify-between  flex p-2  flex items-center justify-between bg-red-100'>
                        <div class="mb-5 form-group">
                            <h2 class='px-20'>Usuarios</h2>
                            <select wire:model="idUser" class="form-control" name="idUser" required >
                                @foreach($users as $user)
                                    <option  value="{{$user->id}}"> {{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <a href="artUserPdf/{{ $idUser }}" class="align=right bg-blue-300 hover:gb-blue-500 rounded">Generar pdf</a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descripcion</label>
                        <input wire:model='descripcion' id="descripcion" type="text" class="form-control flex" style="width: 1600px;"/>
                        @error('descripcion')<p>{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Precio1</label>
                        <input wire:model='precio1' id="precio1"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('precio1')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Precio2</label>
                        <input wire:model='precio2' id="precio2"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('precio2')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Precio3</label>
                        <input wire:model='precio3' id="precio3"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('precio3')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Precio4</label>
                        <input wire:model='precio4' id="precio4"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('precio4')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Precio5</label>
                        <input wire:model='precio5' id="precio5"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('precio5')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Precio6</label>
                        <input wire:model='precio6' id="precio6"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('precio6')<p>{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tramo1</label>
                        <input wire:model='tramo1' id="tramo1"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('tramo1')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Tramo2</label>
                        <input wire:model='tramo2' id="tramo2"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('tramo2')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Tramo3</label>
                        <input wire:model='tramo3' id="tramo3"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('tramo3')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Tramo4</label>
                        <input wire:model='tramo4' id="tramo4"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('tramo4')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Tramo5</label>
                        <input wire:model='tramo5' id="tramo5"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('tramo5')<p>{{ $message }}</p>@enderror
                        <label for="" class="form-label">Tramo6</label>
                        <input wire:model='tramo6' id="tramo6"  type="number" step="any" value="0.00" class="form-control"/>
                        @error('tramo6')<p>{{ $message }}</p>@enderror
                    </div>
                    <div class="bg-gray-100 flex p-2  flex items-center justify-between">
                        <div class="align=left">
                            <button wire:click='removeEdit' type="submmit" class="border-gray-200 bg-red-100 hover:gb-red-300 rounded" tabindex="8">Cancelar</button>
                        </div>
                        <div class="align=right">
                            @if($accion=='store')
                                <button wire:click='store' type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">Guardar</button>
                            @else
                                <button wire:click='update' type="submmit" class="border-gray-200 bg-green-300 hover:gb-green-500 rounded" tabindex="9">Actualizar</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div >
        <div class="bg-gray-50 px-4 py-3 flex  border border-gray-200">
            <div class="bg-white px-4 py-3 border border-gray-200">
                <h2 align="center"><big>Artículos generales</big></h2>
                <div class="bg-white py-2">
                    <input wire:model='busquedaArt' type="text" class="form-input rounded-md shadow-md mt-1 block w-full" placeholder="buscar..."/>
                </div>
                <table class="min-w-full divide-y divide-gray-200" id="articulos">
                    <thead class="bg-blue-50 border-b">
                        <tr>
                            <th>Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if($arts != null)
                            @foreach ($arts as $art)
                                <tr>
                                    <td title='Precios: [{{ $art->precio1 }}-{{ $art->precio2 }}-{{ $art->precio3 }}-{{ $art->precio4 }}-{{ $art->precio5 }}-{{ $art->precio6 }}]    Tramos: [{{ $art->tramo1 }}-{{ $art->tramo2 }}-{{ $art->tramo3 }}-{{ $art->tramo4 }}-{{ $art->tramo5 }}-{{ $art->tramo6 }}]'>{{ $art->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="#" type="button" wire:click="editArt({{ $art }})" class="bg-blue-300 hover:gb-blue-500 rounded">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $arts->links() }}
            </div>
            <div class="bg-white px-4 py-3 border border-gray-200">
                <h2 align="center"><big>Artículos del Usuario actual</big></h2>
                <div class="bg-white py-2">
                    <input wire:model='busquedaArtUser' type="text" class="form-input rounded-md shadow-md mt-1 block w-full" placeholder="buscar..."/>
                </div>
                <table class="min-w-full divide-y divide-gray-200" id="articulosUser">
                    <thead class="bg-green-50 border-b">
                        <tr>
                        <th>Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if($artsUser != null)
                            @foreach ($artsUser as $artUser)
                                <tr>
                                    <td title='Precios: [{{ $artUser->precio1 }}-{{ $artUser->precio2 }}-{{ $artUser->precio3 }}-{{ $artUser->precio4 }}-{{ $artUser->precio5 }}-{{ $artUser->precio6 }}]    Tramos: [{{ $artUser->tramo1 }}-{{ $artUser->tramo2 }}-{{ $artUser->tramo3 }}-{{ $artUser->tramo4 }}-{{ $artUser->tramo5 }}-{{ $artUser->tramo6 }}]'>{{ $artUser->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="#" type="button" wire:click="editArtUser({{ $artUser }})" class="bg-green-300 hover:gb-green-700 rounded">Editar</a>
                                        <a href="#" type="button" wire:click='destroy({{ $artUser->id }})' class="bg-red-300 hover:gb-red-700 rounded">Borrar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $artsUser->links() }}
            </div>
        </div>
    </div>
</div>
