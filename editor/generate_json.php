<!--
@Author: Alfred Liu
@Date:   2016-07-05T09:00:37+08:00
@Email:  liuchunyao0321@gmail.com
@Last modified by:   Alfred Liu
@Last modified time: 2016-07-05T10:13:35+08:00
@License: MIT
-->



<?php

$value = $_POST['change'];
$index = $_POST['index'];
$file = $_POST['file'];
# add headers for each column in the CSV download
// array_unshift($data, array_keys($data[0]));
$indexes = explode('-', $index);

$filePath = '/var/www/json/'.$file.'.json';

$jsonString= file_get_contents($filePath);

$jsonData = json_decode($jsonString, true);

if($indexes[1] == "monster" || $indexes[1] == "amount"){
	$value = explode(',', $value);
	$tempArray = array();
	foreach ($value as $k => $v) {
		$tempArray[] = (int)$v;
	}
	$value = $tempArray;
}else if(is_numeric($value)){
	// if(is_integer($value)){
	// 	$value = (int)$value;
	// }else if(is_float($value)){
		$value = (float)$value;
	// }
}

//记录修改日志
if(json_encode($jsonData[$indexes[0]][$indexes[1]]) != json_encode($value)){
	$jsons = json_decode(file_get_contents("/var/www/editor/log.json"), true);
	$jsons[] = date("Y-m-d H:i:s") . " 行ID: " . $indexes[0] . " 列名: " . $indexes[1]
		. " 原始值: " . json_encode($jsonData[$indexes[0]][$indexes[1]]) . " -> " . json_encode($value);
	file_put_contents("/var/www/editor/log.json", json_encode($jsons));
}

$jsonData[$indexes[0]][$indexes[1]] = $value;

file_put_contents($filePath, json_encode($jsonData));

?>
