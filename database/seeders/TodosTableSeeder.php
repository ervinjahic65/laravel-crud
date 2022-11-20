<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        Todo::firstOrCreate(['title' => 'Lorem', 'description' => 'Lorem ipsum', 'user_id' => $user->id]);
    }
}
