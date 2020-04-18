<?php
include_once 'includes/db_connect.php';

session_start();
include 'languages/langConfig.php';

$output = '';
$xls_filename = 'Library_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name

$sql = "SELECT * FROM $table_name ORDER BY $author";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	$output .= '
		<table class="table" bordered="1">
			<tr>
				<th>'.$lang["new_ISBN"].'</th>
				<th>'.$lang["new_Name"].'</th>
				<th>'.$lang["new_Author"].'</th>
				<th>'.$lang["new_Publisher"].'</th>
				<th>'.$lang["new_PrintDate"].'</th>
				<th>'.$lang["new_DateReceived"].'</th>
				<th>'.$lang["new_Volume"].'</th>
				<th>'.$lang["new_Language"].'</th>
				<th>'.$lang["new_Category"].'</th>
				<th>'.$lang["new_Read"].'</th>
				<th>'.$lang["new_Lend"].'</th>
				<th>'.$lang["new_LendTo"].'</th>
			</tr>
	';

	while ($row = mysqli_fetch_array($result)) {

		if ($row[$read]=="Yes") {
	      $TrueRead = $lang['yes'];
	    } else {$TrueRead = $lang['no'];}

	    if ($row[$lend]=="Yes") {
	      $TrueLend = $lang['yes'];
	    } else {$TrueLend = $lang['no'];}

		$output .= '
			<tr>
				<td>'.$row[$isbn_no].'</td>
				<td>'.$row[$name].'</td>
				<td>'.$row[$author].'</td>
				<td>'.$row[$publisher].'</td>
				<td>'.$row[$print_date].'</td>
				<td>'.$row[$date_received].'</td>
				<td>'.$row[$volume].'</td>
				<td>'.$row[$language].'</td>
				<td>'.$row[$category].'</td>
				<td>'.$TrueRead.'</td>
				<td>'.$TrueLend.'</td>
				<td>'.$row[$lend_to].'</td>
			</tr>
	';
	}

	$output .= '</table>';

	// Convert to UTF-16LE
	$output = mb_convert_encoding($output, 'UTF-16LE', 'UTF-8'); 
	// Prepend BOM
	$output = "\xFF\xFE" . $output;

	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=".$xls_filename);
	echo $output;
}
?>