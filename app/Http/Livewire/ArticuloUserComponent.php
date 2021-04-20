<?php

namespace App\Http\Livewire;

use App\Models\ArticuloUser;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\User;
use Livewire\Component;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth;

class ArticuloUserComponent extends Component
{
    public $lArtUser_id;
    public $itemsArtsPagina=100,$itemsArtsUserPagina=100;
    public $articulo_id;
    public $codigo, $descripcion, $cantidad, $precio1, $precio2, $precio3, $precio4, $precio5, $precio6, $tramo1, $tramo2, $tramo3, $tramo4, $tramo5, $tramo6;
    protected $lArts,$lArtsUser,$usuarios;
    public $idUser;
    public $busquedaArt, $busquedaArtUser;
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
        'descripcion.required'=>'la descripcion es obligatoria',
        'descripcion.max'=>'la descripcion no puede tener mas de 250 caracteres',
        'precio.required'=>'el precio es obligatorio',
    ];

    public function render()
    {
//        if($this->idUser==null)
//        $this->idUser=Auth::user()->id;

        $this->usuarios=User::where('is_jefe',true)->get();
        if($this->idUser==null)
            $this->idUser=$this->usuarios[0]->id;

        $this->reload();
        $users=$this->usuarios;
        $arts=$this->lArts;
        $artsUser=$this->lArtsUser;
        return view('livewire.articulo-user-component',compact('users','arts','artsUser'));

    }
    public function updatedIdUser()
    {
        $this->reload();
        $users=$this->usuarios;
        $arts=$this->lArts;
        $artsUser=$this->lArtsUser;
        return view('livewire.articulo-user-component',compact('users','arts','artsUser'));
    }
    public function reload(){
        $this->lArts=Articulo::Where('descripcion','LIKE',"%{$this->busquedaArt}%")
        ->paginate($this->itemsArtsPagina);

        $this->lArtsUser=ArticuloUser::where('user_id',$this->idUser)
        ->Where('descripcion','LIKE',"%{$this->busquedaArtUser}%")
        ->paginate($this->itemsArtsUserPagina);

    }
    public function store()
    {
        $this->validate();
        ArticuloUser::create([
            'user_id'=>$this->idUser,
            'articulo_id'=>$this->articulo_id,
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
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articulo_id','lArtUser_id','accion']);
        return redirect('ArticulosUser');
    }

    public function editArtUser(ArticuloUser $lArtUser)
    {
        $this->lArtUser_id=$lArtUser->id;
        $this->idUser=$lArtUser->user_id;
        $this->articulo_id=$lArtUser->articulo_id;
        $this->codigo=$lArtUser->codigo;
        $this->descripcion=$lArtUser->descripcion;
        $this->cantidad=$lArtUser->cantidad;
        $this->precio1=$lArtUser->precio1;
        $this->precio2=$lArtUser->precio2;
        $this->precio3=$lArtUser->precio3;
        $this->precio4=$lArtUser->precio4;
        $this->precio5=$lArtUser->precio5;
        $this->precio6=$lArtUser->precio6;
        $this->tramo1=$lArtUser->tramo1;
        $this->tramo2=$lArtUser->tramo2;
        $this->tramo3=$lArtUser->tramo3;
        $this->tramo4=$lArtUser->tramo4;
        $this->tramo5=$lArtUser->tramo5;
        $this->tramo6=$lArtUser->tramo6;

        $this->accion='update';
        
    }
    public function editArt(Articulo $art)
    {
//        $this->idUser=Auth::user()->id;

//        $this->user_id=$this->idUser;
        $this->articulo_id=$art->id;
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

        $this->accion='store';
        
    }

    public function update()
    {
        $this->validate();

        $lArtUser=ArticuloUser::find($this->lArtUser_id);

        $lArtUser->update([
            'user_id'=>$this->idUser,
            'articuloUser_id'=>$this->articulo_id,
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

        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articulo_id','lArtUser_id','accion']);


        return redirect('ArticulosUser');
    }

    public function destroy($id)
    {
        $lArtUser=ArticuloUser::find($id);

        $lArtUser->delete();
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articulo_id','lArtUser_id','accion']);

        return redirect('ArticulosUser');
    }
    public function removeEdit(){
        $this->reset(['codigo', 'descripcion', 'cantidad', 'precio1', 'precio2', 'precio3', 'precio4', 'precio5', 'precio6', 'tramo1', 'tramo2', 'tramo3', 'tramo4', 'tramo5', 'tramo6', 'articulo_id','lArtUser_id','accion']);
    }

}
