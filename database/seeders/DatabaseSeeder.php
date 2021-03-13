<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\ArticuloUser;
use App\Models\ArticuloUserHistorico;
use App\Models\Pedido;
use App\Models\LPedido;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ArtSeeder::class);
        $this->call(ArtUsrSeeder::class);
        Pedido::factory(10)->create();
        LPedido::factory(10)->create();

    }
}
