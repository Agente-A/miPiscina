<?php

use App\CondicionPiscina as ConP;
use Illuminate\Database\Seeder;

class CondicionPiscinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');   // Desactivar comprovación de claves foraneas
        ConP::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');   // Activar comprovación de claves foraneas
        
        ConP::create([
            'condicion' =>  'malo'
        ]);

        ConP::create([
            'condicion' =>  'suficiente'
        ]);

        ConP::create([
            'condicion' =>  'bueno'
        ]);
    }
}
