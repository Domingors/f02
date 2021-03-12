<?php

namespace App\Http\Livewire;

use App\Mail\correo;
use App\Models\LPedido;
use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestionPedidosComponent extends Component
{
    public $idUser;
    public $is_admin;
    public $idCabPed;
    public $estado=2;
    public $itemsPagina=0;
    protected $usuarios, $cPedidos, $estados;
    public $nLPeds;

    public function render()
    {
        if($this->idUser==null)
        $this->idUser=Auth::user()->id;
        $this->is_admin=Auth::user()->is_admin;

        $this->usuarios=User::all();

        $this->reloadPeds();
        $isAdmin=$this->is_admin;
        $users=$this->usuarios;
        $estads=$this->estados;
        $cPeds=$this->cPedidos;

        return view('livewire.gestion-pedidos-component',compact('isAdmin','users','estads','cPeds'));
    }
    public function updatedIdUser()
    {
        $this->reloadPeds();
        $isAdmin=$this->is_admin;
        $users=$this->usuarios;
        $estads=$this->estados;
        $cPeds=$this->cPedidos;

        return view('livewire.gestion-pedidos-component',compact('isAdmin','users','estads','cPeds'));
    }
    public function updatedEstado()
    {
        $this->reloadPeds();
        $isAdmin=$this->is_admin;
        $users=$this->usuarios;
        $estads=$this->estados;
        $cPeds=$this->cPedidos;

        return view('livewire.gestion-pedidos-component',compact('isAdmin','users','estads','cPeds'));
    }
    public function reloadPeds(){
        $this->estados=[[1,'Incompleto'],[2,'Terminado'],[3,'Entregado']];

        $this->cPedidos=DB::table('pedidos')
        ->Join('l_pedidos', 'pedidos.id', '=', 'l_pedidos.pedido_id')
        ->where('pedidos.user_id',$this->idUser)
        ->Where('pedidos.estado',$this->estado)
        ->orderBy('pedidos.id','DESC')
        ->paginate();
/*
        $this->cPedidos=Pedido::orderBy('id','desc')
        ->where('user_id',$this->idUser)
        ->Where('estado',$this->estado)
        ->paginate();
*/
        if(!empty(($this->cPedidos)[0])){
            if($this->idCabPed==null)
            $this->idCabPed=($this->cPedidos)[0]->id;
        }

    }
    public function tieneLineas($id){
        $this->nLPeds= count(LPedido::where('id',$id)->get());
    }

    public function putEstadoEntregado($id)
    {
        $ped=Pedido::find($id);
        $ped->update([
            'estado'=>3
        ]);
        $this->reloadPeds();
//        return redirect('GestionPedidos');
    }
    public function putEstadoTerminado($id)
    {
        $ped=Pedido::find($id);
        $ped->update([
            'estado'=>2
        ]);
        $this->reloadPeds();
//        return redirect('GestionPedidos');
    }
    public function putEstadoIncompleto($id)
    {
        $ped=Pedido::find($id);
        $ped->update([
            'estado'=>1
        ]);
        $this->reloadPeds();
//        return redirect('GestionPedidos');
    }
    public function makePdf($id)
    {
    }
    public function destroy($id)
    {
        $Pedi=Pedido::find($id);

        $Pedi->delete();
        return redirect('GestionPedidos');
    }
}
