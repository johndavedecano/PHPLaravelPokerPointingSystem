<?php

class DashboardController extends BaseController
{
    protected $layout = 'master';
    
	public function dashboard()
	{
        View::share('page_title','Dashboard');
        View::share('page_icon','home');
        $this->layout->content = View::make('partials.dashboard',$this->data);
	}

}