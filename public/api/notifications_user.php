<?php
include "functions.php";

$sid = $_GET['id'];
echo json_encode(get_all_query_full("SELECT * FROM alert WHERE `to`=$sid"));


