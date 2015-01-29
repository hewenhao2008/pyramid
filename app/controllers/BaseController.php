<?php

class BaseController extends Controller {
	protected $_auth;
	protected $_user;
	function __construct(){	
		session_start();
		$_SESSION['url'] = URL::full();
		$auth = Session::get('auth');
		if (empty($auth)) {
			return Redirect::to('login')->send();
		}
		$this->_auth = $auth;
		$this->_user = User::where('openid',$this->_auth['openid'])->first();
	}

}
