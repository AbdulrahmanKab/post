<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table ='post';

    public function department(){
    return $this->belongsTo("App\department","department_id","id");
}
}
