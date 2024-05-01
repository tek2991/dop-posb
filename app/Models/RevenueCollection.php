<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueCollection extends Model
{
    protected $fillable = ['office_id', 'user_id', 'posb_net', 'certificates_net', 'mssc_net', 'month', 'financial_year_id'];

    protected $casts = [
        'month' => 'datetime',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class);
    }
}
