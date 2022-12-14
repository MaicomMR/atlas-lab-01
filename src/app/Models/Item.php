<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['compra', 'valor'];
    protected $table = 'itens';

    public function lista() 
    {
        return $this->hasOne(Order::class);
    }
}
