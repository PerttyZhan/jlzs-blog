<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class AbTage extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='abtag';
    protected $primarKey='id';
    protected $fillable=['name','citations','created_at','updated_at'];
    public function activities()
    {
        return $this->belongsToMany('App\Model\About','about_abtag','tag_id','about_id');
    }
}
