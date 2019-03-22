<?php

namespace fms;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'matter_id',
      'task_name',
      'task_date',
      'task_description',
      'created_by'
    ];

    public function matters()
    {
        return $this->belongsTo('fms\Matter', 'matter_id');
    }
}
