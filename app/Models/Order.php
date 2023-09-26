<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'orderdate', 'prescriptions_id'];
    public function employee(){
        $this->hasMany(Employee::class);
    }

    public function prescription(){
        $this->belongsTo(Prescription::class);
    }

    public function ordereddrug(){
        $this->hasMany(OrderedDrug::class);
    }
}
