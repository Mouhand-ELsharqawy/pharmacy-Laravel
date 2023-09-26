<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fname', 'lname', 'dob', 'salary', 'startdate', 'enddate', 'role', 'liscense', 'ssn', 'phone', 'orders_id'];
    public function disposal(){
        $this->hasMany(Disposal::class);
    }
    public function order(){
        $this->belongsTo(Order::class);
    }

    public function notification(){
        $this->hasMany(Notification::class);
    }
}
