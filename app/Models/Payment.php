<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function student(){
        return $this->hasOne(Student::class,"id","student_id");
    }
    public function clases(){
        return $this->hasOne(Clases::class,"id","clases_id");
    }
}
