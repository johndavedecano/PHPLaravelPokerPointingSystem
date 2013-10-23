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
}