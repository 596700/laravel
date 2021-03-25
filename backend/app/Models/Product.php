<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //
    protected $fillable = ['name', 'vendor_url', 'part'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
