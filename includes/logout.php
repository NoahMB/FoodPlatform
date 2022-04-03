<?php
session_start();  
include_once '../../frontend/include/destroy.php';
echo destroy(session_id());

session_unset();

session_destroy();
header("location: ../../frontend/index.php");
    exit();