<?php
require_once 'const.php';
session_start();
unset($_SESSION['identity']);
session_destroy();
 header('Location:'.$LOGIN_URL ) ;
?>