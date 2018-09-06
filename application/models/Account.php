<?php

namespace application\models;

use application\core\Model;
class Account extends Model{

    public function getAuth($login, $password)
    {
        $paramets=[
            'username'=>$login,
            'password'=>$password,
        ];
        $result = $this->db->row('select * from users where username = :username and password = :password',$paramets);
        return $result;
    }
}


