<?php

namespace application\controllers;

use application\core\Controller;
use SimpleXMLElement;

class OrderController extends Controller
{

    public function indexAction()
    {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] == 'admin') {
                $vars = ['orders' => $this->model->getAllOrders()];
            } else {
                $vars = ['orders' => $this->model->getMyOrders($_SESSION['user'])];
            }
        } else {
            $vars = [];
        }

        $this->view->render('Главная', $vars);

    }

    public function addAction()
    {
        if (isset($_SESSION['user'])) {
            if (!empty($_POST)) {
                $post = $this->model->addOrder($_POST);
                if ($post) {
                    exit(json_encode(['url' => '/request/']));
                } else {
                    exit(json_encode(['status' => 'Ошибка!', 'message' => 'Невозможно добавить файл']));
                }
            }
            $this->view->render('Добавить заявку');
        } else {
            header('location: /request/');
            exit;
        }

    }

    public function viewAction()
    {
        $id = $this->route['id'];
        $data = $this->model->viewOrder($id);
        if ($data && isset($_SESSION['user'])) {
            $vars = [
                'id' => $id,
                'data' => $data
            ];

            $this->view->render('Просмотр заявки', $vars);
        } else {
            header('location: /request/');
            exit;
        }

    }

    public function xmlAction()
    {
        $result = $this->model->getAllOrders();
        $xmlstr = <<<XML
<?xml version='1.0' encoding="utf-8" standalone='yes'?>
        <tag>
        </tag>
XML;
        $sxe = new \SimpleXMLElement($xmlstr);
        $requests = $sxe->addChild('requests');
        foreach ($result as $key => $array) {
            $request = $requests->addChild('request');
            foreach ($array as $type => $value) {
                $request->addChild($type, $value);
            }
        }

        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="orders.xml"');

        echo $sxe->asXML();

    }
}