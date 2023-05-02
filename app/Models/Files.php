<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename'
    ];
    public function chapters() : BelongsTo
    {
        return $this->belongsTo(Chapters::class);
    }
}
