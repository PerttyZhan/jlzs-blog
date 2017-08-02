<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information_Comment extends Model
{
    //
    protected $table='information_comments';
    protected $primarKey='id';
    protected $fillable=['comment','user_id','information_id','create_at','update_at'];

    public function users()
    {
        return $this->belongsTo('App\Model\Users','user_id','id');
    }
    public function activities()
    {
        return $this->belongsTo('App\Model\Activities','information_id','id');
    }

}
