<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'ssn', 'presp', 'DocId'];

    public function order(){
        $this->hasMany(Order::class);
    }

    public function prescriptiondrug(){
        $this->hasMany(PrescriptionDrug::class);
    }
}
