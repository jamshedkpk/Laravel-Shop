<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catagory;

class Product extends Model
{
    use HasFactory;
    protected $fillable=
    [
    'catagory_id','name','description','original_price','selling_price',
    'photo','quantity','tax','status'
    ];

// Each product belongs to a specific catagory
public function catagory()
{
return $this->belongsTo(Catagory::class);
}

}
