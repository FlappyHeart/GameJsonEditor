<!--
@Author: Alfred Liu
@Date:   2016-07-05T09:00:40+08:00
@Email:  liuchunyao0321@gmail.com
@Last modified by:   Alfred Liu
@Last modified time: 2016-07-05T10:14:06+08:00
@License: MIT
-->



<?php
// this script just for getting json data

header('Content-Type: application/json');

$file="Soldier.json";
$json= file_get_contents($file);

echo $json;


?>
