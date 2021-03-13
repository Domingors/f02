<?php

namespace Database\Seeders;

use App\Models\Articulo;
use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::create([
            'codigo'=>'w0001',
            'descripcion'=>'Sobre oficio blanco impreso (120X176)',
            'cantidad'=>1,
            'precio1'=>0.07,
            'precio2'=>0.04,
            'precio3'=>0.038,
            'precio4'=>0.038,
            'precio5'=>0.038,
            'precio6'=>0.038,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>5000,
            'tramo5'=>5000,
            'tramo6'=>5000
        ]);
        Articulo::create([
            'codigo'=>'w0002',
            'descripcion'=>'Sobre cuartilla prolongada blanco impreso (190x250)',
            'cantidad'=>1,
            'precio1'=>0.103,
            'precio2'=>0.099,
            'precio3'=>0.064,
            'precio4'=>0.850,
            'precio5'=>0.850,
            'precio6'=>0.850,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>5000,
            'tramo5'=>5000,
            'tramo6'=>5000
        ]);
        Articulo::create([
            'codigo'=>'w0003',
            'descripcion'=>'Sobre folio prolongado blanco impreso (260x360)',
            'cantidad'=>1,
            'precio1'=>0.185,
            'precio2'=>0.174,
            'precio3'=>0.164,
            'precio4'=>0.152,
            'precio5'=>0.152,
            'precio6'=>0.152,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>5000,
            'tramo5'=>5000,
            'tramo6'=>5000
        ]);
        Articulo::create([
            'codigo'=>'w0004',
            'descripcion'=>'Sobre tipo americano blanco impreso (115x225)',
            'cantidad'=>1,
            'precio1'=>0.078,
            'precio2'=>0.053,
            'precio3'=>0.049,
            'precio4'=>0.049,
            'precio5'=>0.049,
            'precio6'=>0.049,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>3000,
            'tramo5'=>3000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0005',
            'descripcion'=>'Sobre blanco ventana derecha impreso (115x225)',
            'cantidad'=>1,
            'precio1'=>0.084,
            'precio2'=>0.058,
            'precio3'=>0.051,
            'precio4'=>0.051,
            'precio5'=>0.051,
            'precio6'=>0.051,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>3000,
            'tramo5'=>3000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0006',
            'descripcion'=>'Bolsa cuartilla prolongada caña impresa (184x261)',
            'cantidad'=>1,
            'precio1'=>0.100,
            'precio2'=>0.098,
            'precio3'=>0.094,
            'precio4'=>0.082,
            'precio5'=>0.082,
            'precio6'=>0.082,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>5000,
            'tramo5'=>5000,
            'tramo6'=>5000
        ]);
        Articulo::create([
            'codigo'=>'w0007',
            'descripcion'=>'Bolsa folio prolongado caña impreso (265x365)',
            'cantidad'=>1,
            'precio1'=>0.179,
            'precio2'=>0.160,
            'precio3'=>0.150,
            'precio4'=>0.140,
            'precio5'=>0.140,
            'precio6'=>0.140,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>5000,
            'tramo5'=>5000,
            'tramo6'=>5000
        ]);
        Articulo::create([
            'codigo'=>'w0008',
            'descripcion'=>'Bolsa folio prolongado blanco impresa (265x365)',
            'cantidad'=>1,
            'precio1'=>0.185,
            'precio2'=>0.182,
            'precio3'=>0.165,
            'precio4'=>0.155,
            'precio5'=>0.155,
            'precio6'=>0.155,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>3000,
            'tramo4'=>5000,
            'tramo5'=>5000,
            'tramo6'=>5000
        ]);
        Articulo::create([
            'codigo'=>'w0009',
            'descripcion'=>'Bolsa tipo radiografia impresa (310x410)',
            'cantidad'=>1,
            'precio1'=>0.393,
            'precio2'=>0.360,
            'precio3'=>0.360,
            'precio4'=>0.360,
            'precio5'=>0.360,
            'precio6'=>0.360,
            'tramo1'=>100,
            'tramo2'=>250,
            'tramo3'=>250,
            'tramo4'=>250,
            'tramo5'=>250,
            'tramo6'=>250
        ]);
        Articulo::create([
            'codigo'=>'w0010',
            'descripcion'=>'Carátula tamaño folio impresa 1 cara en cartulina de 180 gr',
            'cantidad'=>1,
            'precio1'=>0.210,
            'precio2'=>0.150,
            'precio3'=>0.100,
            'precio4'=>0.065,
            'precio5'=>0.060,
            'precio6'=>0.060,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>500,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0011',
            'descripcion'=>'Carátula tamaño folio impresa dos caras en cartulina de 180 gr',
            'cantidad'=>1,
            'precio1'=>0.260,
            'precio2'=>0.185,
            'precio3'=>0.145,
            'precio4'=>0.087,
            'precio5'=>0.100,
            'precio6'=>0.100,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>500,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0012',
            'descripcion'=>'Carpeta tamaño doble folio impresa una cara en cartulina de 180 gr',
            'cantidad'=>1,
            'precio1'=>0.250,
            'precio2'=>0.200,
            'precio3'=>0.175,
            'precio4'=>0.170,
            'precio5'=>0.150,
            'precio6'=>0.150,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>500,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0013',
            'descripcion'=>'Carpeta tamaño doble folio impresa dos caras en cartulina de 180 gr',
            'cantidad'=>1,
            'precio1'=>0.380,
            'precio2'=>0.220,
            'precio3'=>0.190,
            'precio4'=>0.170,
            'precio5'=>0.159,
            'precio6'=>0.159,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>500,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0014',
            'descripcion'=>'Carpeta doble folio en papel de 80 gr',
            'cantidad'=>1,
            'precio1'=>0.120,
            'precio2'=>0.108,
            'precio3'=>0.095,
            'precio4'=>0.095,
            'precio5'=>0.095,
            'precio6'=>0.095,
            'tramo1'=>300,
            'tramo2'=>500,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0015',
            'descripcion'=>'Ficha tamaño DIN A6 en cartulina de 180 gr. Impresa a una cara',
            'cantidad'=>1,
            'precio1'=>0.140,
            'precio2'=>0.100,
            'precio3'=>0.078,
            'precio4'=>0.050,
            'precio5'=>0.050,
            'precio6'=>0.050,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>500,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0016',
            'descripcion'=>'Ficha tamaño DIN A5 en cartulina de 180 gr. Impresa a una cara',
            'cantidad'=>1,
            'precio1'=>0.145,
            'precio2'=>0.102,
            'precio3'=>0.078,
            'precio4'=>0.055,
            'precio5'=>0.055,
            'precio6'=>0.055,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>500,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0017',
            'descripcion'=>'Impreso en papel adhesivo tamaño 3x13',
            'cantidad'=>1,
            'precio1'=>0.115,
            'precio2'=>0.098,
            'precio3'=>0.098,
            'precio4'=>0.098,
            'precio5'=>0.098,
            'precio6'=>0.098,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>300,
            'tramo4'=>300,
            'tramo5'=>300,
            'tramo6'=>300
        ]);
        Articulo::create([
            'codigo'=>'w0018',
            'descripcion'=>'Impreso en papel adhesivo tamaño DIN A6',
            'cantidad'=>1,
            'precio1'=>0.125,
            'precio2'=>0.110,
            'precio3'=>0.110,
            'precio4'=>0.110,
            'precio5'=>0.110,
            'precio6'=>0.110,
            'tramo1'=>100,
            'tramo2'=>300,
            'tramo3'=>300,
            'tramo4'=>300,
            'tramo5'=>300,
            'tramo6'=>300
        ]);
        Articulo::create([
            'codigo'=>'w0019',
            'descripcion'=>'Impreso DIN A4 en papel de 80 gr impresión a una cara',
            'cantidad'=>1,
            'precio1'=>0.055,
            'precio2'=>0.039,
            'precio3'=>0.039,
            'precio4'=>0.039,
            'precio5'=>0.039,
            'precio6'=>0.039,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0020',
            'descripcion'=>'Juego de original y una copia impreso en papel copiativo tamaño DIN A4',
            'cantidad'=>1,
            'precio1'=>0.165,
            'precio2'=>0.125,
            'precio3'=>0.098,
            'precio4'=>0.098,
            'precio5'=>0.098,
            'precio6'=>0.098,
            'tramo1'=>300,
            'tramo2'=>500,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0021',
            'descripcion'=>'Juego de original y dos copias impreso en papel copiativo tamaño DIN A4',
            'cantidad'=>1,
            'precio1'=>0.176,
            'precio2'=>0.135,
            'precio3'=>0.099,
            'precio4'=>0.099,
            'precio5'=>0.099,
            'precio6'=>0.099,
            'tramo1'=>300,
            'tramo2'=>500,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0022',
            'descripcion'=>'Juegos de original y tres copias impreso en papel copiativo tamaño DIN A4',
            'cantidad'=>1,
            'precio1'=>0.205,
            'precio2'=>0.177,
            'precio3'=>0.110,
            'precio4'=>0.110,
            'precio5'=>0.110,
            'precio6'=>0.110,
            'tramo1'=>300,
            'tramo2'=>500,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0023',
            'descripcion'=>'Libreto tamaño DIN A4 cerrado con portada en cartulina de 180 gr impreso en dos tintas con 17 hojas en papel de 180 gr.',
            'cantidad'=>1,
            'precio1'=>8.500,
            'precio2'=>8.500,
            'precio3'=>8.500,
            'precio4'=>8.500,
            'precio5'=>8.500,
            'precio6'=>8.500,
            'tramo1'=>1,
            'tramo2'=>1,
            'tramo3'=>1,
            'tramo4'=>1,
            'tramo5'=>1,
            'tramo6'=>1
        ]);
        Articulo::create([
            'codigo'=>'w0024',
            'descripcion'=>'libreto tamaño DIN A5 cerrado con portada en cartulina mate de 300 gr impreso a color con 18 hojas en papel de 80 gr',
            'cantidad'=>1,
            'precio1'=>8.955,
            'precio2'=>8.955,
            'precio3'=>8.955,
            'precio4'=>8.955,
            'precio5'=>8.955,
            'precio6'=>8.955,
            'tramo1'=>1,
            'tramo2'=>1,
            'tramo3'=>1,
            'tramo4'=>1,
            'tramo5'=>1,
            'tramo6'=>1
        ]);
        Articulo::create([
            'codigo'=>'w0025',
            'descripcion'=>'Saludas en papel verjurado de 100 gr tamaño DIN A5',
            'cantidad'=>1,
            'precio1'=>15.999,
            'precio2'=>15.999,
            'precio3'=>15.999,
            'precio4'=>15.999,
            'precio5'=>15.999,
            'precio6'=>15.999,
            'tramo1'=>100,
            'tramo2'=>100,
            'tramo3'=>100,
            'tramo4'=>100,
            'tramo5'=>100,
            'tramo6'=>100
        ]);
        Articulo::create([
            'codigo'=>'w0026',
            'descripcion'=>'Talonario de transporte-taxi de original y dos copias en papel copiativo DIN A4',
            'cantidad'=>1,
            'precio1'=>8.555,
            'precio2'=>8.555,
            'precio3'=>8.555,
            'precio4'=>8.555,
            'precio5'=>8.555,
            'precio6'=>8.555,
            'tramo1'=>1,
            'tramo2'=>1,
            'tramo3'=>1,
            'tramo4'=>1,
            'tramo5'=>1,
            'tramo6'=>1
        ]);
        Articulo::create([
            'codigo'=>'w0027',
            'descripcion'=>'Impresión y encuadernacion hasta 400 pag.por tomo. Impreso en 4/4 tintas sobre papel de 80 gr.con acabado laminado mate. Diseño y maquetación portada.',
            'cantidad'=>1,
            'precio1'=>35.000,
            'precio2'=>35.000,
            'precio3'=>35.000,
            'precio4'=>35.000,
            'precio5'=>35.000,
            'precio6'=>35.000,
            'tramo1'=>1,
            'tramo2'=>1,
            'tramo3'=>1,
            'tramo4'=>1,
            'tramo5'=>1,
            'tramo6'=>1
        ]);
        Articulo::create([
            'codigo'=>'w0028',
            'descripcion'=>'Impresión y encuadernacion hasta 200 pag.por tomo. Impreso en 4/4 tintas sobre papel de 80 gr.con acabados laminado mate. Diseño y maquetación portada.',
            'cantidad'=>1,
            'precio1'=>16.390,
            'precio2'=>16.390,
            'precio3'=>16.390,
            'precio4'=>16.390,
            'precio5'=>16.390,
            'precio6'=>16.390,
            'tramo1'=>1,
            'tramo2'=>1,
            'tramo3'=>1,
            'tramo4'=>1,
            'tramo5'=>1,
            'tramo6'=>1
        ]);
        Articulo::create([
            'codigo'=>'w0029',
            'descripcion'=>'Sobre comercial caña impreso a 2/0 tinta 120x176',
            'cantidad'=>1,
            'precio1'=>0.059,
            'precio2'=>0.057,
            'precio3'=>0.051,
            'precio4'=>0.047,
            'precio5'=>0.045,
            'precio6'=>0.043,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0030',
            'descripcion'=>'Sobre comercial blanco auto adhesivo impreso a 2/0 tintas 120x176',
            'cantidad'=>1,
            'precio1'=>0.064,
            'precio2'=>0.061,
            'precio3'=>0.060,
            'precio4'=>0.059,
            'precio5'=>0.054,
            'precio6'=>0.050,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0031',
            'descripcion'=>'Sobre comercial blanco auto adhesivo impreso a 2/0 tintas 184x261',
            'cantidad'=>1,
            'precio1'=>0.081,
            'precio2'=>0.057,
            'precio3'=>0.054,
            'precio4'=>0.053,
            'precio5'=>0.051,
            'precio6'=>0.047,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0032',
            'descripcion'=>'Sobre blanco folio impreso a 2 tinta 250x353',
            'cantidad'=>1,
            'precio1'=>0.135,
            'precio2'=>0.121,
            'precio3'=>0.108,
            'precio4'=>0.094,
            'precio5'=>0.084,
            'precio6'=>0.074,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0033',
            'descripcion'=>'Bolsa kraf k-26 cuarto impresos a 2/0 tintas 184x261',
            'cantidad'=>1,
            'precio1'=>0.100,
            'precio2'=>0.090,
            'precio3'=>0.097,
            'precio4'=>0.091,
            'precio5'=>0.087,
            'precio6'=>0.079,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0034',
            'descripcion'=>'Bolsa kraf k-32 folio impresos a 2/0 tintas 250x353',
            'cantidad'=>1,
            'precio1'=>0.170,
            'precio2'=>0.150,
            'precio3'=>0.139,
            'precio4'=>0.140,
            'precio5'=>0.131,
            'precio6'=>0.130,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0035',
            'descripcion'=>'Tarjetas papel adhesivo tamaño 18x7 cm fondo color',
            'cantidad'=>1,
            'precio1'=>0.049,
            'precio2'=>0.049,
            'precio3'=>0.049,
            'precio4'=>0.049,
            'precio5'=>0.049,
            'precio6'=>0.049,
            'tramo1'=>1000,
            'tramo2'=>1000,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0036',
            'descripcion'=>'Tarjetas papel adhesivo tamaño 14x7 cm fondo color',
            'cantidad'=>1,
            'precio1'=>0.045,
            'precio2'=>0.045,
            'precio3'=>0.045,
            'precio4'=>0.045,
            'precio5'=>0.045,
            'precio6'=>0.045,
            'tramo1'=>1000,
            'tramo2'=>1000,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0037',
            'descripcion'=>'Tarjetas papel adhesivo tamaño 6x4 cm fondo color',
            'cantidad'=>1,
            'precio1'=>0.045,
            'precio2'=>0.045,
            'precio3'=>0.045,
            'precio4'=>0.045,
            'precio5'=>0.045,
            'precio6'=>0.045,
            'tramo1'=>1000,
            'tramo2'=>1000,
            'tramo3'=>1000,
            'tramo4'=>1000,
            'tramo5'=>1000,
            'tramo6'=>1000
        ]);
        Articulo::create([
            'codigo'=>'w0038',
            'descripcion'=>'Notificación/citación impresos sobre papel auto copiativo 1 tinta cara formato DIN A5, original y copia',
            'cantidad'=>1,
            'precio1'=>3.500,
            'precio2'=>3.100,
            'precio3'=>2.490,
            'precio4'=>2.490,
            'precio5'=>2.490,
            'precio6'=>2.490,
            'tramo1'=>20,
            'tramo2'=>40,
            'tramo3'=>60,
            'tramo4'=>60,
            'tramo5'=>60,
            'tramo6'=>60
        ]);
        Articulo::create([
            'codigo'=>'w0039',
            'descripcion'=>'Notificación/citación impresos sobre papel auto copiativo 1 tinta cara formato DIN A4, original y 3 copia',
            'cantidad'=>1,
            'precio1'=>4.410,
            'precio2'=>3.550,
            'precio3'=>2.970,
            'precio4'=>2.970,
            'precio5'=>2.970,
            'precio6'=>2.970,
            'tramo1'=>20,
            'tramo2'=>40,
            'tramo3'=>60,
            'tramo4'=>60,
            'tramo5'=>60,
            'tramo6'=>60
        ]);
        Articulo::create([
            'codigo'=>'w0040',
            'descripcion'=>'Carpetas impresas sobre papel lito de 80 grs. Impresas a una cara DIN A3',
            'cantidad'=>1,
            'precio1'=>0.079,
            'precio2'=>0.073,
            'precio3'=>0.073,
            'precio4'=>0.073,
            'precio5'=>0.073,
            'precio6'=>0.073,
            'tramo1'=>1000,
            'tramo2'=>3000,
            'tramo3'=>3000,
            'tramo4'=>3000,
            'tramo5'=>3000,
            'tramo6'=>3000
        ]);
        Articulo::create([
            'codigo'=>'w0041',
            'descripcion'=>'Carpetas impresas sobre cartulina de 240 grs.1 cara 1 tinta formato doble folio',
            'cantidad'=>1,
            'precio1'=>0.220,
            'precio2'=>0.170,
            'precio3'=>0.190,
            'precio4'=>0.160,
            'precio5'=>0.145,
            'precio6'=>0.130,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);
        Articulo::create([
            'codigo'=>'w0042',
            'descripcion'=>'Portadas impresas sobre cartulina de 240 grs. 1 cara 1 tinta formato folio',
            'cantidad'=>1,
            'precio1'=>0.120,
            'precio2'=>0.099,
            'precio3'=>0.093,
            'precio4'=>0.090,
            'precio5'=>0.080,
            'precio6'=>0.067,
            'tramo1'=>500,
            'tramo2'=>1000,
            'tramo3'=>2000,
            'tramo4'=>3000,
            'tramo5'=>5000,
            'tramo6'=>10000
        ]);

    }
}
