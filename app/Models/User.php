<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }

    protected $fillable = [
        'name',
        'email',
        'rol_id',
        'password',
    ];
}
