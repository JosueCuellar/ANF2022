<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Empresa;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        $empresa = new Empresa();
        $empresa->nombre = "Empresa Admin";
        $empresa->sector_id = 1;
        $empresa->user_id = 1;
        $empresa->save();

        $objetos = DB::select('SELECT * FROM permission_role WHERE role_id = 1');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 1,
            ]);
        }

        //Analista de prueba!
        DB::table('users')->insert([
            'name' => 'Analista analista',
            'email' => 'analista@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2,
        ]);

        $empresa = new Empresa();
        $empresa->nombre = "Empresa Analista";
        $empresa->sector_id = 1;
        $empresa->user_id = 2;
        $empresa->save();

        $objetos = DB::select('SELECT * FROM permission_role WHERE role_id = 2');

        foreach ($objetos as $objeto) {
            DB::table('permission_user')->insert([
                'permission_id' => $objeto->permission_id,
                'user_id' => 2,
            ]);
        }
    }
}
