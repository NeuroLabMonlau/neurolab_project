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
        'game_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(GameCategory::class, 'game_category_id');
    }

    public function parameters()
    {
        return $this->hasMany(GamesParameters::class, 'game_id');
    }
}
