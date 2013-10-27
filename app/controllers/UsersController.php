<?php 
class UsersController extends BaseController
{
    protected $layout = 'master';
    
    public function __construct()
    {
        $this->set_icon('user');
        $this->append_css(URL::to('assets/css/zebra/metallic.css'));
        $this->append_js(URL::to('assets/js/libraries/zebra_datepicker.js'));
        $this->append_js(URL::to('assets/js/libraries/parsley.js'));
        $this->append_js(URL::to('assets/js/libraries/jquery.dataTables.min.js'));       
        $this->append_js(URL::to('assets/js/global.js')); 
        $this->append_js(URL::to('assets/js/users.js'));
        $this->data['groups'] = Group::orderBy('name')->get();
    }
    
    public function users()
    {
        View::share('page_title','All Users');
        $this->data['users'] = User::where('deleted','=',0)->orderBy('last_name')->get();
        $this->layout->content = View::make('partials.users',$this->data);
    }
    
    public function create()
    { 
        View::share('page_title','Add User');
        $this->layout->content = View::make('partials.users_create',$this->data);
    }
    
    public function create_post()
    {
        $this->layout = '';

        $rules = array(
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|max:12|confirmed',
            'first_name'=> 'required',
            'last_name' => 'required',
            'photo'     => 'image|mimes:jpeg,bmp,png|max:2000'  
        );
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('users/create')->withErrors($validator)->withInput();
        }else{
            
            try {
                
                $filename = '';
                if(Input::hasFile('photo')){
                    $file = Input::file('photo');             
                    $filename = Input::file('photo')->getClientOriginalName();
                    $extension = substr(strrchr($filename,'.'),1);
                    $newname = strtolower(md5(date("Y-m-d H:i:s")).'.'.$extension);
                    $uploadStatus = Input::file('photo')->move(public_path('uploads/photos'),$newname);
                    if($uploadStatus){ $filename = $newname; }   
                }
            
                $user = Sentry::getUserProvider()->create(array(
                    'email'         => Input::get('email'),
                    'password'      => Input::get('password'),
                    'first_name'    => Input::get('first_name'),
                    'last_name'     => Input::get('last_name'),
                    'dob'           => Input::get('dob'),
                    'gender'        => Input::get('gender'),
                    'phone'         => Input::get('phone'),
                    'skype'         => Input::get('skype'),
                    'activated'     => Input::get('status'),
                    'photo'         => $filename,
                )); 
                
                // Find the group using the group id
                $adminGroup = Sentry::getGroupProvider()->findById(Input::get('group'));
            
                // Assign the group to the user
                $user->addGroup($adminGroup);
                
                return Redirect::to('users/create')->with('success','User has been successfully added.'); 
            
            }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                return Redirect::to('users/create')->withInput()->with('error','Login field is required.');
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                return Redirect::to('users/create')->withInput()->with('error','Password field is required.');
            }
            catch (Cartalyst\Sentry\Users\UserExistsException $e)
            {
                return Redirect::to('users/create')->withInput()->with('error','User with this login already exists.');
            }
            catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
            {
                return Redirect::to('users/create')->withInput()->with('error','Group was not found.');
            }
            
        }
    }
    
    public function update($user_id)
    {
        if(User::exists($user_id) == false)
        {
            return Redirect::to('users')->with('error','User doesnt exists');
        }
        
        $this->data['user'] = User::find($user_id);
        View::share('page_title','Update User');
        $this->layout->content = View::make('partials.users_update',$this->data);  
    }
    
    public function update_post($user_id)
    {
       $this->layout = '';
       
        if(User::exists($user_id) == false)
        {
            return Redirect::to('users')->with('error','User doesnt exists');
        }
        
        $this->data['user'] = User::find($user_id); 

        $rules = array(
            'email'     => 'required|email|unique:users,email,'.$user_id,
            'first_name'=> 'required',
            'last_name' => 'required',
            'photo'     => 'image|mimes:jpeg,bmp,png|max:2000'  
        );
        
        if(Input::has('password'))
        {
            $rules['password'] = 'required|min:6|max:12|confirmed';
        }
        
        $validator = Validator::make(Input::all(),$rules);
        
        if($validator->fails())
        {
            return Redirect::to('users/update/'.$user_id)->withErrors($validator)->withInput();
        }else{
            
                
            $filename = $this->data['user']->photo;
            if(Input::hasFile('photo')){
                $file = Input::file('photo');             
                $filename = Input::file('photo')->getClientOriginalName();
                $extension = substr(strrchr($filename,'.'),1);
                $newname = strtolower(md5(date("Y-m-d H:i:s")).'.'.$extension);
                $uploadStatus = Input::file('photo')->move(public_path('uploads/photos'),$newname);
                if($uploadStatus){ $filename = $newname; }   
            }
            
            $user = User::find($user_id);
            $user->email        = Input::get('email');
            $user->password     =Input::get('password');
            $user->first_name   = Input::get('first_name');
            $user->last_name    = Input::get('last_name');
            $user->dob          = Input::get('dob');
            $user->gender       = Input::get('gender');
            $user->phone        = Input::get('phone');
            $user->skype        = Input::get('skype');
            $user->activated    = Input::get('status');
            $user->photo        = $filename;
            $user->save();
            
            $group = Usergroup::where('user_id','=',$user_id)->update(array('group_id' => Input::get('group')));
            
            return Redirect::to('users')->with('success','User has been successfully updated.');   
        }
    }
    
    public function delete()
    {
        $this->layout = '';
        if(Request::ajax())
        {
            try
            {
                $u = Sentry::getUserProvider()->findById(Input::get('id'));
                $user = User::find(Input::get('id'));
                $user->trash();
                echo 'success';
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                echo 'User was not found.';
            }
        }
    }
}