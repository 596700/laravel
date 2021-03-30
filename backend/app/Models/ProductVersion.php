<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVersion extends Model
{
    //
    // protected $table = 'product_versions';

    protected $fillable = ['product_id', 'version_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function version(): BelongsTo
    {
        return $this->belongsTo('App\Models\Version');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function vulnerability(): BelongsToMany
    {
        return $this->BelongsToMany('App\Models\Vulnerability');
    }

}
