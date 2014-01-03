<?php

class BaseController extends Controller {

	public function __construct()
	{
		// Perform CSRF check on all post/put/patch/delete requests
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
