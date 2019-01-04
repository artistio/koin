<?php

use Illuminate\Database\Seeder;
use App\User;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Don't run on production environment
        if (App::environment('production')) {
          return 0;
        }

        //
        $testUsers = [
          ['name' => 'Hannah Boden', 'email' => 'hannah@mailtrap.io', 'password' => 'hannah123', 'is_admin' => true, 'is_locked' => false],
          ['name' => 'George Tobias', 'email' => 'george@mailtrap.io', 'password' => 'george123', 'is_admin' => false, 'is_locked' => false],
          ['name' => 'Scott Henry', 'email' => 'scott@mailtrap.io', 'password' => 'scott123', 'is_admin' => false, 'is_locked' => true],
          ['name' => 'Amelie Green', 'email' => 'amelie@mailtrap.io', 'password' => 'amelie123', 'is_admin' => true, 'is_locked' => true],
        ];

        foreach($testUsers as $user){
          $newUser = new User;
          $newUser->name = $user['name'];
          $newUser->email = $user['email'];
          $newUser->password = bcrypt($user['password']);
          $newUser->is_admin = $user['is_admin'];
          $newUser->is_locked = $user['is_locked'];
          $newUser->save();
        }
    }
}
