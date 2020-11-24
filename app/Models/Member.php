<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = "members";
    protected $fillable = ["first_name","last_name","phone_number","email","card_number"];

    public function point()
    {
        return $this->hasOne('App\Models\Point');
    }

}
