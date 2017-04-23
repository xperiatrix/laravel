<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected  $table = 'employees';


    public function workedFor() {
        return $this->hasMany('App\Company', 'employeeid', 'id');
    }
}
