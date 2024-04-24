<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosbRate extends Model
{
    protected $fillable = ['start_date', 'end_date', 'posb_in_cents', 'certificates_in_cents', 'mssc_in_cents'];

    public function scopeCurrent($query)
    {
        return $query->where('start_date', '<=', now())->where('end_date', '>=', now());
    }
}
