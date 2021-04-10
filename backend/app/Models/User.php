<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\User\ResetPasswordNotification;
use App\Notifications\User\VerifyEmailNotification;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function product(): HasMany
    {
        return $this->hasMany('App\Models\Product');
    }

    public function version(): HasMany
    {
        return $this->hasMany('App\Models\Version');
    }

    // public function watch_list(): BelongsToMany
    // {
    //     return $this->belongsToMany('App\Models\ProductVersion', 'product_version_user', 'user_id', 'product_version_id');
    // }

    // public function product_version(): HasMany
    // {
    //     return $this->hasMany('App\Models\ProductVersion');
    // }

    public function watch_list(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\ProductVersion');
    }

    public function vulnerabilities(): HasMany
    {
        return $this->hasMany('App\Models\Vulnerability');
    }

    // パスワードリセット
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    // アカウントアクティベーション
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }
}
