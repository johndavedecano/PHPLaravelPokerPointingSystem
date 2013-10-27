<?php 
class BlindsController extends BaseController
{
    protected $layout = 'master';
    
    public function __construct()
    {
        $this->append_js(URL::to('assets/js/libraries/parsley.js'));
        $this->append_js(URL::to('assets/js/libraries/jquery.dataTables.min.js'));       
        $this->append_js(URL::to('assets/js/global.js')); 
        $this->append_js(URL::to('assets/js/blinds.js'));
        $this->set_icon('trophy');
    }
    
    public function blinds()
    {
        View::share('page_title','Blinds');
        $this->data['blinds'] = Blind::orderBy('conversion','desc')->get();
        $this->layout->content = View::make('partials.blinds',$this->data);
    }
    
    public function create()
    {
        View::share('page_title','Add Blind');
        $this->layout->content = View::make('partials.blinds_create',$this->data);
    }
    
    public function create_post()
    {
        $rules = array(
            'name'          => 'required|unique:blinds,name',
            'conversion'    => 'numeric'
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('blinds/create')->withErrors($validator)->withInput();
        }else{
            $blind =  new Blind;
            $blind->name = strtolower(Input::get('name'));
            $blind->conversion = intval(Input::get('conversion'));
            $blind->save();
            return Redirect::to('blinds/create')->with('success','Blind has been successfully created.');
        }
    }
    
    public function update($blind_id)
    {
        if(Blind::exits($blind_id) == false){ return Redirect::to('blinds')->with('error','Blind doenst exists.');}
        $this->data['blind'] = Blind::find($blind_id);
        View::share('page_title','Update Blind');
        $this->layout->content = View::make('partials.blinds_update',$this->data);
    }
    
    public function update_post($blind_id)
    {
        $this->layout = '';
        if(Blind::exits($blind_id) == false){ return Redirect::to('blinds')->with('error','Blind doenst exists.');}
        $rules = array(
            'name'          => 'required|unique:blinds,name,'.$blind_id,
            'conversion'    => 'numeric'
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('blinds/update/'.$blind_id)->withErrors($validator)->withInput();
        }else{
            $blind =  Blind::find($blind_id);
            $blind->name = strtolower(Input::get('name'));
            $blind->conversion = intval(Input::get('conversion'));
            $blind->save();
            return Redirect::to('blinds')->with('success','Blind has been successfully updated.');
        }  
    }
    
    public function delete()
    {
        $this->layout = '';
        if(Request::ajax())
        {
            $blind_id = Input::get('id');
            if($blind_id != 1){
                $blind = Blind::find($blind_id);
                $blind->delete();
                echo 1;
            }else{
                echo "You cannot delete a default membership blind.";
            }
            
        }else{ App::abort('401'); }
    }
}