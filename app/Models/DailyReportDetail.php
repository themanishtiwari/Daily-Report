<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReportDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'report_id',
        'from',
        'to',
        'work_hour',
        'work'
    ];
}
