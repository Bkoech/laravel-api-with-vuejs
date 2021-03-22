<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name','description','quantity'
    ];

    public function supplierProduct()
    {
        return $this->hasMany(SupplierProduct::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
