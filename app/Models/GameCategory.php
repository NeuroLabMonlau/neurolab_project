<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_category',
        'creation_date',
        'update_date', 
        'creation_user',
        'update_user'
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'category_id');
    }
}
