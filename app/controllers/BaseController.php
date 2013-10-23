<?php

class BaseController extends Controller {

    /**
     * Public current user
     */	
    public $data = array();
    
    public function __construct()
    {
        if (Sentry::check())
        {
            // User is not logged in, or is not activated
             $this->data['admin'] = Sentry::getUser();
        }
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