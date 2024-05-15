<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTestStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'test_id',
        'game_id',
        'time',
        'score',
        'errors',
        'played', 
        'creation_user',
        'update_user'
    ];
}
