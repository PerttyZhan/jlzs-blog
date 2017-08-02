<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Sort_About extends Model
{
    use SoftDeletes,Notifiable;
    protected $table='sort_about';
    protected $primarKey='id';
    protected $fillable=['sort','created_at','updated_at'];

    public function about()
    {
        return $this->hasOne('App\Model\About','sort_id','id');
    }
}
