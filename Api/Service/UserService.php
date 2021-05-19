<?php
namespace Api\Service;

use \Api\Model\User;

class UserService 
{
    public function get($id) 
    {
        if (empty($id))
        {
            return User::selectAll();
        } else 
        {
            return User::select($id);
        }   
    }

    public function delete()
    {
        return User::delete();
    }

}