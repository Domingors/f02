<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Requests\CsvImportRequest;
use App\Models\CsvData;
use App\Models\Articulo;
use App\Models\ArticuloUser;
use App\Models\User;
use Psy\Command\WhereamiCommand;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Importaciones extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.importaciones');
    }
    public function getImportArt()
    {
        return view('livewire.importArt-component');
    }
    public function getImportArtUsr()
    {
        return view('livewire.importArtUsr-component');
    }
    public function upPdf(Request $request)
    {
      //obtenemos el campo file definido en el formulario
      $file = $request->file('pdf');
      $id=$request->idx;

      //obtenemos el nombre del archivo
//      $nombre = $file->getClientOriginalName();
      $nombre = $id.'.pdf';

      //indicamos que queremos guardar un nuevo archivo en el disco local
      Storage::disk('local')->put($nombre,  File::get($file));

        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
//        $request->file('pdf')->store('public');
        return redirect('Pedidos');
    }

    public function parseImportArt(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
    
        $this->csv_data_file = CsvData::create([
            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
            'csv_data' => json_encode($data)
        ]);

        $this->processImportArt();
        return redirect('/dashboard');
    }
    public function parseImportArtUsr(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
    
        $this->csv_data_file = CsvData::create([
            'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
            'csv_data' => json_encode($data)
        ]);

        $this->processImportArtUsr();
            return redirect('/dashboard');
    }
    public function processImportArt()
    {
        $data = CsvData::find($this->csv_data_file->id);
        $csv_data = json_decode($data->csv_data, true);
    
        foreach ($csv_data as $row) {
            $art=Articulo::where('codigo',$row[0])->first();
            if($art==null){
                Articulo::create([
                    'codigo'=>$row[0],
                    'descripcion'=>$row[1],
                    'cantidad'=>$row[2],
                    'precio1'=>$row[3],
                    'precio2'=>$row[4],
                    'precio3'=>$row[5],
                    'precio4'=>$row[6],
                    'precio5'=>$row[7],
                    'precio6'=>$row[8],
                    'tramo1'=>$row[9],
                    'tramo2'=>$row[10],
                    'tramo3'=>$row[11],
                    'tramo4'=>$row[12],
                    'tramo5'=>$row[13],
                    'tramo5'=>$row[14]
                ]);
            }else{
                $art->update([
                    'descripcion'=>$row[1],
                    'cantidad'=>$row[2],
                    'precio1'=>$row[3],
                    'precio2'=>$row[4],
                    'precio3'=>$row[5],
                    'precio4'=>$row[6],
                    'precio5'=>$row[7],
                    'precio6'=>$row[8],
                    'tramo1'=>$row[9],
                    'tramo2'=>$row[10],
                    'tramo3'=>$row[11],
                    'tramo4'=>$row[12],
                    'tramo5'=>$row[13],
                    'tramo5'=>$row[14]
                ]);
            }
        }
    
    }

    public function processImportArtUsr()
    {
        $data = CsvData::find($this->csv_data_file->id);
        $csv_data = json_decode($data->csv_data, true);
    
        foreach ($csv_data as $row) {
            $usr=User::where('name',$row[0])->first();
            $art=Articulo::where('codigo',$row[1])->first();
            if($art!=null && $usr!=null){
                $artUsr=(ArticuloUser::where('user_id',$usr->id)->where('articulo_id',$art->id))->first();
                if($artUsr==null){
                    ArticuloUser::create([
                        'user_id'=>$usr->id,
                        'articulo_id'=>$art->id,
                        'codigo'=>$row[1],
                        'descripcion'=>$row[2],
                        'cantidad'=>$row[3],
                        'precio1'=>$row[4],
                        'precio2'=>$row[5],
                        'precio3'=>$row[6],
                        'precio4'=>$row[7],
                        'precio5'=>$row[8],
                        'precio6'=>$row[9],
                        'tramo1'=>$row[10],
                        'tramo2'=>$row[11],
                        'tramo3'=>$row[12],
                        'tramo4'=>$row[13],
                        'tramo5'=>$row[14],
                        'tramo6'=>$row[15]
                        ]);
                }else{
                    $artUsr->update([
                        'descripcion'=>$row[2],
                        'cantidad'=>$row[3],
                        'precio1'=>$row[4],
                        'precio2'=>$row[5],
                        'precio3'=>$row[6],
                        'precio4'=>$row[7],
                        'precio5'=>$row[8],
                        'precio6'=>$row[9],
                        'tramo1'=>$row[10],
                        'tramo2'=>$row[11],
                        'tramo3'=>$row[12],
                        'tramo4'=>$row[13],
                        'tramo5'=>$row[14],
                        'tramo6'=>$row[15]
                    ]);
                }
            }
        }
    
    }
}
