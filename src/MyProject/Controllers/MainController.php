<?php

namespace MyProject\Controllers;

use MyProject\Models\Products\Product;
use MyProject\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
    }

    public function main()
    {
        $products = Product::findAll(5);
        $this->view->renderHtml('main/main.php', ['products' => $products]);
    }
    public function hide(int $id)
    {
        Product::hide($id);

        $resData=array();
        if ((Product::getById($id)->getVisibility())==0){
            $resData['success']=1;
        } else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
    public function addQuantity(int $id)
    {
        $quantity=Product::getById($id)->getQuantity();
        Product::addQuantity($id,$quantity);

        $resData=array();
        if ($quantity+1==Product::getById($id)->getQuantity()){
            $resData['success']=1;
            $resData['quantity']=Product::getById($id)->getQuantity();
        } else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
    public function deleteQuantity(int $id)
    {
        $quantity=Product::getById($id)->getQuantity();
        Product::deleteQuantity($id,$quantity);

        $resData=array();
        if ($quantity-1==Product::getById($id)->getQuantity()){
            $resData['success']=1;
            $resData['quantity']=Product::getById($id)->getQuantity();
        } else{
            $resData['success']=0;
        }
        echo json_encode($resData);
    }
}