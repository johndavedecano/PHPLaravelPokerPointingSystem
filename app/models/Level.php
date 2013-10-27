<?php 
class Level extends Eloquent
{
    public $timestamps = false;
    
    /**
     * Checks if the level exists
     * @return bool
     */
    public static function exits($level_id)
    {
        $count = Level::where('id','=',$level_id)->count();
        if($count > 0){ return true; }else{ return false; }
    }
   /**
     * Checks if level is associated with existing members
     * @return bool
     */ 
    public static function has_members($level_id)
    {
        $count = Member::where('level_id','=',$level_id)->count();
        if($count > 0){ return true; }else{return false;}
    }
}