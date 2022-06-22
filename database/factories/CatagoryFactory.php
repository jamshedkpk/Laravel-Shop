<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Catagory;

class CatagoryFactory extends Factory
{
public function definition()
{
return 
[
'name'=>$this->faker->name,
'slug'=>$this->faker->url,
'description'=>$this->faker->text,
'meta_title'=>'Here is your Title',
'meta_keyword'=>'Here is your Keywords',
'meta_description'=>'Here is your Description',
'status'=>random_int(0,1),
'popular'=>random_int(0,1),
'photo'=>$this->faker->imageUrl($height=200,$weight=200),
];
}
}
