<?php

namespace Database\Seeders;

use App\Models\Column;
use App\Models\Item;
use App\Models\User;
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
        User::factory(1)->create();
        $user = User::findOrFail(1);
        $column = new Column();
        $column->name = "ilk column";
        $column->save();
        $item = new Item();
        $item->title = "Deneme";
        $item->description = "bu bir açıklamadır.";
        $item->column_id = $column->id;
        $item->user_id = $user->id;
        $item->save();

    }
}
