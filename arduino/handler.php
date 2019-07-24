<?php
$myfile = fopen("log.csv", "a") or die("Unable to open file!");

$content = $_GET["year"]."-".str_pad($_GET["month"],2,'0',STR_PAD_LEFT)."-".str_pad($_GET["day"],2,'0',STR_PAD_LEFT)." ".str_pad($_GET["hour"],2,'0',STR_PAD_LEFT).":".str_pad($_GET["minute"],2,'0',STR_PAD_LEFT).":".str_pad($_GET["second"],2,'0',STR_PAD_LEFT).",".$_GET["temp"]."\n";
fwrite($myfile, $content);
fclose($myfile);
echo $content;




?>