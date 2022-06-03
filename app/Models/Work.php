<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function motion(){
        
        return $this->hasOne(Motion::class);
    }

    public function voice(){
        
        return $this->hasOne(Voice::class);
    }

    public function web(){
        
        return $this->hasOne(Web::class);
    }

    public function App(){
        
        return $this->hasOne(App::class);
    }

    public function logo(){
        
        return $this->hasMany(Logo::class);
    }

}
