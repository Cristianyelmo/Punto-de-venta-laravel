<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

    public function categoria(){
        return $this->belongsTo(Categoria::class);
      
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
      
    }


    public function presentacione(){
        return $this->belongsTo(Presentacione::class);
      
    }

    protected $fillable = ['nombre','descripcion'];
}
