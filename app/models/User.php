<?php
class User extends Eloquent 
{
    
    /**
     * Instead of deleting the user, we just change its delete status to 1 so that it wont give any errors along the way.
     */
    public function delete()
    {
        $this->deleted = 1;
        $this->activated = 0;
        $this->email = '';
        parent::save();   
    }
}