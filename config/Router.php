<?php

namespace App\config;

use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;


class Router

{
    private $frontController;
    private $backController;
    private $errorController;


    public function __construct()

    {

        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->backController = new BackController();
    }

    
    public function run()
    {
        try
        {
            if(isset($_GET['route'])) 
            {
                if($_GET['route'] === 'article'){
                    $this->frontController->article($_GET['idArt']);
                }
                else if($_GET['route'] === 'addArticle'){
                    $this->backController->addArticle($_POST);
                }

                else if($_GET['route'] === 'addComment'){
                    $this->frontController->addComment($_POST,$_GET['idArt']);
                }

                /*else if($_GET['route'] === 'confirmajout'){
                    $this->frontController->addComment($_GET['idArt']);
                }*/


                else{
                    $this->errorController->unknown();
                }
            }
            else
            {
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            $this->errorController->error();
        }
    }
}
