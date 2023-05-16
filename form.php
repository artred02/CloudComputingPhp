<?php

try {
    require_once ('header.php');
} catch (Exception $e) {
    echo 'require header.php error';
}

try {
    if (isset($_POST["submit"])) {
        if (!empty($_POST["author"]) && !empty($_POST["title"]) && !empty($_POST["content"])) {
            $author = htmlspecialchars($_POST["author"]);
            $title = htmlspecialchars($_POST["title"]);
            $content = htmlspecialchars($_POST["content"]);
            try {
                getDatabase()->prepareAndExecute("INSERT INTO `post`(`author`, `title`, `content`) VALUES (?,?,?)", array($author, $title, $content));
            } catch (Exception $e) {
                echo $e;
            }
            header("Location: https://bananequidort.azurewebsites.net");
        }
    }
} catch (Exception $e) {
    echo $e;
}


?>
<div class="div_centered" style="max-width: 420px">
    <div class="text-center" style="padding: 5%">
        <h1 style="color: white; margin-bottom: 15px">Nouveau Post</h1>
        <form name="post" method="post">
            <div>
                <label style="float: left; margin-bottom: 3px" for="post_author" class="form-label required">Auteur</label>
                <input type="text" id="post_author" name="author" required="required" maxlength="255" style="margin-bottom: 15px" class="form-control">
                <label style="float: left; margin-bottom: 3px" for="post_title" class="form-label required">Titre</label>
                <input type="text" id="post_title" name="title" required="required" maxlength="255" style="margin-bottom: 15px" class="form-control">
                <label style="float: left; margin-bottom: 3px" for="post_content" class="form-label required">Contenu</label>
                <textarea id="post_content" name="content" required="required" style="margin-bottom: 35px" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn" style="border: solid 1px; width: 100%">Nouveau</button>
        </form>
    </div>
</div>