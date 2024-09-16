<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    public $table = "Session";
    public $timestamps = false;
    
    protected $csrf = false;

    protected $fillable = [
        "id",
        "name"
    ];
}
