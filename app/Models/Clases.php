<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function student(){
        return $this->hasMany(Student::class,"clases_id","id");
    }
    public function classteacher(){
        return $this->hasOne(Teacher::class,"id","teacher_id");
    }
    public function payment(){
        return $this->hasOne(Payment::class,"clases_id","id");
    }
    
    protected $table="clases";
  
}
