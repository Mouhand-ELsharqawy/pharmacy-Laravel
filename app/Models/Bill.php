<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['id','ssn', 'insrpay', 'custpay', 'totalamount', 'customers_id'];

    public function customer(){
        $this->belongsTo(Customer::class);
    }
}
