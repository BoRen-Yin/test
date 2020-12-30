<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_Auth extends Model
{
    //定义模型关联的数据表（一个模型只操作一个表）
    protected $table = 'admin_auth';
    //定义主键
    protected $primaryKey = 'id';
    //定义允许写入的数据字段
    //protected $fillable=['auth_name','status'];
    //定义禁止操作时间
    public $timestamps=false;

}
