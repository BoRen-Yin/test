<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //定义模型关联的数据表（一个模型只操作一个表）
    protected $table = 'admin';

    //定义主键
    protected $primarykey = 'id';

    //定义禁止操作时间
    public $timestamps = false;

    //定义允许写入的数据字段
    //protected $fillable = ['id','user','passwd','uname','email','auth_id','status'];

    //一对一关联
    public function admin_auth(){
        return $this->hasOne('App\Models\Admin\Admin_Auth','id','auth_id');
    }



}
