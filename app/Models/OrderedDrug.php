<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedDrug extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'OrderedQty', 'BatchNo', 'price', 'orders_id'];
    public function medicine(){
        $this->hasMany(Medicine::class);
    }
    public function order(){
        $this->belongsTo(Order::class);
    }
}
