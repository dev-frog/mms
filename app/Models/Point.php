<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $table = 'points';

     public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
