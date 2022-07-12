<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car_mf;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='cars';
    protected $fillable=['name','price','image','mf_id'];
    public function mf(){
        return $this->belongsTo(Car_mf::class,'mf_id','id');
    }

}
