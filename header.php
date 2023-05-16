<?php
require_once "core/database.php";
session_start();
//appel de la base de donnée, le header est appelé par toutes les autres pages, donc pas besoin de le refaire pour chaque page
try {
    $database = new Database();
} catch (Exception $e) {
    echo 'erreur database';
}

function getDatabase() {
    GLOBAL $database;
    return $database;
}
?>
<!doctype html>
<html lang="fr">
<link rel="stylesheet" type="text/css" href="index/index.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/9ffcf81afb.js" crossorigin="anonymous"></script>

<style>
    .nav_pincipale{
        background-color: #3f51b5;
    }
    .header_nav{
        margin: 0 25px 0 25px;
        color: white;
    }
</style>
<nav class="navbar navbar-expand-lg nav_pincipale">
    <a class="navbar-link header_nav" href="/"><i class="fa-solid fa-house text-white"></i></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="float: left">
            <li class="nav-item active"><a class="nav-link header_nav" href="/form"><i class="fa-solid fa-pen-nib"></i></a></li>
        </ul>
    </div>
</nav>