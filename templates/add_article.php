<?php
$this->title = "Ajouter un article";
?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=addArticle">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?php
            if(isset($post['title'])){
                echo $post['title'];}
        ?>"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?php if(isset($post['content'])){ echo $post['content']; } ?></textarea><br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author" value="<?php
            if(isset($post['author'])){
                echo $post['author'];}
        ?>"><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>
