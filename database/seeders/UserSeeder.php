<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Auth;
class UserSeeder extends Seeder
{
public function run()
{
User::create([
'name'=>'admin',
'email'=>'admin@gmail.com',
'role_id'=>1,
'password'=>Hash::make('admin'),
'country_id'=>1,
'city_id'=>2,
'state_id'=>3,
'address'=>'Village Council Tari Khel',
'mobile'=>3469040552,
'photo'=>'Photo is here',
'status'=>1
]);
User::create([
'name'=>'user',
'email'=>'user@gmail.com',
'role_id'=>2,
'password'=>Hash::make('admin'),
'country_id'=>1,
'city_id'=>4,
'state_id'=>7,
'address'=>'Village Council Behram Khel',
'mobile'=>3469044990,
'photo'=>'Photo is here',
'status'=>1
]);
}


}
