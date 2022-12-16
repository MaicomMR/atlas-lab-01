<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lista extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'lista_id'];
    protected $primaryKey = 'id';

    public function item() 
    {        
        return $this->belongsToMany(Item::class);
    }
}
