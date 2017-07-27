<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Sort_Report extends Model
{
    use SoftDeletes,Notifiable;
    //
    protected $table='sort_reports';
    protected $primarKey='id';
    protected $fillable=['sort','created_at','updated_at'];

    public function reports()
    {
return $this->hasOne('App\Model\Report','sort_id','id');
 }
}
