<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Captcha;
use DB;
use Session;
use Cache;



class IndexController extends Controller
{
    //
    public function index(){
        //dd(Session::all());
        $id = Session::get('admin_user')->id;
        $auth = \App\Models\Admin\Admin::find($id)->admin_auth;
        Session::put('admin_auth',$auth->auth_name);
        return view('admin.index',compact('id'));
    }
    public function main(){

        $data['author'] = 'Yin';
        $data['laravel_version'] = \Illuminate\Foundation\Application::VERSION;
        $data['php_version'] = PHP_VERSION;
        $data['php_os'] = PHP_OS;
        $data['php_fd_setsize'] = PHP_FD_SETSIZE;
        $data['userrights'] = Session::get('admin_auth');
        $data['homePage'] = url('/index');
        $v = "version()";
        $data['dataBase'] = DB::select("select version()")[0]->$v;

        return view('admin.main',compact('data'));
    }
    public function login(Request $request){
        $msg = '';
        $method = $request->method();
        if($method == 'POST'){
            $this->validate($request,[
               'captcha'=>'required|captcha',
               'user'=>'required|min:2|max:20',
               'passwd'=>'required|min:6|max:100',
            ]);
            $user = $request->input('user');
            $passwd = $request->input('passwd');

            $res = \App\Models\Admin\Admin::where('user',$user)->where('passwd',md5($passwd))->where('status','=','1')->first();

            if($res){
                //dd($res);
                Session::put('admin_user',$res);

                return redirect('/admin/index');
            }else{
                $msg = "账号或密码错误";
                return view('admin.login',compact('msg'));
            }
            //dd($res);
        }else{
            return view('admin.login',compact('msg'));
        }

    }
    public function logout(){
        session()->flush();
        $data ['url']= '/admin/login';
        $data ['msg']= '您已成功退出管理后台';
        return response()->json($data);

    }
    public function cache_flush(){
        $res = Cache::flush();
        if($res){
            $data ['msg']= '缓存清除成功！';
        }else{
            $data ['msg']= '缓存清除失败！';
        }
        return response()->json($data);
    }

}
