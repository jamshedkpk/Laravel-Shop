<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Country extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    // Each country has many users
    public function users()
    {
    return $this->hasMany(User::class);
    }
}
