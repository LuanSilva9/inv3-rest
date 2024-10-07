<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investiment extends Model
{
    use HasFactory;

    protected $table = "investiment";
    public $timestamps = false;

    protected $fillable = [
        "name_investiment",
        "current_investiment",
        "session_id",
        "default_color",
        "default_icon",
    ];

    public function session() {
        return $this->belongsTo(Session::class, 'session_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
