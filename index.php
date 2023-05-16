<?php

//include header
require_once ('header.php');

$posts = getDatabase()->prepareAndExecute("SELECT * FROM `post` ORDER BY `id`", array());
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
                    <a href="post.php?id=' . $post["id"] . '">Accéder au post</a>
                </div>
            </div>
        ';
    }
echo '</div>';