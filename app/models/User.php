<?php
class User extends Eloquent 
{
    
    protected $appends = array('thumbnail','fullname');
    /**
     * Instead of deleting the user, we just change its delete status to 1 so that it wont give any errors along the way.
     */
    public function trash()
    {
        $this->deleted = 1;
        $this->activated = 0;
        $this->email = '';
        parent::save();   
    }
    
    public function group()
    {
        $user_id = $this->id;
        $user_group = Usergroup::where('user_id','=',$user_id)->first();
        if(!empty($user_group)){
            return $user_group->group();
        }
    }
    
    public function getThumbnailAttribute()
    {
        if(empty($this->photo))
        {
            return $this->attributes['thumbnail'] = URL::to('uploads/photos/default.png');
        }else{
            return $this->attributes['thumbnail'] = URL::to('uploads/photos/'.$this->photo);
        } 
    }
    
    public function getFullnameAttribute()
    {
        return $this->attributes['fullname'] = $this->last_name.' '.$this->first_name;
    }
    
    public static function exists($user_id)
    {
        $user = User::where('id','=',$user_id)->count();
        if($user > 0){ return true; }else{ return false; }
    }
    
}