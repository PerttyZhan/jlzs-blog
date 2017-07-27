<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class About extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='about';
    protected $primarKey='id';
    protected $dates = ['deleted_at'];
}
