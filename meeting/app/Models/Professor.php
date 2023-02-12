<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'first_name',
        'last_name',
        'title',
        'department',
        'faculty'
    ];
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

}
