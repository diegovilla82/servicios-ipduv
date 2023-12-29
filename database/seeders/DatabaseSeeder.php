<?php

namespace Database\Seeders;

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
        // $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DeviceTypeSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(AreaSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
