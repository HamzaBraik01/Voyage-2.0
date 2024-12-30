<?php
require_once 'Authentication.Class.php';
require_once 'DB.Class.php';

session_start();

$db = new Database();
$auth = new Authentication($db);

$auth->logout();

header('Location: login.php');
exit();
?>