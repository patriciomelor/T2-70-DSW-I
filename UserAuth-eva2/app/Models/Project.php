<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'creation_date', 'user_id', 'active'];

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
