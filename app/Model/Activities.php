<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Activities extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='activities';
    protected $primarKey='id';
    protected $fillable=['name','headline','title','view','weight','mantle','src_img','active_content','sort_id','status','sort_id','intag_id','collection','user_id','updated_at','created_at'];


    public function users()
    {
        return $this->belongsTo('App\Model\Users','activities_users','user_id','id');
    }
    public function activities_comments()
    {
        return $this->hasMany('App\Model\Activities_Comments','activities_id','id');
    }
    public function sort_activities()
    {
        return $this->belongsTo('App\Model\Sort_Activities','sort_id','id');
    }

    public function actag()
    {
        return $this->belongsToMany('App\Model\AcTage','activities_actag','activities_id','tag_id');
    }
}
