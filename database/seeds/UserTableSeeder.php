<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$user = factory(User::class)->times(50)->make();
    	User::insert($user->makeVisible(['password','remember_token','head_img'])->toArray());

        $user = User::find(1);
        $user->name = 'overview';
        $user->email = 'overview@geekf.org';
        $user->password = bcrypt('overview');
        $user->head_img = '/imgs/head.jpg';
        $user->is_admin = true;
        $user->activated = true;
        $user->save();
    }
}
