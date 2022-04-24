<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    use HasFactory;
    public function class(){
        return $this->hasMany(Student::class,"clases_id","id");
    }
    public function classteacher(){
        return $this->hasOne(Teacher::class,"id","teacher_id");
    }
    protected $table="clases";
}
