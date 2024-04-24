<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date'];

    public function revenueCollections()
    {
        return $this->hasMany(RevenueCollection::class);
    }
    
    public function CountAccountOpenings()
    {
        return $this->hasMany(AccountOpening::class);
    }

    public function scopeCurrent($query)
    {
        return $query->where('start_date', '<=', now())->where('end_date', '>=', now());
    }
}
