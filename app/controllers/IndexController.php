<?php 

	class IndexController extends Controller{
		public function index(){
			Session::put('time',time());
			return Redirect::route('IndexController_index');
		}
	}

 ?>