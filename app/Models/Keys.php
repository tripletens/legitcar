<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keys extends Model
{
    use HasFactory;

    public $fillable = ['user_id','value','status', 'type'];

    public function user () {
        $this->belongsTo('users');
    }
}
