<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapters extends Model
{
    use HasFactory;

    protected $fillable=[
        'ChapTitle', 'ChapDescription'
    ];

    public function owner() : BelongsTo{
        return $this-> belongsTo(\App\Models\Formation::class , 'by_formation_id');
    }
}
