<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Information extends Model
{
    //
    use SoftDeletes,Notifiable;
    protected $table='information';
    protected $primarKey='id';
    protected $dates = ['deleted_at'];

    protected $fillable=['name','headline','title','view','weight','mantle','src_img','information_content','status','jsonsort_id','intag_id','user_id','collection','updated_at','created_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\Users','information_users','information_id','user_id');
    }

    public function information_comments()
    {
        return $this->hasMany('App\Model\Information_Comment','information_id','id');
    }

    public function sort_information()
    {
        return $this->belongsTo('App\Model\Sort_Information','sort_id','id');
    }

    public function intag()
    {
        return $this->belongsToMany('App\Model\InTag','information_intag','information_id','tag_id');
    }
}
