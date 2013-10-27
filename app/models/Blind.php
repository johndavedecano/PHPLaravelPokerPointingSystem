<?php 
class Blind extends Eloquent
{
    public $timestamps = false;
    
    /**
     * Checks if the blind exists
     * @return bool
     */
    public static function exits($blind_id)
    {
        $count = Blind::where('id','=',$blind_id)->count();
        if($count > 0){ return true; }else{ return false; }
    } 
}