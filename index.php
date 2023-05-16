<?php

//include header
require_once ('header.php');

$posts = getDatabase()->prepareAndExecute("SELECT * FROM `post` ORDER BY `id`", array());

if (isset($_POST["delete"])) {
    $delete = getDatabase()->prepareAndExecute("DELETE FROM `post` WHERE `id`=?", array($_POST["id"]));
    header("Location: index.php");
}

echo '<div style="margin: 15px 15px 15px 15px; display: grid; grid-template-columns: repeat(2, 50%);">';
    foreach ($posts as $post) {
        echo
            '<div class="card">
                <div class="card-header">
                    <h2>'. $post["title"] .'</h2>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        ' . $post["content"] . '<br><br>
                    </div>
                    <span><i>Par : ' . $post["author"] . '</i></span>
                </div>
                <div class="card-footer">
                    <a href="post.php?id=' . $post["id"] . '" class="btn btn-success">Accéder au post</a>
                    <form method="post" style="display: contents">
                        <input type="hidden" name="id" value="' . $post["id"] . '">
                        <input type="submit" value="Supprimer" class="btn btn-danger" style="float: right" name="delete">               
                    </form>
                </div>
            </div>
        ';
    }
echo '</div>';