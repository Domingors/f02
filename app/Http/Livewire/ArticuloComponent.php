<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use App\Models\ArticuloUser;
use Illuminate\Http\Request;
use App\Models\LPedido;
use App\Models\Pedido;
use Livewire\Component;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth;

class ArticuloComponent extends Component
{
    public $idArt;
    public $itemsArtsPagina=100;
    public $codigo, $descripcion, $cantidad, $precio1, $precio2, $precio3, $precio4, $precio5, $precio6, $tramo1, $tramo2, $tramo3, $tramo4, $tramo5, $tramo6;
    public $busquedaArt;
    public $accion='store';

    protected $rules=[
        'codigo'=>'required | max:10',
        'descripcion'=>'required | max:250',
        'precio1'=>'required',
        'precio2'=>'required',
        'precio3'=>'required',
        'precio4'=>'required',
        'precio5'=>'required',
        'precio6'=>'required',
        'tramo1'=>'required',
        'tramo2'=>'required',
        'tramo3'=>'required',
        'tramo4'=>'required',
        'tramo5'=>'required',
        'tramo6'=>'required',
    ];

    protected $messages=[
        'codigo.required'=>'el codigo es obligatorio',
        'codigo.max'=>'el codigo no puede tener mas de 10 caracteres',
        'descripcion.required'=>'la descripcion es obligatoria',
        'descripcion.max'=>'la descripcion no puede tener mas de 250 caracteres',
        'precio.required'=>'el precio es obligatorio',
    ];

    public function render()
    {
        //$this->idUser=Auth::user()->id;

        $arts=Articulo::Where('descripcion','LIKE',"%{$this->busquedaArt}%")
        ->paginate($this->itemsArtsPagina);
        return view('livewire.articulo-component',compact('arts'));

    }
    public function store()
    {
        $this->validate();
        $as=Articulo::where('codigo',$this->codigo)
        ->orWhere('descripcion',$this->descripcion)
        ->get();
        if(!empty($as)){
            Articulo::create([
                'codigo'=>$this->codigo,
                'descripcion'=>$this->descripcion,
                'precio1'=>$this->precio1,
                'precio2'=>$this->precio2,
                'precio3'=>$this->precio3,
                'precio4'=>$this->precio4,
                'precio5'=>$this->precio5,
                'precio6'=>$this->precio6,
                'tramo1'=>$this->tramo1,
                'tramo2'=>$this->tramo2,
                'tramo3'=>$this->tramo3,
                'tramo4'=>$this->tramo4,
                'tramo5'=>$this->tramo5,
                'tramo6'=>$this->tramo6
            ]);
            $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'idArt','accion']);
            return redirect('Articulos');
        }
    }

    public function edit(Articulo $art)
    {
        $this->idArt=$art->id;
        $this->codigo=$art->codigo;
        $this->descripcion=$art->descripcion;
        $this->cantidad=$art->cantidad;
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

        $this->accion='update';
        
    }

    public function update()
    {
        $this->validate();

        $art=Articulo::find($this->idArt);

        $art->update([
            'codigo'=>$this->codigo,
            'descripcion'=>$this->descripcion,
            'cantidad'=>$this->cantidad,
            'precio1'=>$this->precio1,
            'precio2'=>$this->precio2,
            'precio3'=>$this->precio3,
            'precio4'=>$this->precio4,
            'precio5'=>$this->precio5,
            'precio6'=>$this->precio6,
            'tramo1'=>$this->tramo1,
            'tramo2'=>$this->tramo2,
            'tramo3'=>$this->tramo3,
            'tramo4'=>$this->tramo4,
            'tramo5'=>$this->tramo5,
            'tramo6'=>$this->tramo6
    ]);

    $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'idArt','accion']);


        return redirect('Articulos');
    }

    public function destroy($id)
    {
        $art=Articulo::find($id);

        $art->delete();
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'idArt','accion']);

        return redirect('Articulos');
    }
    public function removeEdit(){
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'idArt','accion']);
    }

}
