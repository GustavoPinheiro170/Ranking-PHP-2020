<?php
if(!$_SESSION['usuario']){
    header('Location: ../index/index.php');
    exit();
}