<?php 
class MembersController extends BaseController
{
    protected $layout = 'master';
    
    public function __construct()
    {
        $this->set_icon('group');
        $this->append_css(URL::to('assets/css/zebra/metallic.css'));
        $this->append_js(URL::to('assets/js/libraries/zebra_datepicker.js'));
        $this->append_js(URL::to('assets/js/libraries/parsley.js'));
        $this->append_js(URL::to('assets/js/libraries/jquery.dataTables.min.js'));       
        $this->append_js(URL::to('assets/js/global.js')); 
        $this->append_js(URL::to('assets/js/members.js'));
        $this->data['levels'] = Level::all();
    }
    
    public function members()
    {
        View::share('page_title','Memberes');
        $this->data['members'] = Member::where('deleted','=',0)->get();
        $this->layout->content = View::make('partials.members',$this->data);
    }
    
    public function create()
    {
        View::share('page_title','Add Member');
        $this->layout->content = View::make('partials.members_create',$this->data);
    }
    
    public function create_post()
    {
       $this->layout = '';

        $rules = array(
            'email'     => 'email|unique:members,email',
            'first_name'=> 'required',
            'last_name' => 'required',
            'photo'     => 'image|mimes:jpeg,bmp,png|max:2000'  
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('members/create')->withErrors($validator)->withInput();
        }else{
                
                if(Level::exits(Input::get('level_id')))
                {
                    $filename = '';
                    if(Input::hasFile('photo')){
                        $file = Input::file('photo');             
                        $filename = Input::file('photo')->getClientOriginalName();
                        $extension = substr(strrchr($filename,'.'),1);
                        $newname = strtolower(md5(date("Y-m-d H:i:s")).'.'.$extension);
                        $uploadStatus = Input::file('photo')->move(public_path('uploads/photos'),$newname);
                        if($uploadStatus){ $filename = $newname; }   
                    }
                
                    $member = new Member;
                    $member->level_id     = Input::get('level_id'); 
                    $member->email        = Input::get('email');
                    $member->first_name   = Input::get('first_name');
                    $member->last_name    = Input::get('last_name');
                    $member->dob          = Input::get('dob');
                    $member->address      = Input::get('address');
                    $member->gender       = Input::get('gender');
                    $member->phone        = Input::get('phone');
                    $member->skype        = Input::get('skype');
                    $member->points       = Input::get('points');
                    $member->photo        = $filename;
                    $member->save(); 
                }  
                return Redirect::to('members/create')->with('success','Member account has successfully created.');
        } 
    }
    
    public function update($member_id)
    {
        if(Member::exists($member_id) == false){ return Redirect::to('members')->with('error','Member doesnt exists.');}
        $this->data['member'] = Member::find($member_id);
        View::share('page_title','Update Member');
        $this->layout->content = View::make('partials.members_update',$this->data);
    }
    
    public function update_post($member_id)
    {
       $this->layout = '';
       
        if(Member::exists($member_id) == false){ return Redirect::to('members')->with('error','Member doesnt exists.');}
        $member = Member::find($member_id);

        $rules = array(
            'email'     => 'email|unique:members,email,'.$member_id,
            'first_name'=> 'required',
            'last_name' => 'required',
            'photo'     => 'image|mimes:jpeg,bmp,png|max:2000'  
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('members/update/'.$member_id)->withErrors($validator)->withInput();
        }else{
                
                if(Level::exits(Input::get('level_id')))
                {
                    $filename = $member->photo;
                    if(Input::hasFile('photo')){
                        $file = Input::file('photo');             
                        $filename = Input::file('photo')->getClientOriginalName();
                        $extension = substr(strrchr($filename,'.'),1);
                        $newname = strtolower(md5(date("Y-m-d H:i:s")).'.'.$extension);
                        $uploadStatus = Input::file('photo')->move(public_path('uploads/photos'),$newname);
                        if($uploadStatus){ $filename = $newname; }   
                    }
                
                    $member = Member::find($member_id);
                    $member->level_id     = Input::get('level_id'); 
                    $member->email        = Input::get('email');
                    $member->first_name   = Input::get('first_name');
                    $member->last_name    = Input::get('last_name');
                    $member->dob          = Input::get('dob');
                    $member->address      = Input::get('address');
                    $member->gender       = Input::get('gender');
                    $member->phone        = Input::get('phone');
                    $member->skype        = Input::get('skype');
                    $member->photo        = $filename;
                    $member->save(); 
                }  
                return Redirect::to('members')->with('success','Member account has successfully updated.');
        } 
    }
    
    public function delete()
    {
        $this->layout = '';
        if(Request::ajax())
        {
            $member = Member::find(Input::get('id'));
            $member->delete();
            echo 1;
            
        }else{ App::abort('401'); }
    }
}