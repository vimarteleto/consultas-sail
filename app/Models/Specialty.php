<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'specialties';

    public function doctors()
    {
        return $this->hasMany(User::class);
    }
}
