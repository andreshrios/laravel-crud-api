<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'consecutive',
        'activity_name',
        'start_time',
        'cultural_right_id',
        'monitor_id',
        'expertise_id',
        'activity_date',
        'final_hour',
        'nac_id'
    ];

    protected $appends = ['format_start_time', 'format_final_hour', 'format_updated_at'];

    public function getFormatStartTimeAttribute()
    {
        $date = Carbon::createFromDate($this->start_time);

        return $date->format('h:i A');;
    }

    public function getFormatFinalHourAttribute()
    {
        $date = Carbon::createFromDate($this->final_hour);

        return $date->format('h:i A');;
    }

    public function getFormatUpdatedAtAttribute()
    {
        $date = Carbon::createFromDate($this->updated_at);

        return $date->format('y-m-d h:i A');;
    }

    public function cultural_right()
    {
        return $this->belongsTo(CulturalRight::class);
    }

    public function monitor()
    {
        return $this->belongsTo(Monitor::class);
    }

    public function expertise()
    {
        return $this->belongsTo(Expertise::class);
    }

    public function nac()
    {
        return $this->belongsTo(Nac::class);
    }
}
