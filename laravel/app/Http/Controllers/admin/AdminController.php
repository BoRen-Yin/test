<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function create(){

        return view('admin.admin.create');
    }

    public function edit(Request $request){

        return view('admin.admin.edit');
    }

    public function list(){

        return view('admin.admin.list');
    }
    public function savepasswd(Request $request){

        $id = $request->input('id');
        $data['id'] = $id;
        $data['msg'] = '';

        if($request->method() == 'POST'){

            $dd = $this->validate($request,[
                'passwd'=> 'required|confirmed',

            ]);

            $passwd = md5($request->input('passwd'));
            $data = Admin::find($id);
            $data->passwd = $passwd;
            $result = $data->save();


            if($result){
                $data['msg'] = '密码修改成功！';
            }else{
                $data['msg'] = '密码修改失败！';
            }
            return view('admin.admin.savepasswd',compact('data'));
        }else{
            return view('admin.admin.savepasswd',compact('data'));
        }
    }

    public function ckpwd(Request $request){
        $id = $request->input('id');
        if($request->has('passwd')){
            $pwd = $request->input('passwd');
            $res = \App\Models\Admin\Admin::find($id);
            if($res->passwd != md5($pwd)){
                $data['msg'] = 'NO';
            }else{
                $data['msg'] = 'OK';
            }
            return response()->json($data);
        }
    }
}
