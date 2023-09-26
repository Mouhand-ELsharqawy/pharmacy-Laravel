<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'medtype', 'manufacturer', 'stockqty', 'price', 'expiredate', 'desc', 'ordered_drugs_id'];

    public function disposal(){
        $this->hasMany(Disposal::class);
    }

    public function ordereddrug(){
        $this->belongsTo(OrderedDrug::class);
    }
}
