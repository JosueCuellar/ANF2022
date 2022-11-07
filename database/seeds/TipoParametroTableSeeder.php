<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoParametroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_ratio')->insert([
            'nombre'=>'Razones de liquidez',
        ]);
        DB::table('tipo_ratio')->insert([
            'nombre'=>'Razones de actividad',
        ]);
        DB::table('tipo_ratio')->insert([
            'nombre'=>'Razones de endeudamiento (Apalancamiento)',
        ]);
        DB::table('tipo_ratio')->insert([
            'nombre'=>'Razones Financieras (Rentabilidad)',
        ]);
        DB::table('tipo_ratio')->insert([
            'nombre'=>'Individual',
        ]);
    }
}
