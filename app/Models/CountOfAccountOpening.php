<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountOfAccountOpening extends Model
{
    protected $fillable = [
        'user_id',
        'office_id',
        'sb',
        'rd',
        'mis',
        'ppf',
        'scss',
        'ssa',
        'td',
        'mssc',
        'nsc',
        'kvp',

        'month',
    ];

    protected $casts = [
        'month' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
