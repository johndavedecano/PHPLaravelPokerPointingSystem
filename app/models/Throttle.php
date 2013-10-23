<?php

class Throttle extends Eloquent {


    public function users()
    {
        return $this->belongsTo('Staff');
    }


}