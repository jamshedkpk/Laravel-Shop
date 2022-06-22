<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catagory;
use App\Models\Product;
class DatabaseSeeder extends Seeder
{
public function run()
{
// \App\Models\User::factory(10)->create();
$this->call(UserSeeder::class);
$this->call(RoleSeeder::class);
Catagory::factory()->count(5)->create();
Product::factory()->count(5)->create();
}
}
