<?php

namespace App\Http\Livewire;

use App\Models\ArticuloUser;
use Illuminate\Http\Request;
use App\Models\LPedido;
use App\Models\Pedido;
use Livewire\Component;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\correo;

class PedidoComponent extends Component
{
    public $pedido_id;
    public $itemsPagina=100,$itemsArtsPagina=100;
    public $codigo, $descripcion, $cantidad, $precio, $articuloUser_id,$lPedido_id;
    public $precio1, $precio2, $precio3, $precio4, $precio5, $precio6, $tramo1, $tramo2, $tramo3, $tramo4, $tramo5, $tramo6;
    public $idUser, $idCabPed;
    protected $cPedidos,$lPedidos;
    public $busqueda, $busquedaArt;
    public $accion='store';
    public $importe=0.00;

    protected $rules=[
        'pedido_id'=>'required',
        'articuloUser_id'=>'required',
        'codigo'=>'required | max:10',
        'descripcion'=>'required | max:250',
        'cantidad'=>'required',
    ];

    protected $messages=[
        'pedido_id.required'=>'el identificador de pedido es obligatorio',
        'articuloUser_id.required'=>'el identificador del artículo del usuario es obligatorio',
        'codigo.required'=>'el codigo es obligatorio',
        'codigo.max'=>'el codigo no puede tener mas de 10 caracteres',
        'descripcion.required'=>'la descripcion es obligatoria',
        'descripcion.max'=>'la descripcion no puede tener mas de 250 caracteres',
        'cantidad.required'=>'la cantidad es obligatoria',
    ];

