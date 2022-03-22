<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function job_notifications(){
        return $this->belongsToMany(JobNotification::class, 'job_notification_position', 'position_id', 'job_notification_id');
    }
}
