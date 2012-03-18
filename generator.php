<?php
include "validation.php";
include "lib.php";
error_reporting(E_ALL);
$config_file = $argv[1];

if (empty($config_file)) {
    print "Path to config file needed as first argument\r\n";
    exit;
}

$file = file_get_contents($config_file);
$file = trim($file);
$structure = json_decode($file);

if (!$structure) {
    echo "Invalid JSON.";
    exit;
}

//check if all necessary fields are present
try {
validate_main($structure);
}
catch (Exception $exc) {
    echo "Error occured: ".$exc->getMessage()."\r\n";
}



if (file_exists($structure->output_dir)) {
    echo "The directory already exists\r\n";
    exit;
}

$s = $structure;
//mkdir($s->output_dir);
copy_directory("./framework",$s->output_dir,true);


