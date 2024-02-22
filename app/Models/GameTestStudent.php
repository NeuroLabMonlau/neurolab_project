<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTestStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'time',
        'score', 
        'creation_date',
        'update_date',
        'creation_user',
        'update_user'
    ];
}
