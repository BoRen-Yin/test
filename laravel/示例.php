<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//命名空间的三元素：常量、方法、类
use DB;
//引入模型
use App\Home\Member;

use Session;

use Cache;

class TestController extends Controller
{
    //
    public function test1(){
    	return phpinfo();
    }


    public function test2(Request $request){
    	dd($request->all());
    	echo '<br>';

    }

    public function add(){
    	$db = DB::table("member");
    	$rst1 = $db -> insert([
    		[
    			'name' =>  '张三',
    			'age'  =>  '23',
    			'email'=>  'zhangsan@qq.com'
    		],
    		[
    			'name' =>  '李四',
    			'age'  =>  '24',
    			'email'=>  'lisi@qq.com'
    		],
    		[
    			'name' =>  '王五',
    			'age'  =>  '23',
    			'email'=>  'wangwu@qq.com'
    		]

    	]);
    	dd($rst1);
    }

    public function del(){
    	$db = DB::table("member");
    	$rs = $db ->where('id','=','8')-> delete();
    	dd($rs);
    }


    public function update(){
    	$db = DB::table("member");
    	$rst = $db-> where('id','=','6') ->update([
    		'name' => '张三丰'
    	]);
    	dd($rst);
    }

    public function select(){
    	$db = DB::table("member");
    	// $rs = $db->get();
    	//dd($rs);

    	//循环操作
    	// foreach ($rs as $key => $value) {
    	// 	# code...
    	// 	echo "id是：{$value->id},名字是：{$value->name},年龄是:{$value->age},邮箱是：{$value->email}<br/>";
    	// 	//dd($value);
    	// }

    	//取出一条
    	//$rs = $db ->first();
    	//$rs = $db -> where('id','>','6') -> first();

    	$rs = $db -> where('id','>','6') -> get();
    	dd($rs);
    }



    public function test3(){
    	//$data = array('title' => '这是首页','body'=>'这是内容' );
    	//compact打包数组

    	$title = '这是首页';
    	$body = '这是内容';
    	$time = strtotime('+1 year');
    	//return view('home.test');

    	//return view('home.test',['data' => $data]);
    	return view('home.test', compact('title','body','time'));

    	//return view('home.test')->with(['data' => $data]);
    }


    public function test4(){
    	$data = DB::table('member')->get();

    	return view('home.test.test4',compact('data'));
    }

    public function test5(){
    	return view('home.test.test5');
    }

    public function test8(Request $request){
    	$model = new Member();
    	// $data = $model->get();
    	// dd($data);
    	//添加方法一
    	// $model->name = "娃哈哈";
    	// $model->age = "25";
    	// $model->email = "wahaha@qq.com";
    	// $result = $model->save();
    	// dd($result);
    	//添加方法二
    	$post = $request ->all();
    	$result = $model->create($post);
    	dd($result);




    }
    //查询
    public function test9(){
    	$data = Member::find(9)->toArray();//结果集转为数组
    	dd($data);


    }

    public function test10(){
    	//AR模式修改
    	// $data = Member::find(9);

    	// $data->email = "admin@qq.com";
    	// $result = $data->save();
    	// dd($result);

    	//update方法
    	$result = Member::where('id','9')->update([
    		'age'=> 20
    	]);
    	dd($result);
    }

    public function test11(){
    	//AR模式删除
    	$data = Member::find(9);
    	$result = $data->delete();
    	dd($result);


    }
    public function test12(){
    	return view('home.test.test12');
    }

    //自动验证

    public function test13(Request $request){
    	$method = $request->method();
    	//echo $method;
    	if($method == 'POST'){
    		//自动验证
    		$this-> validate($request,[
    			//具体规则

    			//字段 => 验证规则1|验证规则2|....
    			'name' => 'required|min:2|max:20',
    			'age'  => 'required|integer|min:1|max:100',
    			'email'=> 'required|email'
    		]);


    		dd("提交成功");

    	}else{
    		return view('home.test.test13');
    	}



    }
    //文件上传
    public function test14(Request $request){
    	$method = $request->method();
    	if($method == 'POST'){
    		//上传
    		//1.判断是否空&&是否上传成功
    		if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
    			//dd($request->getClientOriginalName())
    			$path = md5(time().rand(100000,999999)).'.'.$request->file('avatar')->getClientOriginalExtension();
    			$request -> file("avatar") -> move('./uploads',$path);
    			$data = $request->all();
    			$data['avatar'] = './uploads/'.$path;

    			$result = Member::create($data);
    			dd($result);
    		}


    	}else{
    		return view('home.test.test14');
    	}


    }

    //分页
    public function test15(){
    	$data = Member::paginate(1);
    	return view('home.test.test15',compact('data'));
    }

    //验证码
    public function test16(Request $request){

    	$method = $request->method();
    	if($method == 'POST'){

    		//自动验证
    		$this-> validate($request,[
    			//具体规则

    			//字段 => 验证规则1|验证规则2|....
    			'name' => 'required|min:2|max:20',
    			'age'  => 'required|integer|min:1|max:100',
    			'email'=> 'required|email',
    			'captcha' => 'required|captcha'
    		]);


    		dd("提交成功");

    	}else{
    		return view('home.test.test16');
    	}

    }


     //ajax展示
    public function test17(){

    	return view('home.test.test17');
    }
     //ajax响应
    public function test18(){
    	$data = Member::get();
    	//json响应
    	//return json_decode($data);
    	return response() -> json($data);
    }
    //session
    public function test19(){
    	Session::put('key','val');//存储数据到 Session
    	Session::has('key');//是否有这个session
    	Session::get('key');//获取这个session
    	Session::all();//获取所有的 Session 数据
    	Session::pull('key','default');//pull 方法可以只使用一条语句就从 Session 中检索并删除一条语句
    	Session::forget('key');//删除单个值...
    	Session::flush();//清空

    }

    //Cache
    public function test20(){
    	Cache::put('key','val','time');//创建一个缓存
    	Cache::put('class','laravel',10);
    	Cache::add('addr','你是谁',10);

    	//永久存储（并不是真的永久，时间比较大）
    	Cache::forever('key','val');
    	Cache::get('key');//获取指定的值
    	Cache::get('key','这个家伙很懒，什么也米有留下...');//获取指定的值,如果不存在使用默认值
    	Cache::has('key');//是否存在
    	Cache::pull('key');//一次性存储
    	Cache::forget('key');//直接删除
    	Cache::flush();//全部删除
    	//常用  add/put、get、has、forget、flush、remember


    }
    //一对一
     public function test21(){

     }

     //一对多
     public function test22(){

     }

     //多对多
     public function test23(){

     }



}
