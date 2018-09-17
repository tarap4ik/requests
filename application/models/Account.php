<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

    public function getAuth($login, $password)
    {
        $paramets = [
            'username' => $login,
        ];
        $result = $this->db->row('select * from users where username = :username', $paramets);
        if (password_verify($password, $result[0]['password'])) {
            return $result;
        } else {
            return null;
        }

    }
}


