<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Mauro Ferrero',
            'email' => 'mferrero@ipduv.gov.ar',
            'password' => Hash::make('mferrero22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Daniel Bogarin',
            'email' => 'dbogarin@ipduv.gov.ar',
            'password' => Hash::make('dbogarin22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Carlos Hess',
            'email' => 'chess@ipduv.gov.ar',
            'password' => Hash::make('chess22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Oscar Ortigoza',
            'email' => 'oortigoza@ipduv.gov.ar',
            'password' => Hash::make('oortigoza22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Oscar Arismendi',
            'email' => 'oarismendi@ipduv.gov.ar',
            'password' => Hash::make('oarismendi22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Hugo Fernandez',
            'email' => 'hfernandez@ipduv.gov.ar',
            'password' => Hash::make('hfernandez22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Diego Menendez',
            'email' => 'dmenendez@ipduv.gov.ar',
            'password' => Hash::make('dmenendez22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Roman Quintana',
            'email' => 'rquintana@ipduv.gov.ar',
            'password' => Hash::make('rquintana22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Emmanuel Senna',
            'email' => 'esenna@ipduv.gov.ar',
            'password' => Hash::make('esenna22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Federico Barraza',
            'email' => 'fbarraza@ipduv.gov.ar',
            'password' => Hash::make('fbarraza22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Daniel Rivero',
            'email' => 'drivero@ipduv.gov.ar',
            'password' => Hash::make('drivero22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Samuel Escobar',
            'email' => 'sescobar@ipduv.gov.ar',
            'password' => Hash::make('sescobar22'),
            'active' => true,
        ]);

        User::create([
            'name' => 'Elias Mazaitis',
            'email' => 'emazaitis@ipduv.gov.ar',
            'password' => Hash::make('emazaitis22'),
            'active' => true,
        ]);

//        $user->assignRole('Admin');
    }
}
