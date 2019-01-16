

<?php
$this->title = "Article";
?>



    <h1>Mon blog</h1>
    <p>En construction</p>
    <?php
            if(isset($_SESSION['add_article'])) {
            echo '<p>'.$_SESSION['add_article'].'</p>';
            unset($_SESSION['add_article']);
            }
    ?>
    
        <div>
            <h2><?= htmlspecialchars($article->getTitle());?></h2>
            <p><?= htmlspecialchars($article->getContent());?></p>
            <p><?= htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?= htmlspecialchars($article->getDateAdded());?></p>
        </div>
        <br>
    
    <a href="../public/index.php">Retour à la liste des articles</a>
    <div id="comments" class="text-left" style="margin-left: 50px">
        <h3>Commentaires</h3>       

        <form method="post" action="../public/index.php?route=addComment&amp;idArt=<?php echo $article->getId()?>">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?php
             if(isset($post['pseudo'])){
                echo $post['pseudo'];}
            ?>"><br>
            <label for="content">Contenu</label><br>
            <textarea id="content" name="content"><?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>

            <input type="submit" value="Envoyer" id="submit" name="submit">

        </form>

    <a href="../public/index.php">Retour à l'accueil</a>

</div>
        <?php
        foreach ($comments as $comment)
        {
        ?>
            <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
            <p><?= htmlspecialchars($comment->getContent());?></p>
            <p>Posté le <?= htmlspecialchars($comment->getDateAdded());?></p>
        <?php
        }        
        ?>
    </div>
  