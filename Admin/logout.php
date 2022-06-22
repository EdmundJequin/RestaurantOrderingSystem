<?php

session_start();

header('location: loginBoundary.php');

session_unset();
session_destroy();

?>