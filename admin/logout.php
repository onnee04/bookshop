<?php
include('../config/constants.php');
session_destroy();
header("location:".SITURL."admin/login.php");

?>