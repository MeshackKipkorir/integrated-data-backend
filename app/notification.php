<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class notification extends Model
{
    //
    protected $table = 'notification';
    use Notifiable;
    protected $fillable = [
        'email','title','job_id'
    ];
}
