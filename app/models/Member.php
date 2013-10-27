<?php 

class Member extends Eloquent
{
    
    protected $appends = array('thumbnail','fullname');
    
    public function level()
    {
        return $this->belongsTo('Level','level_id');
    }
    
    public function blind()
    {
        return $this->belongsTo('Blind','blind_id');
    }
    
    public function memberlogs()
    {
        return $this->hasMany('Memberlog','member_id');
    }
    
    /**
     * Instead of deleting the user, we just change its delete status to 1 so that it wont give any errors along the way.
     */
    public function delete()
    {
        $this->deleted = 1;
        parent::save();   
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
    
    public static function exists($member_id)
    {
        $count = Member::where('id','=',$member_id)->count();
        if($count > 0){ return true; }else{ return false; }
    }
}