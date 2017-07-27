<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Sort_Information extends Model
{
    //
    use SoftDeletes,Notifiable;
    //
    protected $table='sort_information';
    protected $primarKey='id';
    protected $fillable=['sort','created_at','updated_at'];

    public function information()
    {
        return $this->hasOne('App\Model\Information','sort_id','id');
    }
}
