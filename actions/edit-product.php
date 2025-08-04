<?php
require_once "../classes/User.php";

$user = new User;

$user->update($_POST);


?>