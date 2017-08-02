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
    protected $fillable=['name','headline','title','view','weight','mantle','src_img','report_content','status','sort_id','user_id','retag_id','collection','updated_at','created_at'];

    public function users()
    {
        return $this->belongsToMany('App\Model\Users','report_users','report_id','user_id');
    }

    public function reports_comments()
    {
        return $this->hasMany('App\Model\Reports_Comments','reports_id','id');
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
