<!DOCTYPE html>
<html>
<head>
	<title>修改日志</title>
</head>
<body>

</body>
</html>

<?

$jsons = json_decode(file_get_contents("/var/www/editor/log.json"), true);

foreach ($jsons as $key => $value) {
	echo $value . "<br>";
}