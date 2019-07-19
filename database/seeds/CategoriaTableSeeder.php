<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = new Categoria();
        $categoria->categoria = "Consola";
        $categoria->save();

        $categoria = new Categoria();
        $categoria->categoria = "Videojuego";
        $categoria->save();

    }
}
