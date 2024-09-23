<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = "session";
    public $timestamps = false;

    protected $fillable = [
        "name",
        "icon",
        "color"
    ];

    public function investiment() {
        return $this->hasMany(Investiment::class, 'session_id');
    }
}
