<?php

session_start();

header('location: ../Admin/loginBoundary.php');

session_unset();
session_destroy();

?>