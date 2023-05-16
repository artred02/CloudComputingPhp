<?php
require_once ('header.php');
echo 'test0';
echo $_GET["id"];
if (isset($_GET["id"])){

    $post = getDatabase()->prepareAndExecute("SELECT * FROM posts WHERE id=?", array($_GET["id"]))->fetch(PDO::FETCH_ASSOC);
    die(var_dump($post));
    echo 'test1';
    if (!$post){
        echo 'test2';
        header("Location: index.php");
    } else {
        echo 'test3';
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
    echo 'test4';
    header("Location: index.php");
}

