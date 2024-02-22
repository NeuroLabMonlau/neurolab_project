<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_game',
        'description',
        'game_path', 
        'category_id',
        'creation_date',
        'update_date'
    ];
}
