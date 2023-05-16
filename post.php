<?php
require_once ('header.php');
if (isset($_GET["id"])){

    $post = getDatabase()->prepareAndExecute("SELECT * FROM posts WHERE id=?", array($_GET["id"]))->fetch(PDO::FETCH_ASSOC);

    if (!$post){
        header("Location: /");
    } else {
        echo '
            <div class="card">
                <div class="card-header">
                    <h2>'. $post["title"] .'</h2>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        ' . $post["content"] . '<br><br>
                    </div>
                    <span><i>Par : ' . $post["author"] . '</i></span>
                </div>
            </div>
        ';
    }

} else {
    header("Location: /");
}

