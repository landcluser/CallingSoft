<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '123456';
        $admins = [
            ['masud@youthfireit.com', 'MD Masud', 'Sikdar'],
            ['manik@youthfireit.com', 'Manik Chondro', 'Dhor'],
            ['info@youthfireit.com', 'Youthfire', 'IT'],
            ['sajib@youthfireit.com', 'Sajib Kumar', 'Barai']
        ];
        foreach ($admins as $admin){
            $user = User::create([
                'email' => $admin[0],
                'first' => $admin[1],
                'last' => $admin[2],
                'active' => 1,
                'password' => Hash::make($password)
            ]);
            $user->messenger()->create([
                'slug' => $user->last.'-YFIT-'.Str::random(4).'-'.Carbon::now()->timestamp,
            ]);
        }
        // factory(App\User::class, 15)->create()->each(function ($user){
        //     $user->messenger()->create([
        //         'slug' => $user->last.'-'.Str::random(4).'-'.Carbon::now()->timestamp
        //     ]);
        // });
    }
}
