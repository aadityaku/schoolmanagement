<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routeing extends Model
{
    use HasFactory;
    public function classname(){
        return $this->hasOne(Clases::class,"id","clases_id");
    }
    public function subject(){
        return $this->hasOne(Subject::class,"id","subject_id");
    }
    public function teacher(){
        return $this->hasOne(Teacher::class,"subject_id","subject_id");
    }

    protected $guarded=[];
}
