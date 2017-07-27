<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Activities_Comments extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='activities_comments';
    protected $primarKey='id';
    protected $fillable=['comment','user_id','sort_id'];

    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }
    public function activities()
    {
        return $this->belongsTo('App\Model\Activities','sort_id','id');
    }

}
