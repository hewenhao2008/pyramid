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

Route::get('user',function(){
	return View::make('user');
});