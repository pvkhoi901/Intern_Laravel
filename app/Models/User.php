<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use AuthenticableTrait;
    use SoftDeletes;
    use Notifiable;

    public const TYPES = [
        'admin' => 1,
        'student' => 2,
    ];

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class);
    }
    public function isAdmin()
    {
        return $this->type == self::TYPES['admin'];
    }

    public function isStudent()
    {
        return $this->type == self::TYPES['student'];
    }

    public function hasVerifiedEmail()
    {
        return ! is_null($this->verified_at);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'verified_at' => $this->freshTimestamp(),
        ])->save();
    }
}
