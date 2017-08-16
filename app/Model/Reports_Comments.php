<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Reports_Comments extends Model
{
    //
    use SoftDeletes,Notifiable;
    protected $table='reports_comments';
    protected $primarKey='id';
    protected $fillable=['comment','user_id','comment_id','create_at','update_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }
    public function reports()
    {
        return $this->belongsTo('App\Model\Report','comment_id','id');
    }





}
