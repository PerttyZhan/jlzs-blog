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
    protected $fillable=['name','headline','title','view','weight','content','sort_id','img_src','status','sort_id','tag_id','collection','user_id','updated_at','created_at'];


    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }
    public function activities_img()
    {
        return $this->hasMany('App\Model\Activities_Image','activities_id','id');
    }
    public function activities_comments()
    {
        return $this->hasMany('App\Model\Activities_Comments','comment_id','id');
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
