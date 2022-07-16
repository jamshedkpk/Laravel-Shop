<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Country;

class DatabaseSeeder extends Seeder
{
public function run()
{
// User::factory(10)->create();
// Catagory::factory()->count(5)->create();
// Cart::factory()->count(5)->create();
$this->call(UserSeeder::class);
$this->call(RoleSeeder::class);
$this->call(CatagorySeeder::class);
Product::factory()->count(5)->create();
Country::factory(10)->create();
}
}
