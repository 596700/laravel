<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Version extends Model
{
    //
    protected $fillable = ['version'];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
