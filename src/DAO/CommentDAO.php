<?php

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($idArt)
    {
        $sql = 'SELECT id, pseudo, content, date_added FROM comment WHERE article_id = ?';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function addComment($comment,$idArt)

    {

        extract($comment);
        $sql = 'INSERT INTO comment (pseudo, content, date_added, article_id) VALUES (?, ?, NOW(), ?)';
        $this->sql($sql, [$pseudo, $content, $idArt]);

    }



    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        return $comment;
    }
}
