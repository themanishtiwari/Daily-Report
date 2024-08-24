<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable =[
        'user_id',
        'work_hour',
        'date',
    ];

    function details(){
        return $this->hasMany(DailyReportDetail::class, 'report_id', 'id');
    }
}
