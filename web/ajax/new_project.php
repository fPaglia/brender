<?php
session_start();

include_once("../tpl/connect.php");
include_once("../../functions.php");
$GLOBALS['computer_name']="ajax";

if ($_POST['project_name']) {
	$project_name = $_POST['project_name'];
}

//print $_POST['project_name']."  dfffffffff ". $_POST['rem']." ------";
if (isset($project_name)) {	
		$project = clean_name($_POST['project_name']);
		$rem = $_POST['rem'];
		$blend_mac = $_POST['blend_mac'];
		$blend_linux = $_POST['blend_linux'];
		$blend_windows = $_POST['blend_windows'];
		$output_mac = $_POST['output_mac'];
		$output_linux = $_POST['output_linux'];
		$output_windows = $_POST['output_windows'];
		if (check_project_exists($project)) {
			# ooooups project already exists
			echo "{\"status\":false, \"msg\":\"Epic Fail: project $project already exists, please choose a different name.\"}";
		}
		else {
			$query="INSERT INTO projects VALUES ('','$project','$blend_mac','$blend_linux','$blend_windows','$output_mac','$output_windows','$output_linux','$rem','active','');";
			mysql_query($query) or die ($dberror = mysql_error());
			echo "{\"status\":true, \"msg\":\"new project $project created\"}";
		}

		
	}
	else {
		//$error="please enter new job infos<br/>";
		echo "{\"status\":false, \"msg\":\"Epic Fail: please enter a project name.\"}";
	}
?>
