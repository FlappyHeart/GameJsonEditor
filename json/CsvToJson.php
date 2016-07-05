<!--
@Author: Alfred Liu
@Date:   2016-07-05T09:00:38+08:00
@Email:  liuchunyao0321@gmail.com
@Last modified by:   Alfred Liu
@Last modified time: 2016-07-05T10:14:12+08:00
@License: MIT
-->



<?php

//enemy list
$file="/var/www/json/Enemy.csv";
if(file_exists($file)){
	$csv= file_get_contents($file);
	$array = array_map("str_getcsv", explode("\n", $csv));

	$jsonKeys = $array[0];
	array_shift($array);
	$jsonValues = $array;

	$jsonArray = [];

	foreach ($jsonValues as $key => $value) {
		$arrayTemp = [];
		if(sizeof($value) < 3){
			continue;
		}

		foreach($value as $k => $v){
			if($jsonKeys[$k] == "name"){
				$arrayTemp[$jsonKeys[$k]] = $v;
			}else if($jsonKeys[$k] == "type" || $jsonKeys[$k] == "through" || $jsonKeys[$k] == "resistance"){
				$arrayTemp[$jsonKeys[$k]] = (int)$v;
			}else if($jsonKeys[$k] != ""){
				$arrayTemp[$jsonKeys[$k]] = (float)$v;
			}
		}
		$jsonArray[] = $arrayTemp;
	}

	$json = json_encode($jsonArray);
	$json = str_replace("},", "},\n", $json);
	file_put_contents("/var/www/json/Enemy.json", $json);
	echo "Enemy json 文件输出成功<br>";
}


//level list
$file="/var/www/json/Level.csv";
if(file_exists($file)){
	$csv= file_get_contents($file);
	$array = array_map("str_getcsv", explode("\n", $csv));

	$jsonKeys = $array[0];
	array_shift($array);
	$jsonValues = $array;

	$jsonArray = [];

	foreach ($jsonValues as $key => $value) {
		$arrayTemp = [];
		if(sizeof($value) < 3){
			continue;
		}

		foreach($value as $k => $v){
			if($jsonKeys[$k] == "type" || $jsonKeys[$k] == "name"){
				$arrayTemp[$jsonKeys[$k]] = $v;
			}else if($jsonKeys[$k] == "monster" || $jsonKeys[$k] == "amount"){
				$temp = explode(",", $v);
				foreach ($temp as $key => $value) {
					$temp[$key] = (int)$value;
				}
				$arrayTemp[$jsonKeys[$k]] = $temp;
			}else if($jsonKeys[$k] != ""){
				$arrayTemp[$jsonKeys[$k]] = (int)$v;
			}
		}
		$jsonArray[] = $arrayTemp;
	}

	$json = json_encode($jsonArray);
	$json = str_replace("},", "},\n", $json);
	file_put_contents("/var/www/json/Level.json", $json);
	echo "Level json 文件输出成功<br>";
}

//soldier list
$file="/var/www/json/Soldier.csv";
if(file_exists($file)){
	$csv= file_get_contents($file);
	$array = array_map("str_getcsv", explode("\n", $csv));

	$jsonKeys = $array[0];
	array_shift($array);
	$jsonValues = $array;

	$jsonArray = [];

	foreach ($jsonValues as $key => $value) {
		$arrayTemp = [];
		if(sizeof($value) < 3){
			continue;
		}

		foreach($value as $k => $v){
			if($jsonKeys[$k] == "name" || $jsonKeys[$k] == "promote" || $jsonKeys[$k] == "promoteInc" || $jsonKeys[$k] == "upgrade"){
				$arrayTemp[$jsonKeys[$k]] = $v;
			}else if($jsonKeys[$k] == "type" || $jsonKeys[$k] == "through"){
				$arrayTemp[$jsonKeys[$k]] = (int)$v;
			}else if($jsonKeys[$k] != ""){
				$arrayTemp[$jsonKeys[$k]] = (float)$v;
			}
		}
		$jsonArray[] = $arrayTemp;
	}

	$json = json_encode($jsonArray);
	$json = str_replace("},", "},\n", $json);
	file_put_contents("/var/www/json/Soldier.json", $json);
	echo "Soldier json 文件输出成功<br>";
}

 ?>
