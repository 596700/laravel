<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = ['comment', 'vulnerability_id'];

    public function vulnerability(): BelongsTo
    {
        return $this->belongsTo('App\Models\Vulnerability');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
