<?php

class BaseController extends Controller {


	protected function _construct()
	{
		$this ->beforeFilter('csrf', array(' on' => 'post'));

	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

///---Special method that gets triggered if the user enters a URL for a method that does not exist///


	public function missingMethod($parameters = array()) {
		return 'Method "'.$parameters[0].'" not found';
	}


}
