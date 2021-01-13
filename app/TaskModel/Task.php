<?php

namespace App\TaskModel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $table = "tasks";
    protected $primaryKey = "id";

    protected $fillable = [
        'owner', 'task', 'date', 'start_time', 'end_time',
    ];


    public function setOwnerAttribute($value)
    {
        $this->attributes['owner'] = strtolower($value);
    }

    public function getOwnerAttribute($value)
    {
        return ucwords($value);
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i a');
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i a');
    }


}
