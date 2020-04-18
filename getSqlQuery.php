<?php
include_once 'setSqlQuery.php';

	if(isset($sql)){
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			  echo "<tr class='table-row' data-href='". $link_getSqlQuery_id . $row[$id_no] . "'><td name='name' id='name' class='text-right'>" . $row[$name] . "</td><td name='author' id='author' class='text-left'>" . $row[$author] . "</td></tr>";
			}
		}
	}

	else{
		$sql = "SELECT $id_no, $name, $author FROM $table_name ORDER BY $author";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			  echo "<tr class='table-row' data-href='". $link_getSqlQuery_id . $row[$id_no] . "'><td name='name' id='name' class='text-right'>" . $row[$name] . "</td><td name='author' id='author' class='text-left'>" . $row[$author] . "</td></tr>";
			}
		}
	}

?>