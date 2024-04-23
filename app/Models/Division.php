<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name', 'region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function offices()
    {
        return $this->hasMany(Office::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Default Divisions
    public static function defaultDivisions()
    {
        return [
            'Cachar' => ['Region' => 'Guwahati HQ'],
            'Darrang' => ['Region' => 'Guwahati HQ'],
            'Dibrugarh' => ['Region' => 'Dibrugarh RO'],
            'Goalpara' => ['Region' => 'Guwahati HQ'],
            'Guwahati' => ['Region' => 'Guwahati HQ'],
            'Nagaon' => ['Region' => 'Dibrugarh RO'],
            'Nalbari' => ['Region' => 'Guwahati HQ'],
            'Sivsagar' => ['Region' => 'Dibrugarh RO'],
            'Tinsukia' => ['Region' => 'Dibrugarh RO']
        ];
    }
}
