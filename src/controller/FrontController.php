<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;


class FrontController
{
	private $articleDAO;
    private $commentDAO;
    private $view;

    public function __construct()

    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function addComment($post,$idArt)
    {
        if(isset($post['submit'])) {
            $commentDAO = new CommentDAO();
            $commentDAO->addComment($post,$idArt);
            session_start();
            $_SESSION['add_article'] = 'Le nouveau commentaire a bien été ajouté';            
            //header('Location: ../public/index.php?route=article');
            $article = $this->articleDAO->getArticle($idArt);
        	$comments = $this->commentDAO->getCommentsFromArticle($idArt);
        	$this->view->render('single', ['article' => $article,'comments' => $comments]);
        	
        }

        
    }


    public function home()
    {    	
        $articles = $this->articleDAO->getArticles();
       $this->view->render('home', ['articles' => $articles]);
    }

    public function article($idArt)
    {        
        $article = $this->articleDAO->getArticle($idArt);
        $comments = $this->commentDAO->getCommentsFromArticle($idArt);
        $this->view->render('single', ['article' => $article,'comments' => $comments]);
    }
}