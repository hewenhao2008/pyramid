<?php 

class UserController extends BaseController{
	function index(){
		// $uri = Request::path();
		// //获取
		// $method = Request::method();
		// $is = Request::is('user/*');
		// $url = Request::url();
		// $segment = Request::segment(2);
		// $header = Request::header();
		// $server = Request::server();
		// $is_safe = Request::secure();
		// var_dump($is_safe);
		// return $method;

		//视图部分例子
		// $response = Response::make("<xml>Hello world</xml>",200);
		// $response->header('Content-Type','text/xml');
		// return $response;
		// $cookie = Cookie::make('name','xialibo');
		// return Response::view('index')->header('Content-Type', 'text/html')->withCookie($cookie);
		// return Redirect::to('page')->with('pageName','LoginPage');
		// $url = URL::route('login');
		// var_dump($url);
		// return Redirect::route('login',array('version'=>'1.01'));
		// return Redirect::action('UserController@hello');
		return View::make('greeting')->with('name','Bruce');
	}


	function getIndex(){
		return "Hello This is Index Page...";
	}

	function anyHello(){
		return 'This is Hello Page...';
	}

	function database(){
		// $user = DB::select('select * from data where id = ?',array(1));
		// $is_add = DB::insert('insert into data (name,age,address) values (?,?)',array('zhangsan',20,'安徽省'));
		// $is_update = DB::update('update data set age = ? where name = ?',array(21,'zhangsan'));
		// $is_del = DB::delete('delete from data where name = ?',array('zhangsan'));
		// DB::transaction(function(){
		// 	DB::delete('delete from user where id = 3');
		// 	DB::insert('insert into goods (name) values ("lolipop")');
		// });
		// echo "done!!!";
		// $user = DB::table('user')->select('name','age')->get();
		// $query = DB::table('user')->select('name');
		// $user = $query->addSelect('age')->get();
		// var_dump($user);
		// $res = DB::table('user')->insert(array('name'=>'HAHA','age'=>34,'address'=>'Beijin'));
		// $res = DB::table('user')->insertGetId(array('name'=>'XIXI','age'=>34,'address'=>'NANJIN'));
		// $res = DB::table('user')->insert(array(
		// 	array('name'=>'Bruce','age'=>33,'address'=>'CHANGCHUN'),
		// 	array('name'=>'Mike','age'=>34,'address'=>'SHENYANG')
		// ));
		// $res = DB::table('user')->where('id','6')->update(array('name'=>'PUPU'));
		// $res = DB::table('user')->where('id',5)->increment('age');
		// $res = DB::table('user')->where('id',5)->delete();
		var_dump($res);
	}

}