<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDrug extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'drugname', 'refilllimit', 'prescriptions_id'];

    public function prescription(){
        $this->belongsTo(Prescription::class);
    }
}
