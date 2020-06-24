<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Premium',
            'url' => 'premium',
            'price' => 39.99,
            'description' => 'Plano de Empresas Médio Porte'
        ]);
    }
}
