<?php

class Usergroup  extends Eloquent
{
    public $timestamps = false;
    
    protected $table = 'users_groups';
    
    public function group()
    {
        return $this->belongsTo('Group','group_id');
    }
    
    public function user()
    {
        return $this->belongsTo('User','user_id');
    }
}