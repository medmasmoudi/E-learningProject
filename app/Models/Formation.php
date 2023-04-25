<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formation extends Model
{
    use HasFactory;

    protected $fillable=[
        'Title',
        'Description',
        'Tags',
        'Image',
    ];

    public function chapters()
    {
        return $this->hasMany(\App\Models\Chapter::class,
    'by_formation_id');
    }

}
