<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'office_id',
        'start_date',
        'end_date',
        'total_revenue_target_in_cents',
        'total_account_opening',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
