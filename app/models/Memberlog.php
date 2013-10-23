<?php 
class Memberlog extends Eloquent 
{
    protected $table = 'member_logs';
    
    public function user()
    {
        return $this->belongsTo('User','user_id');
    }
    
    public function member()
    {
        return $this->belongsTo('Member','member_id');
    }
}