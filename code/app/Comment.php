<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'body',
    ];

    public function articles()
    {
        return $this->belongsTo('App\Article')->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}