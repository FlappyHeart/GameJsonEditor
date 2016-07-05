<!--
@Author: Alfred Liu
@Date:   2016-07-05T09:00:38+08:00
@Email:  liuchunyao0321@gmail.com
@Last modified by:   Alfred Liu
@Last modified time: 2016-07-05T10:13:48+08:00
@License: MIT
-->



<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>技能编辑器</title>
	<style type="text/css">
		* { margin: 0; padding: 0; }
		body { font-size: 14px; font-family: sans-serif; line-height: 30px; }
		.page-wrap { display: block; padding: 30px; }
		h1 { padding-bottom: 10px; border-bottom: 1px solid #ccc; margin-bottom: 10px; }
		.csv-content { margin-top: 20px; }
		table { table-layout: fixed; border-collapse: collapse; }
		tr th { padding: 5px 10px; background: #ccc;}
		tr td { border: 1px solid #ccc; padding: 0 10px; }
		table tbody tr:nth-child(even) { background-color: whitesmoke; }
		.action-btns { margin-top: 15px; }
		td:focus { outline: 1px dashed black; background: #ccc; }
		.csv-content ul { line-height: 20px; margin: 20px 15px; }
		.default-table .header-2 .up_arrow {position: static;display: inline-block !important;vertical-align: middle;height: 14px;margin: -3px 0 0 15px;}
		.dwn_arrow {  background-image: url("images/drop_arrow.png");background-repeat: no-repeat;height: 10px;
		right: 0px;top: 15px;width: 11px;display: inline-block;vertical-align: middle;position: absolute;}
  		.sortWhat{  display: inline-block;position: relative;}
  		.up_arrow {  background-image: url("images/up_arrow.png");background-repeat: no-repeat;height: 10px;width: 14px;
  		display: inline-block;vertical-align: middle;position: static; margin: -7px 0 0 10px;}
		.inlineD {display: inline-block !important;}
		.hidden { visibility: hidden;}
		.show { visibility: visible;}
		.t11{top: 11px}
		.t13{top: 13px}
		.t8{top: 8px}
	</style>
</head>
<body>

	<div class="page-wrap">
		<h1>Skill Editor</h1>

		<div class="csv-content">
			<?php
				$filePath = '../json/Skill.json';
				$jsonString = file_get_contents($filePath);
				$jsonData = json_decode($jsonString, true);

				if ( !empty( $jsonData )) {
					$table = '<table>';
					$colTag = 'td';

					foreach ($jsonData as $counter => $tableRow) {
						if ( $counter === 0 ) {
							$table .= '<thead><tr>';

							foreach ($tableRow as $rowIndex => $tableItem) {
								$table .= '<th>' . $rowIndex . '</th>';
							}
							$table .= '</tr></thead>';
						}

						if ( $counter === 1 ) {
							$table .= '<tbody>';
						}

						$table .= '<tr>';

						foreach ($tableRow as $rowIndex => $tableItem) {
							if($rowIndex == "monster" || $rowIndex == "amount"){
								$temp = implode(',', $tableItem);
							}else{
								$temp = $tableItem;
							}
							$table .= '<td class="save" index="'. $counter . '-'.
							$rowIndex .'" name="Skill" contenteditable="true">' . $temp . '</td>';
						}

						$table .= '</tr>';
					}
					$table .= '</tbody>';
					$table .= '</table>';

					echo $table;
				}

			?>

		</div>
	</div>


	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/app.js" type="text/javascript"></script>

	<script type="text/javascript">
		var app = new App();
		app.init();
	</script>
</body>
</html>
