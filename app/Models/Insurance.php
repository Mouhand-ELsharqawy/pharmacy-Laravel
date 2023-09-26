<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'compname', 'coinsurance', 'startdate', 'enddate'];

    public function customer(){
        $this->hasMany(Customer::class);
    }
}
