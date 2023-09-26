<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposal extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'dispqty', 'company', 'dispdate', 'medicines_id', 'employees_id'];

    public function medicine(){
        $this->belongsTo(Medicine::class);
    }

    public function employee(){
        $this->belongsTo(Employee::class);
    }
}
