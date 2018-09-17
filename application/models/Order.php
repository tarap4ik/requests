<?php

namespace application\models;

use application\core\Model;

class Order extends Model
{

    public function getMyOrders($user)
    {
        $paramets = [
            'user_id' => $_SESSION['id'],
        ];
        $result = $this->db->row('select * from request_view where user_id = :user_id', $paramets);
        return $result;

    }

    public function getAllOrders()
    {
        $result = $this->db->row('SELECT o.id,o.name,u.username FROM request_view o LEFT JOIN users u ON o.user_id=u.id');
        return $result;
    }

    public function addOrder($post)
    {
        $paramets = [
            'name' => $post['name'],
            'telephone' => $post['telephone'],
            'problem' => $post['problem'],
            'pic_name' => ($_FILES['pic']['name']) ? $_FILES['pic']['name'] : '',
            'user_id' => $_SESSION['id']
        ];

        if ($_FILES['pic']['name']) {
            $file = $this->postUploadImage($_FILES['pic']['tmp_name'], $_FILES['pic']['name']);
            if (!$file) {
                return false;
            }
        }

        $this->db->row('INSERT INTO request_view (id, name, telephone, problem, user_id, pic_name) 
        VALUES (NULL, :name, :telephone, :problem, :user_id, :pic_name);', $paramets);
        $_SESSION['last'] = $this->db->lastInsertId();

        return true;

    }

    public function viewOrder($id)
    {
        $paramets = [
            'id' => $id,
        ];
        $result = $this->db->row('select * from request_view where id = :id', $paramets);
        return $result;
    }

    public function postUploadImage($path, $name)
    {
        if (exif_imagetype($path)) {
            if (move_uploaded_file($path, 'public/materials/' . $name)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}


