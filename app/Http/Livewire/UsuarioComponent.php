<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Auth;

class UsuarioComponent extends Component
{
    public $idUsr;
    public $itemsUsersPagina=100;
    public $name, $email, $password, $isAdmin, $isJefe, $grupo;
    public $busquedaUsr;
    public $accion='store';

    protected $rules=[
        'name'=>'required | max:200',
        'email'=>'required | max:250',
        'password'=>'required | max:200',
    ];

    protected $messages=[
        'name.required'=>'el nombre es obligatorio',
        'name.max'=>'el nombre no puede tener mas de 200 caracteres',
        'email.required'=>'el correo es obligatorio',
        'email.max'=>'el correo no puede tener mas de 250 caracteres',
    ];

    public function render()
    {
        $users=User::Where('name','LIKE',"%{$this->busquedaUsr}%")
        ->paginate($this->itemsUsersPagina);
        return view('livewire.usuario-component',compact('users'));

    }
    public function store()
    {
        $this->validate();
        $us=User::where('name',$this->name)
        ->orWhere('email',$this->email)
        ->get();
        if(!empty($us)){
            User::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>bcrypt($this->password),
                'is_admin'=>$this->isAdmin,
                'is_jefe'=>$this->isJefe,
                'grupo'=>$this->grupo
            ]);
            $this->reset(['name', 'email', 'password', 'isAdmin', 'isJefe', 'grupo', 'idUsr','accion']);
            return redirect('Usuarios');
        }
    }

    public function edit(User $usr)
    {
        $this->idUsr=$usr->id;
        $this->name=$usr->name;
        $this->email=$usr->email;
        $this->password=$usr->password;
        $this->isAdmin=$usr->is_admin;
        $this->isJefe=$usr->is_jefe;
        $this->grupo=$usr->grupo;

        $this->accion='update';
        
    }

    public function update()
    {
        $this->validate();

        $usr=User::find($this->idUsr);

        $usr->update([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
            'is_admin'=>$this->isAdmin,
            'is_jefe'=>$this->isJefe,
            'grupo'=>$this->grupo
    ]);

    $this->reset(['name', 'email', 'password', 'isAdmin', 'isJefe', 'grupo', 'idUsr','accion']);


    return redirect('Usuarios');
}

    public function destroy($id)
    {
        $usr=User::find($id);

        $usr->delete();
        $this->reset(['name', 'email', 'password', 'isAdmin', 'isJefe', 'grupo', 'idUsr','accion']);

        return redirect('Usuarios');
    }
    public function removeEdit(){
        $this->reset(['name', 'email', 'password', 'isAdmin', 'isJefe', 'grupo', 'idUsr','accion']);
    }

}
