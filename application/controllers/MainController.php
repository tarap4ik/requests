<?php

namespace application\controllers;

use application\core\Controller;
use SimpleXMLElement;

class MainController extends Controller
{

    public function indexAction()
    {
        if (isset($_SESSION['user'])) {
            $vars = ['orders' => $this->model->getOrder($_SESSION['user'])];
        } else {
            $vars = [];
        }
        $this->view->render('Главная', $vars);

    }

    public function addAction()
    {
        if (isset($_SESSION['user'])) {
            if (!empty($_POST)) {
                $this->model->addOrder($_POST);
                exit(json_encode(['url' => '/request/']));
            }
            $this->view->render('Добавить заявку');
        }else{
            header('location: /request/');
            exit;
        }

    }

    public function viewAction()
    {
        $id = $this->route['id'];
        $data = $this->model->viewOrder($id);
        if($data && isset($_SESSION['user'])) {
            $vars = [
                'id' => $id,
                'data' => $data
            ];

            $this->view->render('Просмотр заявки', $vars);
        }else{
            header('location: /request/');
            exit;
        }

    }

    public function xmlAction()
    {
        $xml = $this->model->getXML();

        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="orders.xml"');

        echo $xml;

    }
}