<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'test_id',
        'level', 
        'max_score',
        'rounds',
        'max_time',
        'min_time',
        'creation_date',
        'update_date',
        'creation_user',
        'update_user'
    ];
}
