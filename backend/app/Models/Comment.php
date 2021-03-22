<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    //
    public function vulnerability(): BelongsTo
    {
        return $this->belongsTo('App\Models\Vulnerability');
    }
}
