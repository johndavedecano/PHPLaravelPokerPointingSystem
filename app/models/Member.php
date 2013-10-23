<?php 

class Member extends Eloquent
{
    
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
}