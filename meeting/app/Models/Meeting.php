<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable=[
        'subject',
        'room',
        'date',
        'professor_id',
        'user_id'
    ];
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
