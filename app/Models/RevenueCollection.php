<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RevenueCollection extends Model
{
    protected $fillable = ['office_id', 'user_id', 'posb_net', 'certificates_net', 'mssc_net', 'month'];

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

    public function FinancialYearTarget()
    {
        $financial_year = FinancialYear::where('start_date', '<=', $this->month)
            ->where('end_date', '>=', $this->month)
            ->first();

        $target = Target::where('office_id', $this->office_id)
            ->where('start_date', $financial_year->start_date)
            ->where('end_date', $financial_year->end_date)
            ->first();

        $target = $target ? $target->total_revenue_target_in_cents/100 : 0.00;

        return $target;
    }

    public function totalRevenue()
    {
        return $this->posb_net + $this->certificates_net + $this->mssc_net;
    }
}
