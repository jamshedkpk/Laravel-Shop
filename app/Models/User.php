<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'city',
        'state', 
        'address',
        'mobile'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Each role can be associated to many users
public function role()
{
return $this->belongsTo(Role::class);
}

// Return role of user wheither it is a admin or user
public function checkRole()
{
    $userid=Auth::id(); 
    $role=User::join('roles','roles.id','=','users.role_id')
    ->where('users.id','=',$userid)
    ->first();
    return $role->name;
}
// Each user has many products to buy
public function products()
{
return $this->belongsToMany(Product::class,'carts','user_id','product_id');
}
}
