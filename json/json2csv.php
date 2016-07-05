<!--
@Author: Alfred Liu
@Date:   2016-07-05T09:00:41+08:00
@Email:  liuchunyao0321@gmail.com
@Last modified by:   Alfred Liu
@Last modified time: 2016-07-05T10:14:18+08:00
@License: MIT
-->



<?php

if(isset($argv[1])){

	require_once('json2csv.class.php');
	$JSON2CSV = new JSON2CSVutil;

	if(isset($argv[1])){
		$shortopts = "f::";  // Required value
		$longopts  = array("file::","dest::");
		$arguments = getopt($shortopts, $longopts);
		$filepath = $arguments["dest"];

		$JSON2CSV->savejsonFile2csv($arguments["file"], $filepath);
	}
}
