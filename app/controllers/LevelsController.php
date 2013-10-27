<?php 
class LevelsController extends BaseController
{
    protected $layout = 'master';
    
    public function __construct()
    {
        $this->append_js(URL::to('assets/js/libraries/parsley.js'));
        $this->append_js(URL::to('assets/js/libraries/jquery.dataTables.min.js'));       
        $this->append_js(URL::to('assets/js/global.js')); 
        $this->append_js(URL::to('assets/js/levels.js'));
        $this->set_icon('trophy');
    }
    
    public function levels()
    {
        View::share('page_title','Levels');
        $this->data['levels'] = Level::orderBy('conversion','desc')->get();
        $this->layout->content = View::make('partials.levels',$this->data);
    }
    
    public function create()
    {
        View::share('page_title','Add Level');
        $this->layout->content = View::make('partials.levels_create',$this->data);
    }
    
    public function create_post()
    {
        $rules = array(
            'name'          => 'required|unique:levels,name',
            'conversion'    => 'numeric'
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('levels/create')->withErrors($validator)->withInput();
        }else{
            $level =  new Level;
            $level->name = strtolower(Input::get('name'));
            $level->conversion = intval(Input::get('conversion'));
            $level->save();
            return Redirect::to('levels/create')->with('success','Level has been successfully created.');
        }
    }
    
    public function update($level_id)
    {
        if(Level::exits($level_id) == false){ return Redirect::to('levels')->with('error','Level doenst exists.');}
        $this->data['level'] = Level::find($level_id);
        View::share('page_title','Update Level');
        $this->layout->content = View::make('partials.levels_update',$this->data);
    }
    
    public function update_post($level_id)
    {
        $this->layout = '';
        if(Level::exits($level_id) == false){ return Redirect::to('levels')->with('error','Level doenst exists.');}
        $rules = array(
            'name'          => 'required|unique:levels,name,'.$level_id,
            'conversion'    => 'numeric'
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('levels/update/'.$level_id)->withErrors($validator)->withInput();
        }else{
            $level =  Level::find($level_id);
            $level->name = strtolower(Input::get('name'));
            $level->conversion = intval(Input::get('conversion'));
            $level->save();
            return Redirect::to('levels')->with('success','Level has been successfully updated.');
        }  
    }
    
    public function delete()
    {
        $this->layout = '';
        if(Request::ajax())
        {
            $level_id = Input::get('id');
            if($level_id != 1){
                if(Level::has_members($level_id) == false)
                {
                    $level = Level::find($level_id);
                    $level->delete();
                    echo 1;
                    
                }else { echo "You cannot delete a membership level that still has members associated with it."; }
            }else{
                echo "You cannot delete a default membership level.";
            }
            
        }else{ App::abort('401'); }
    }
}