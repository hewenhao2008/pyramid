<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//用户表
		Schema::create('user',function($table){
			$table->increments('id');
			$table->string('openid');
			$table->integer('remain_money');
			$table->string('nickname');
			$table->string('headimgurl');
			$table->string('name');
			$table->string('phone');
			$table->string('weixinid');
			$table->string('address');
			$table->timestamps();
		});

		//项目表
		Schema::create('item',function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('target');
			$table->string('allowed');
			$table->string('title');
			$table->string('intro');
			$table->string('images');
			$table->integer('now_amount');
			$table->integer('start_time');
			$table->integer('end_time');
			$table->string('QR_code');
			$table->integer('status');
			$table->timestamps();
		});
		//支持者表
		Schema::create('supporter',function($table){
			$table->increments('id');
			$table->integer('iterm_id');
			$table->integer('user_id');
			$table->float('amount');
			$table->string('message');
			$table->integer('status');
			$table->timestamps();
		});
		//申请提现
		Schema::create('apply',function($table){
			$table->increments('id');
			$table->integer('user_id');
			$table->string('alipay_ID');
			$table->string('truename');
			$table->integer('amount');
			$table->integer('status');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
