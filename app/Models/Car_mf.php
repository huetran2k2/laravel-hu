<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_mf extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table='car_mfs';
    protected $fillable=['mf_name'];
    public function cars(){
        return $this->hasMany(Car::class,'mf_id','id');
    }
 
    
}
