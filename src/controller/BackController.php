<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;

class BackController
{
	private $view;


    public function __construct()
    {
        $this->view = new View();
    }

    public function addArticle($post)
    {
        if(isset($post['submit'])) {
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            session_start();
            $_SESSION['add_article'] = 'Le nouvel article a bien été ajouté';
            header('Location: ../public/index.php');
        }

        $this->view->render('add_article', ['post' => $post]);

    }
}