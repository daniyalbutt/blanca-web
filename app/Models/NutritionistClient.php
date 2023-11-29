<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionistClient extends Model
{
    use HasFactory;

    protected $table = 'nutritionist_client';

    public function user(){
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function nutritionist(){
        return $this->hasOne(User::class, 'id', 'nutritionist_id');
    }

    public function documents(){
        return $this->hasMany(ChecklistDocs::class, 'nutritionist_client_id', 'id')->orderBy('id', 'desc');
    }
    
}
