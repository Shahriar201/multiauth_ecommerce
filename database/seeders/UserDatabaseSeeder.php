<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt(12345678);
        $user = User::create([
            'name' => 'Shahriar Islam',
            'email' => 'shahriar@gmail.com',
            'is_admin' => '1',
            'password' => $password
        ]);

        $this->command->info('User Created Successfully!');
        $this->command->info('Email : shahriar@gmail.com');
        $this->command->info('Password : 12345678');

        for($i = 0; $i < 10; $i++) {
            $name =Str::random(15);
            $user = User::create([
                'name' => $name,
                'email' => $name.'@gmail.com',
                'password' => $password
            ]);
        }
    }
}
