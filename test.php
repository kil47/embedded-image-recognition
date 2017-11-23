<?php 

$command = escapeshellcmd('emptyfile.py');
$output = shell_exec($command);

$command = escapeshellcmd('visionex.py');
$output = shell_exec($command);

$command = escapeshellcmd('color.py');
$output = shell_exec($command);

exec("node model.js &", $output);
header('location:demo.php');
?>