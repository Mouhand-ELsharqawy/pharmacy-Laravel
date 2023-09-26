<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'fname', 'lname', 'phone', 'gender', 'address', 'ssn', 'dob', 'insurances_id'];

    public function bill(){
        $this->hasMany(Bill::class);
    }

    public function insurance(){
        $this->belongsTo(Insurance::class);
    }
}
