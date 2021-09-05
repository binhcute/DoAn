<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(User::class, 10)->create();
        // factory(Product::class, 20)->create();
        // factory(Category::class, 8)->create();
        // factory(Portfolio::class, 8)->create();
        // factory(Article::class, 30)->create();
        $this->call('UserDatabaseSeeder');
    }
}
class UserDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'lastName' => 'Bình',
                'firstName' => 'Thanh',
                'username' => 'binhadmin',
                'password' => '$2y$10$.o8v59/En1r8xq9xFOCg6embp91DxT3YolbI7ws.2axnd5TdLiNpK',
                'avatar' => 'avatar-1.png',
                'gender' => '0',
                'phone' => '0911022242',
                'address' => 'thanhbinh0606.hcm@gmail.com',
                'level' => '1',
                'status' => '1'
            ]
        ]);
    }
}
