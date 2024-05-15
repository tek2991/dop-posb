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

    public function FinancialYearTarget()
    {
        $financial_year = FinancialYear::where('start_date', '<=', $this->month)
            ->where('end_date', '>=', $this->month)
            ->first();

        $target = Target::where('office_id', $this->office_id)
            ->where('start_date', $financial_year->start_date)
            ->where('end_date', $financial_year->end_date)
            ->first();

        $target = $target ? $target->total_account_opening : 0;

        return $target;
    }

    public function totalAccountOppening()
    {
        return $this->sb + $this->rd + $this->mis + $this->ppf + $this->scss + $this->ssa + $this->td + $this->mssc + $this->nsc + $this->kvp;
    }
}
