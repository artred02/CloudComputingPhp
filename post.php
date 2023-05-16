<?php
require_once ('header.php');
if (isset($_GET["id"])){
    $post = getDatabase()->prepareAndExecute("SELECT * FROM post WHERE id=?", array($_GET["id"]))->fetch(PDO::FETCH_ASSOC);
    if (!$post){
        header("Location: index.php");
    } else {
        echo '
            <div class="div_centered" style="max-width: 420px">
                <div class="" style="padding: 5%">
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
                </div>
            </div>
        ';
    }

} else {
    header("Location: index.php");
}

