<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = "company";


    public function comesFrom() {

        // belongsTo 第二个参数是拿自己这个模型表的 哪个字段 去匹配 要关联的Employ表里的主键ID
        return $this->belongsTo('App\Employees', 'employeeid');  // belongsTo is a method that means One-To-One Mapping

                                                   // there is other way : $this->belongsToMany(....)
    }

    public function test() {
        echo "xxx-test";
    }
}
