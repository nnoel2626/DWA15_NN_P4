<?php

class BaseController extends Controller {


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	//protected function _construct()
	//{
		//$this ->beforeFilter('csrf', array(' on' => 'post'));

	//}

}
