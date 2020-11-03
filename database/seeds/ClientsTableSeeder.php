<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Client', 20)->create()->each(function ($u){
            $u->telefones()->save(factory('App\Models\Telefone')->make());
        });
    }
}
