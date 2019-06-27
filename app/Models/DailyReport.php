<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'contents',
        'reporting_time',
        'deleted_at',
        'user_id'  
    ]; 

    protected $dates = [
        'reporting_time',
    ];

    public function getAll($id)
    {
        return $this->where('user_id', $id)->get();
    }

}
