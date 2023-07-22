<?php

SESSION_START();
if(empty($_SESSION['status_login'])){
    header("location:login.php");
}else{
    $email = $_SESSION['email'];
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Wayyy Stack</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Mahasiswa</a>
        </li>
        </ul>
        <span class="navbar-text">
        <?= $email ?> / <a href="logout.php">LOGOUT</a>
        </span>
    </div>
    </nav>