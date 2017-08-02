<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class About extends Model
{
    use SoftDeletes,Notifiable;
    protected $table='about';
    protected $primarKey='id';
    protected $fillable=['name','headline','title','view','weight','mantle','src_img','about_content','status','sort_id','user_id','abtag_id','collection','updated_at','created_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }

    public function about_comments()
    {
        return $this->hasMany('App\Model\About_Comments','user_id','id');
    }

    public function sort_about()
    {
        return $this->belongsTo('App\Model\Sort_About','sort_id','id');
    }

    public function abtag()
    {
        return $this->belongsToMany('App\Model\AcTage','about_abtag','about_id','tag_id');
    }
}
