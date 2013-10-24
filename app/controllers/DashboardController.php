<?php

class DashboardController extends BaseController
{
    protected $layout = 'master';
    
	public function dashboard()
	{
        $this->layout->content = View::make('partials.dashboard',$this->data);
	}

}