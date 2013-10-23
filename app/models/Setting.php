<?php
class Setting extends Eloquent {
    
    public $timestamps = false;
    
    public static function getSetting($name = ''){
        $setting = Setting::where('name','=',$name)->first()->value;
        if(empty($setting))
            return false;
        else
            return $setting;
        
    }
    
    public static function createSetting($name = '',$value = ''){
        if(empty($name))
            return false;
        else
            return true;
    } 
    
    public static function updateSetting($name = '',$value = ''){
        if(empty($name))
            return false;
        else
            $setting = Setting::where('name','=',$name)->update(array(
                'value' => $value
            ));
            return true;
    }
    public static function getSettings()
    {
        return Setting::all();
    }
       
}