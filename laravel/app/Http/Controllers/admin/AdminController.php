<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.admin.list');
    }
    public function create(Request $request){
        if($request->method() == 'POST'){

            $this->validate($request,[
                'user'=> 'required|min:1|max:30',
                'passwd'=> 'required|min:1|max:30',
                'email' => 'email|required',
                'uname'=> 'required|min:1|max:30'
            ]);
            $model = new Admin();
            $model->user = $request->input('user');
            $model->passwd = md5($request->input('passwd'));
            $model->email = $request->input('email');
            $model->uname = $request->input('uname');
            $model->auth_id = $request->input('auth_id');
            $model->status = $request->input('status');
            $model->reg_time = time();
            $res = $model->save();
            if($res){
                $result['status'] = 1;
                $result['msg'] = '添加管理员成功！';
                return $result;
            }else{
                $result['status'] = 0;
                $result['msg'] = '添加管理员失败！';
                return $result;
            }
        }else{
            return view('admin.admin.create');
        }

    }


    public function edit(Request $request){

        if($request->method() == 'POST'){

            $this->validate($request,[
               'email' => 'email|required',
                'uname'=> 'required|min:1|max:30'
            ]);
            $id = $request->input('id');
            $res = Admin::where('id',$id)->update([
                'uname'=>$request->input('uname'),
                'email'=>$request->input('email'),
                'status'=> $request->input('status'),
            ]);

            if($res){
                $result['status'] = 1;
                $result['msg'] = '更新个人资料成功！';
                return $result;
            }else{
                $result['status'] = 0;
                $result['msg'] = '更新个人资料失败！';
                return $result;
            }
        }else{
            $id = $request->input('id');
            $data = Admin::find($id);
            return view('admin.admin.edit',compact('data'));
        }

    }
    public function editifm(Request $request){

        return view('admin.admin.editifm');
    }
    public function list(Request $request){

        $limit = $request->input('limit');

        $data = Admin::paginate($limit)->toArray();
        for ($i=0;$i<count($data['data']);$i++){
            $data['data'][$i]['reg_time'] = date("Y-m-d H:i:s",$data['data'][$i]['reg_time']);
            $data['data'][$i]['log_time'] = date("Y-m-d H:i:s",$data['data'][$i]['log_time']);
        }

        $arr = $data['data'];



        $list =[
              "code"=> 0,
              "msg"=> "获取成功",
              "count"=> Admin::count(),
              "data"=>$arr
        ];
        return $list;



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
