<?php

if (!isset($_SESSION['usuario'])) {
    if (!$_SESSION['usuario']) {
        header('location: ./index.php');
        exit();
    }
}
