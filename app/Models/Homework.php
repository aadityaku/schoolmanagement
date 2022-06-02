<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    public function class(){
        return $this->hasOne(Clases::class,"id","clases_id");
    }
    public function subject(){
        return $this->hasOne(Subject::class,"id","subject_id");
    }
    public function tea(){
        return $this->hasOne(Teacher::class,"id","teacher_id");
    }
}
