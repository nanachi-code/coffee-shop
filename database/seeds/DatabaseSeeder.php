<?php
use App\Comment;
use App\Post;
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
        //  $this->call(CategorySeeder::class);
        //  $this->call(OrderSeeder::class);
        $this->call(UserSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(CommentSeeder::class);
    }
}
