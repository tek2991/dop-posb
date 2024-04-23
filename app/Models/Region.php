<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    // Default Regions
    public static function defaultRegions()
    {
        return [
            'Guwahati HQ',
            'Dibrugarh RO',
        ];
    }
}
