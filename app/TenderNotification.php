<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TenderNotification extends Model
{
    //
    protected $table = 'tender_notification';
    use Notifiable;
    protected $fillable = [
        'email','title','tender_id'
    ];
}
