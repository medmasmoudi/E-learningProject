<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapters extends Model
{
    use HasFactory;

    protected $fillable=[
        'title', 'description','formation_id'
    ];

    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function files() : HasMany{
        return $this->hasMany(Files::class);
    }

}
