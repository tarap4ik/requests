<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{

    public function getOrder($user)
    {
        if ($user) {
            if ($user == 'admin')
                $result = $this->db->row('SELECT o.id,o.name,u.username FROM request_view o LEFT JOIN users u ON o.user_id=u.id');
            else {
                $paramets = [
                    'user_id' => $_SESSION['id'],
                ];
                $result = $this->db->row('select * from request_view where user_id = :user_id', $paramets);
            }
        } else {
            $result = [];
        }
        return $result;
    }

    public function addOrder($post)
    {
        $paramets = [
            'name' => $post['name'],
            'telephone' => $post['telephone'],
            'problem' => $post['problem'],
            'user_id' => $_SESSION['id']
        ];
        $result = $this->db->row('INSERT INTO request_view (id, name, telephone, problem, user_id) VALUES (NULL, :name, :telephone, :problem, :user_id );', $paramets);
        $_SESSION['last'] = $this->db->lastInsertId();
        $this->postUploadImage($_FILES['pic']['tmp_name'], $_SESSION['last']);
        return $result;
    }

    public function viewOrder($id)
    {
        $paramets = [
            'id' => $id,
        ];
        $result = $this->db->row('select * from request_view where id = :id', $paramets);
        return $result;
    }

    public function getXML()
    {
        $result = $this->db->row('SELECT o.name,u.username FROM request_view o LEFT JOIN users u ON o.user_id=u.id');
        $xmlstr = <<<XML
<?xml version='1.0' encoding="utf-8" standalone='yes'?>
        <tag>
        </tag>
XML;
        $sxe = new \SimpleXMLElement($xmlstr);
        $requests = $sxe->addChild('requests');
        foreach ($result as $key=>$array){
            $request  = $requests->addChild('request');
            foreach ($array as $type=>$value){
                $request->addChild($type, $value);
            }
        }
        return $sxe->asXML();
    }

    public function postUploadImage($path, $id)
    {
        move_uploaded_file($path, 'public/materials/' . $id . '.jpg');
    }
}


