<?php

namespace App\Http\Livewire;

use App\Mail\correo;
use App\Models\LPedido;
use App\Models\Pedido;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GestionPedidosComponent extends Component
{
    public $idUser;
    public $is_admin;
    public $idCabPed;
    public $estado=2;
    public $itemsPagina=0;
    protected $usuarios, $cPedidos, $estados;
    public $nLPeds;
    public $isJefe=false;
    public $users;
    public $hasAdj=array();

    public function render()
    {
        if($this->idUser==null)
        $this->idUser=Auth::user()->id;

        $this->is_admin=Auth::user()->is_admin;
        $this->isJefe=Auth::user()->is_jefe;

        $this->usuarios=User::all();

        $this->reloadPeds();
        $isAdmin=$this->is_admin;
        $isJ=$this->isJefe;
        $users=$this->usuarios;
        $estads=$this->estados;
        $cPeds=$this->cPedidos;
        $idU=$this->idUser;
        $this->tieneAdjunto();

        return view('livewire.gestion-pedidos-component',compact('idU','isAdmin','isJ','users','estads','cPeds'));
    }
    public function updatedIdUser()
    {
        $this->reloadPeds();
        $isAdmin=$this->is_admin;
        $isJ=$this->isJefe;
        $users=$this->usuarios;
        $estads=$this->estados;
        $cPeds=$this->cPedidos;

        return view('livewire.gestion-pedidos-component',compact('isAdmin','isJ','users','estads','cPeds'));
    }
    public function updatedEstado()
    {
        $this->reloadPeds();
        $isAdmin=$this->is_admin;
        $isJ=$this->isJefe;
        $users=$this->usuarios;
        $estads=$this->estados;
        $cPeds=$this->cPedidos;

        return view('livewire.gestion-pedidos-component',compact('isAdmin','isJ','users','estads','cPeds'));
    }
    public function reloadPeds(){
        $this->estados=[[1,'Incompleto'],[2,'Terminado'],[3,'Entregado']];

        if($this->is_admin){
            $this->cPedidos=Pedido::orderBy('id','desc')
            ->Where('estado',$this->estado)
            ->orderBy('id','desc')
            ->paginate();
        }else{
            if($this->isJefe){
                $this->users=User::where('grupo',$this->idUser)
                ->orwhere('id',$this->idUser)
                ->select('id')->pluck('id');

                $this->cPedidos=Pedido::whereIn('user_id',$this->users)
                ->Where('estado',$this->estado)
                ->orderBy('id','desc')
                ->paginate();
            }else{
                $this->users=User::where('id',$this->idUser)
                ->select('id')->pluck('id');

                $this->cPedidos=Pedido::whereIn('user_id',$this->users)
                ->Where('estado',$this->estado)
                ->orderBy('id','desc')
                ->paginate();
            }
        }
        $i=0;
        $this->nUser=collect([]);
        for ($i=0;$i<count($this->cPedidos);$i++){
            if(!$this->tieneLineas(($this->cPedidos)[$i]->id)){
                unset(($this->cPedidos)[$i]);
            }
        }

        if(!empty(($this->cPedidos)[0])){
            if($this->idCabPed==null)
            $this->idCabPed=($this->cPedidos)[0]->id;
        }

    }
    public function tieneLineas($id){
        $this->nLPeds= count(LPedido::where('id',$id)->get());
        return $this->nLPeds>0;
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

    public function tieneAdjunto(){
        $this->hasAdj=array();
        foreach ($this->cPedidos as $cP){
            if(Storage::disk('mis_pdfs')->exists($cP->id.'.pdf')){
                $this->hasAdj[$cP->id]=true;
            }else{
                $this->hasAdj[$cP->id]=false;
            }
        }
    }
    
    public function delAdjunto($id){
        Storage::disk('mis_pdfs')->delete($id.'.pdf');
        return redirect('GestionPedidos');
    }

    public function makePdf($id)
    {
    }
    public function destroy($id)
    {
        $Pedi=Pedido::find($id);

        $Pedi->delete();
        Storage::delete($id.'.pdf');
        return redirect('GestionPedidos');
    }
}
