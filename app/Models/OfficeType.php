<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeType extends Model
{
    protected $fillable = ['name'];

    public function offices()
    {
        return $this->hasMany(Office::class);
    }

    // Default Office Types
    public static function defaultOfficeTypes()
    {
        return [
            'Head Office',
            'Sub Division',
        ];
    }
}
