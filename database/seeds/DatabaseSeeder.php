<?php

use App\Comment;
use App\Post;
use App\User;
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
        //   $this->call(CategorySeeder::class);
        //   $this->call(ProductSeeder::class);
        //   $this->call(UserSeeder::class);
        //   $this->call(OrderSeeder::class);
        //  $this->call(PostSeeder::class);
        //  $this->call(CommentSeeder::class);
//        DB::table('users')->delete();
//        User::create(array(
//            'name'     => 'Nanachi',
//            'email'    => 'dinhvu2509@gmail.com',
//            'password' => Hash::make('12345678'),
//            'role' => 'super_admin'
//        ));

         $this->call(TableUserSeeder::class);
    }
}
