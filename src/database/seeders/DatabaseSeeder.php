<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Like;
use App\Models\Comment;
use App\Models\CategoryItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // CategoryItem::factory(10)->create();
        // Like::factory(10)->create();
        // Comment::factory(10)->create();
        $this->call([
            AdminUserSeeder::class,
            AdminTablesSeeder::class,
        ]);
    }
}
