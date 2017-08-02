<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class AcTage extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='actag';
    protected $primarKey='id';
    protected $fillable=['name','citations','created_at','updated_at'];
    public function activities()
    {
        return $this->belongsToMany('App\Model\Activities','activities_actag','tag_id','activities_id');
    }
}
