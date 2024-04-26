<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'division_id',
        'role_id',
        'office_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
    
    public function division()
    {
        // If no office is assigned to the user, then the division will be null
        if($this->office == null) {
            return null;
        }

        // If Office has a division, then return the division
        if($this->office->division != null) {
            return $this->office->division;
        }

        // If Office has no division, then return the division of the sub-division
        if($this->office->subDivision != null) {
            return $this->office->subDivision->division;
        }

        return null;
    }

    public function subDivision()
    {
        // If no office is assigned to the user, then the sub-division will be null
        if($this->office == null) {
            return null;
        }

        // If Office has a sub-division, then return the sub-division
        if($this->office->subDivision != null) {
            return $this->office->subDivision;
        }

        return null;
    }

    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

    public function isDivisionalUser()
    {
        return $this->role->name === 'divisional_user';
    }

    public function isSubDivisionalUser()
    {
        return $this->role->name === 'sub_divisional_user';
    }
}
