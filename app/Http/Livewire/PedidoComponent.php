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
    public $p;
    protected $cPedidos,$lPedidos;
    public $busqueda, $busquedaArt;
    public $accion='store';
    public $importe=0.00;
    public $isJefe=false;
    public $grupo;

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
        $this->isJefe=Auth::user()->is_jefe;
        $this->grupo=Auth::user()->grupo;

        $this->verUltCPedido();

        if(!empty($this->cPedidos)){
            $this->verLPedidos();
            if(!isset($this->lPedidos) || $this->lPedidos==null){
                $cPedi=Pedido::find($this->idCabPed);
                $cPedi->delete();
                $this->verUltCPedido();
                if(!empty($this->cPedidos)){
                    $this->verLPedidos();
                }else{
                    $this->nuevoPedido();
                }                
            }
        }else{
            $this->nuevoPedido();
        }
        if(Auth::user()->is_admin){
            $arts=ArticuloUser::Where('descripcion','LIKE',"%{$this->busquedaArt}%")
            ->paginate($this->itemsArtsPagina);
        }else{
            if(Auth::user()->is_jefe){
                $arts=ArticuloUser::where('user_id',$this->idUser)
                ->Where('descripcion','LIKE',"%{$this->busquedaArt}%")
                ->paginate($this->itemsArtsPagina);
            }
            if(isset($this->grupo) && $this->grupo!=null){
                $arts=ArticuloUser::where('user_id',$this->grupo)
                ->Where('descripcion','LIKE',"%{$this->busquedaArt}%")
                ->paginate($this->itemsArtsPagina);
            }
        }
        
        $lPeds=$this->lPedidos;
        $cPeds=$this->cPedidos;
        $isJ=$this->isJefe;
        $this->totalizar();
        return view('livewire.pedido-component',compact('isJ','lPeds','cPeds','arts'));

    }
    public function nuevoPedido()
    {
        Pedido::create(['user_id'=>$this->idUser,]);
        
        $this->verUltCPedido();
    }
    public function verUltCPedido()
    {
        $this->cPedidos=Pedido::orderBy('id','desc')
        ->where('user_id',$this->idUser)
        ->Where('estado',1)
        ->first();
    }
    public function verLPedidos()
    {
        $this->idCabPed=$this->cPedidos->id;

        $this->lPedidos=LPedido::orderBy('id','desc')
        ->Where('pedido_id',$this->idCabPed)
        ->Where('descripcion','LIKE',"%{$this->busqueda}%")
        ->paginate($this->itemsPagina);
    }

    public function store1(){$this->verPrecio(1);$this->store();}
    public function store2(){$this->verPrecio(2);$this->store();}
    public function store3(){$this->verPrecio(3);$this->store();}
    public function store4(){$this->verPrecio(4);$this->store();}
    public function store5(){$this->verPrecio(5);$this->store();}
    public function store6(){$this->verPrecio(6);$this->store();}
    public function store()
    {
        $this->validate();
        LPedido::create([
            'pedido_id'=>$this->pedido_id,
            'articuloUser_id'=>$this->articuloUser_id,
            'codigo'=>$this->codigo,
            'descripcion'=>$this->descripcion,
            'cantidad'=>$this->cantidad,
            'precio'=>$this->precio
        ]);
        $this->totalizar();
        $this->reset(['isJefe','codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);
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
        $this->reset(['isJefe','codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);

        return redirect('Pedidos');
    }
    public function verPrecio($p){
        $art=ArticuloUser::find($this->articuloUser_id);
        $this->precio=$art->precio1;$this->cantidad=$art->tramo1;
        if($p==2){$this->precio=$art->precio2;$this->cantidad=$art->tramo2;}
        if($p==3){$this->precio=$art->precio3;$this->cantidad=$art->tramo3;}
        if($p==4){$this->precio=$art->precio4;$this->cantidad=$art->tramo4;}
        if($p==5){$this->precio=$art->precio5;$this->cantidad=$art->tramo5;}
        if($p==6){$this->precio=$art->precio6;$this->cantidad=$art->tramo6;}

    }
    public function putEstadoTerminado()
    {
        $Ped=Pedido::find($this->idCabPed);

        $Ped->update(['estado'=>2]);

        $artsPedi=LPedido::where('pedido_id',$this->idCabPed)->get();


//        $this->totalizar();
        Mail::to('pedidos@laesperanzaimpresores.com')->send(new correo($this->idCabPed,$artsPedi));
//        Mail::to('domingors@gmail.com')->send(new correo($this->idCabPed,$artsPedi));
        $this->reset(['isJefe','codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);

        return redirect('Pedidos');
    }

    public function destroy($id)
    {
        $lPedi=LPedido::find($id);

        $lPedi->delete();
        $this->totalizar();
        $this->reset(['isJefe','codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);

        return redirect('Pedidos');
    }
    public function removeEdit(){
        $this->totalizar();
        $this->reset(['isJefe','codigo', 'descripcion', 'cantidad', 'precio', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articuloUser_id','lPedido_id','pedido_id','idUser','accion']);
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
