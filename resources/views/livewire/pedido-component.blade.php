
<div>

    <div class="py-12  flex items-center justify-between ">
        <div class="max-w-8xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
                <div class="bg-white-500 rounded-lb shadow hoverflow-hiden p-4">
                    @if($precio1>0)
                        <div class="mb-3" style="display:none">
                            <label for="" class="form-label">Id</label>
                            <input wire:model='lPedido_id' type="text" id="id" name='id' class="form-label" tabindex="1">
                            @error('id')<p>{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3" style="display:none">
                            <label for="" class="form-label">Pedido_id</label>
                            <label wire:model='pedido_id' id="pedido_id" name='pedido_id' class="form-label">{{ $pedido_id }}</label>
                            @error('pedido_id')<p class="text-xs text-red-500 italic">{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3" style="display:none">
                            <label for="" class="form-label">ArticuloUser_id</label>
                            <label wire:model='articuloUser_id' id="articuloUser_id" name='articuloUser_id' class="form-label">{{ $articuloUser_id }}</label>
                            @error('articuloUser_id')<p>{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3" style="display:none">
                            <label for="" class="form-label">Código</label>
                            <label wire:model='codigo' id="codigo" name='codigo' class="form-label">{{ $codigo }}</label>
                            @error('codigo')<p>{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3">
                            <label id="descripcion" type="text" class="bg-green-100" style="width: 1340px;">{{$descripcion}}</label>
                            @error('descripcion')<p>{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3" style="display:none">
                            <label for="" class="form-label">Cantidad</label>
                            <input wire:model='cantidad' type="number" id="cantidad"  class="form-control" tabindex="6">
                            @error('cantidad')<p>{{ $message }}</p>@enderror
                        </div>
                        <div class="mb-3" style="display:none">
                            <label for="" class="form-label">Precio</label>
                            <label wire:model='precio' id="precio"  step="any" value="0.00" class="form-label">{{ $precio }}</label>
                            @error('precio')<p>{{ $message }}</p>@enderror
                        </div>
                        <div class="bg-gray-100 flex p-2  flex items-center justify-between">
                            <div class="align=left">
                                <label for="" class="form-label">Cantidad:  </label>
                                <button wire:click='store1' title="precio: {{$precio1}}" type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">{{$tramo1}}</button>
                                @if($precio1!=$precio2)
                                    <button wire:click='store2' title="precio: {{$precio2}}" type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">{{$tramo2}}</button>
                                        @if($precio2!=$precio3)
                                            <button wire:click='store3' title="precio: {{$precio3}}" type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">{{$tramo3}}</button>
                                            @if($precio3!=$precio4)
                                                <button wire:click='store4' title="precio: {{$precio4}}" type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">{{$tramo4}}</button>
                                            @if($precio4!=$precio5)
                                                <button wire:click='store5' title="precio: {{$precio5}}" type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">{{$tramo5}}</button>
                                                @if($precio5!=$precio6)
                                                    <button wire:click='store6' title="precio: {{$precio6}}" type="submmit" class="border-gray-200 bg-blue-300 hover:gb-blue-500 rounded" tabindex="8">{{$tramo6}}</button>
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                                <label for="" class="form-label">  </label>
                            </div>
                            <div class="align=right">
                                <button wire:click='removeEdit' type="submmit" class="border-gray-200 bg-red-100 hover:gb-red-300 rounded" tabindex="8">Cancelar</button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="bg-white-500 rounded-lb shadow overflow-hiden p-4">
                    @if($lPeds != null)
                        @if ($isJ)
                            <div class="flex flex-col p-2 mx-10">
                                <button wire:click='putEstadoTerminado' type="submmit" class="aling-center border-gray-400 bg-red-300 hover:gb-red-500 rounded" tabindex="10">Marcar como terminado</button>
                            </div>
                        @endif
                        <div class="flex flex-col p-2 mx-10">
                            <label id="nºpedido"  class="form-label">Pedido nº {{ $idCabPed }}</label>
                        </div>
                        <div class="flex flex-col p-2 mx-10">
                            <label id="importe"  class="form-label">Importe {{ $importe }}</label>
                        </div>
                    @endif
                </div>
                <div class="bg-white-500 rounded-lb shadow overflow-hiden p-4">
                    <div class="flex flex-col p-2 mx-10">
                        <form class="form-horizontal" method="POST" action="{{ route('upPdf') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('pdf') ? ' has-error' : '' }}">
                                <div class="mb-2 flex">
                                    <div class="mb-3" style="display:none">
                                        <input id="idx" name="idx" value="{{$idCabPed}}"></label>
                                    </div>
                                    @if($hasAdj)
                                        @livewire('live-php-modal',['idP'=>$idCabPed])
                                        <!--<a href="#" type="button" wire:click="verAdjunto({{ $idCabPed }})" class="bg-blue-100 hover:gb-blue-300 rounded">Ver adjunto</a>-->
                                        <a href="#" type="button" wire:click="delAdjunto({{ $idCabPed }})" class="bg-red-100 hover:gb-red-300 rounded">Borrar adjunto</a>
                                    @else
                                        <input id="pdf" type="file" class="form-control" name="pdf" accept=".pdf" value="{{ old('pdf') }}" required>
                                        @if ($errors->has('pdf'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pdf') }}</strong>
                                            </span>
                                        @endif
                                        <button type="submit" class="border-gray-200 bg-red-300 hover:gb-red-500 rounded">Subir pdf</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div >
        <div class="bg-gray-50 px-4 py-3 flex justify-between border border-gray-200">
            <div class="bg-white px-4 py-3 border border-gray-200">
                <h2 align="center"><big>Artículos que puede pedir</big></h2>
                <div class="bg-white py-2">
                    <input wire:model='busquedaArt' type="text" class="form-input rounded-md shadow-md mt-1 block w-full" placeholder="buscar..."/>
                </div>
                <table class="min-w-full divide-y divide-gray-200" id="articulosUser">
                    <thead class="bg-blue-50 border-b">
                        <tr>
                            <th style="width:800px">Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if($arts != null)
                            @foreach ($arts as $art)
                                <tr>
                                    <td title='Precios: [{{ $art->precio1 }}-{{ $art->precio2 }}-{{ $art->precio3 }}-{{ $art->precio4 }}-{{ $art->precio5 }}-{{ $art->precio6 }}]    Tramos: [{{ $art->tramo1 }}-{{ $art->tramo2 }}-{{ $art->tramo3 }}-{{ $art->tramo4 }}-{{ $art->tramo5 }}-{{ $art->tramo6 }}]' style="width:800px">{{ $art->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="#" type="button" wire:click="editArt({{ $art }})" class="bg-blue-300 hover:gb-blue-500 rounded">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-4 py-3 border border-gray-200">
                <h2 align="center"><big>Artículos del pedido actual</big></h2>
                <div class="bg-white py-2">
                    <input wire:model='busqueda' type="text" class="form-input rounded-md shadow-md mt-1 block w-full" placeholder="buscar..."/>
                </div>
                <table class="min-w-full divide-y divide-gray-200" id="articulosPedido">
                    <thead class="bg-green-50 border-b">
                        <tr>
                            <th style="width:800px">Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if($lPeds != null)
                            @foreach ($lPeds as $lped)
                                <tr>
                                    <td style="width:800px">{{ $lped->descripcion }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lped->cantidad }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $lped->precio }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="#" type="button" wire:click='destroy({{ $lped->id }})' class="bg-red-300 hover:gb-red-700 rounded">Borrar</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
