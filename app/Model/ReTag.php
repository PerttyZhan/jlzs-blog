<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ReTag extends Model
{
    //
    use SoftDeletes,Notifiable;
    protected $table='retag';
    protected $primarKey='id';
    protected $fillable=['name','create_at','update_at'];
    public function report()
    {
        return $this->belongsToMany('App\Model\Report','report_retag','report_id','tag_id');
    }


}
