<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InTag extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='intag';
    protected $primarKey='id';
    protected $fillable=['name','difference','citations','created_at','updated_at'];
    public function information()
    {
        return $this->belongsToMany('App\Model\Information','information_intag','tag_id','new_id');
    }
}
