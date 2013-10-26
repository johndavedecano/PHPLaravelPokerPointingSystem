<?php

class BaseController extends Controller {

    /**
     * Public current user
     */	
    public $data = array(
        'scripts' => array(),
        'csheets' => array(),
        'icon'    => ''
    );
    
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
            View::share('scripts',$this->data['scripts']);
            View::share('csheets',$this->data['csheets']);
            View::share('page_icon',$this->data['icon']);
            View::share('page_title','');
            $this->layout = View::make($this->layout,$this->data);
		}
	}
    /**
     * Append CSS Files
     */
     protected function append_css($file)
     {
        if(is_array($file))
        {
            foreach($file as $f)
            {
                $this->data['csheets'][] = $f;
            }
        }else{
            $this->data['csheets'][] = $file;
        }
        
     }
     /**
      * Append JS
      */
     protected function append_js($file)
     {
        if(is_array($file))
        {
            foreach($file as $f)
            {
                $this->data['scripts'][] = $f;
            }
        }else{
            $this->data['scripts'][] = $file;
        }
     }
     /**
      * Set Page Icon
      */
     protected function set_icon($icon)
     {
        $this->data['icon'] = $icon;
     }

}