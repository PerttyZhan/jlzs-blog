<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InTag extends Model
{
    //
    protected $table='intag';
    protected $primarKey='id';
    protected $fillable=['name','created_at','updated_at'];
    public function information()
    {
        return $this->belongsToMany('App\Model\Information','information_intag','tag_id','information_id');
    }
}
