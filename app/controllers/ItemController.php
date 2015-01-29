<?php 
	
	class ItemController extends BaseController {

		public function create(){
			return View::make('item.choose_faction');
		}
	}