<?php 

	class IndexController extends Controller{
		public function say(){
			return "hello world111";
		}
		public function user($name){
			return $name;
		}
	}

 ?>