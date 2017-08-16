<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Report extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='reports';
    protected $primarKey='id';
    protected $fillable=['name','headline','title','view','weight','content','img_src','status','sort_id','user_id','tag_id','collection','updated_at','created_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }
    public function reports_comments()
    {
        return $this->hasMany('App\Model\Reports_Comments','comment_id','id');
    }

    public function sort_reports()
    {
     return $this->belongsTo('App\Model\Sort_Report','sort_id','id');
    }

    public function retag()
    {
        return $this->belongsToMany('App\Model\ReTag','report_retag','report_id','tag_id');
    }

}
