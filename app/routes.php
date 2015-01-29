<?php 

Route::get('/',function(){
	echo "<h2>This is Pyramid Project</h2>";
});

Route::get('tableCreate',function(){
	//用户表
	Schema::create('user',function($table){
		$table->increments('id');
		$table->string('openid');
		$table->string('nickname');
		$table->string('headimgurl');
		$table->string('name');
		$table->string('phone');
		$table->string('weixinid');
		$table->string('address');
		$table->timestamps();
	});

	//基本项目表
	Schema::create('iterm',function($table){
		$table->increments('id');
		$table->string('name');
		$table->float('target_amount');
		$table->timestamps();
	});

	//用户项目表
	Schema::create('user_iterm',function($table){
		$table->increments('id');
		$table->integer('user_id');
		$table->integer('iterm_id');
		$table->string('title');
		$table->string('intro');
		$table->string('images');
		$table->float('now_amount');
		$table->integer('start_time');
		$table->integer('end_time');
		$table->smallInteger('status');
		$table->timestamps();
	});

	//支持者表
	Schema::create('supporter',function($table){
		$table->increments('id');
		$table->integer('user_iterm_id');
		$table->integer('user_id');
		$table->float('amount');
		$table->string('message');
		$table->timestamps();
	});

});

//用户登陆路由
Route::get('login',['as'=>'login',function(){
	return View::make('common.login');
}]);

//验证手机
Route::get('verify_phone',['as'=>'verify_phone',function(){
	return View::make('common.verify_phone');
}]);

Route::post('verify_phone',function(){
	$phone_num = Input::get('phone_num');
	Session::put('verify_code',111111);
	return Response::json(['code'=>true,'info'=>'发送成功']);
});

Route::post('getVerifyCode',function(){
	return Response::json(['verify_code'=>Session::get('verify_code')]);
});

Route::get('loginPro/{user_name}',function($user_name){
	$user['nickname']   = $user_name;
	$user['openid']     = sha1($user_name);
	$user['headimgurl'] = 'http://182.92.185.246/Other/portraits/'.$user_name.'.jpg';
	Session::put('auth',$user);
	session_start();
	$url = $_SESSION['url'];
	return Redirect::to($url);
});

Route::get('item/create','ItemController@create');



