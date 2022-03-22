<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobNotification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function positions(){
        return $this->belongsToMany(Position::class, 'job_notification_position', 'job_notification_id', 'position_id');
    }
}
