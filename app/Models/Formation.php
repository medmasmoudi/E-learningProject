<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Formation extends Model
{
    use HasFactory;

    protected $fillable=[
        'Title',
        'Description',
        'Tags',
        'Image',
        'Certificat',
        'duration',
        'nbrOfSpots',
    ];




    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'formation_user','formation_id','user_id');
    }
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapters::class);
    }
}
