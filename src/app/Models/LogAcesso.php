<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    protected $table = 'log_acesso';
    protected $fillable = ['ip', 'route'];

    use HasFactory;
}