    public function render()
    {
        $this->idUser=Auth::user()->id;

        $this->cPedidos=Pedido::orderBy('id','desc')
        ->where('user_id',$this->idUser)
        ->Where('estado',1)
        ->first();


        if(!empty($this->cPedidos)){
            $this->idCabPed=$this->cPedidos->id;

            $this->lPedidos=LPedido::orderBy('id','desc')
            ->Where('pedido_id',$this->idCabPed)
            ->Where('descripcion','LIKE',"%{$this->busqueda}%")
            ->paginate($this->itemsPagina);

//            $arts=ArticuloUser::where('user_id',$this->idUser)
//            ->Where('descripcion','LIKE',"%{$this->busquedaArt}%")
//            ->paginate($this->itemsArtsPagina);
//            $lPeds=$this->lPedidos;
//            $cPeds=$this->cPedidos;
//            $this->totalizar();
//            return view('livewire.pedido-component',compact('lPeds','cPeds','arts'));
        }else{
            Pedido::create([
                'user_id'=>$this->idUser,
            ]);
            $this->nuevoPedido();
//            if(empty($this->cPedidos)){
//                $arts=ArticuloUser::where('user_id',$this->idUser)->paginate($this->itemsArtsPagina);
//                $lPeds=$this->lPedidos;
//                $cPeds=$this->cPedidos;
//                $this->totalizar();
//                return view('livewire.pedido-component',compact('lPeds','cPeds','arts'));
//            }    
        }
        $arts=ArticuloUser::where('user_id',$this->idUser)
        ->Where('descripcion','LIKE',"%{$this->busquedaArt}%")
        ->paginate($this->itemsArtsPagina);
        
        $lPeds=$this->lPedidos;
        $cPeds=$this->cPedidos;
        $this->totalizar();
        return view('livewire.pedido-component',compact('lPeds','cPeds','arts'));

    }
    public function nuevoPedido(){
        $this->cPedidos=Pedido::orderBy('id','desc')
        ->where('user_id',$this->idUser)
        ->Where('estado',1)
        ->first();


        if(!empty($cPedidos)){
            $this->idCabPed=$this->cPedidos->id;

            $this->lPedidos=LPedido::orderBy('id','desc')
            ->Where('pedido_id',$this->idCabPed)
            ->Where('descripcion','LIKE',"%{$this->busqueda}%")
            ->paginate($this->itemsPagina);
        }

    }
    public function store()
    {
        $this->validate();
        $this->verPrecio($this->cantidad);
        LPedido::create([
            'pedido_id'=>$this->pedido_id,
            'articuloUser_id'=>$this->articuloUser_id,
            'codigo'=>$this->codigo,
            'descripcion'=>$this->descripcion,
            'cantidad'=>$this->cantidad,
            'precio'=>$this->precio
        ]);
        $this->totalizar();
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);
        return redirect('Pedidos');
    }

    public function edit(LPedido $lPedi)
    {
        $this->lPedido_id=$lPedi->id;
        $this->pedido_id=$lPedi->pedido_id;
        $this->articuloUser_id=$lPedi->articuloUser_id;
        $this->codigo=$lPedi->codigo;
        $this->descripcion=$lPedi->descripcion;
        $this->cantidad=$lPedi->cantidad;
        $this->precio=$lPedi->precio;

        $this->accion='update';
        
    }
    public function editArt(ArticuloUser $art)
    {
        $this->pedido_id=$this->idCabPed;
        $this->articuloUser_id=$art->id;
        $this->codigo=$art->codigo;
        $this->descripcion=$art->descripcion;
        $this->precio=$art->precio;
        $this->precio1=$art->precio1;
        $this->precio2=$art->precio2;
        $this->precio3=$art->precio3;
        $this->precio4=$art->precio4;
        $this->precio5=$art->precio5;
        $this->precio6=$art->precio6;
        $this->tramo1=$art->tramo1;
        $this->tramo2=$art->tramo2;
        $this->tramo3=$art->tramo3;
        $this->tramo4=$art->tramo4;
        $this->tramo5=$art->tramo5;
        $this->tramo6=$art->tramo6;

        $this->accion='store';
        
    }

    public function update()
    {
        $this->validate();

        $lPedi=LPedido::find($this->lPedido_id);

        $this->verPrecio($this->cantidad);
        
        $lPedi->update([
            'pedido_id'=>$this->pedido_id,
            'articuloUser_id'=>$this->articuloUser_id,
            'codigo'=>$this->codigo,
            'descripcion'=>$this->descripcion,
            'cantidad'=>$this->cantidad,
            'precio'=>$this->precio
        ]);

        $this->totalizar();
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);

        return redirect('Pedidos');
    }
    public function verPrecio(int $num){
        $art=ArticuloUser::find($this->articuloUser_id);
        $this->precio=$art->precio1;
        if($num>$art->tramo1)$this->precio=$art->precio2;
        if($num>$art->tramo2)$this->precio=$art->precio3;
        if($num>$art->tramo3)$this->precio=$art->precio4;
        if($num>$art->tramo4)$this->precio=$art->precio5;
        if($num>$art->tramo5)$this->precio=$art->precio6;
        if($num>$art->tramo6)$this->precio=$art->precio6;

    }
    public function putEstadoTerminado()
    {
        /*
        $Ped=Pedido::where('id',$this->idCabPed)->first();
        if($Ped!=null && !empty($Ped)){
            $Ped->estado=2;
            $Ped->save();
        }
*/
        $Ped=Pedido::find($this->idCabPed);

        $Ped->update([
            'estado'=>2
        ]);

//        $this->totalizar();
        Mail::to('domingors@gmail.com')->send(new correo($this->idCabPed));
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);

//        $this->render();

        return redirect('Pedidos');
    }

    public function destroy($id)
    {
        $lPedi=LPedido::find($id);

        $lPedi->delete();
        $this->totalizar();
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);

        return redirect('Pedidos');
    }
    public function removeEdit(){
        $this->totalizar();
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);
    }
    public function totalizar(){
        $this->idUser=Auth::user()->id;

        $cabeceras=Pedido::orderBy('id','desc')
        ->where('user_id',$this->idUser)
        ->Where('estado',1)
        ->get();

        $id=$cabeceras[0]->id;

        $lineas=LPedido::orderBy('id','desc')
        ->Where('pedido_id',$id)
        ->get();

        $total=0.00;
        foreach ($lineas as $l) {
            $total+=($l->cantidad)*($l->precio);
        }
        $this->importe=$total;
    }

}
