<?php

require_once 'db.php';
// GETTING DATA
$firstDate = $_REQUEST['first_date'] ?? '';
$secondDate = $_REQUEST['second_date'] ?? '';

// GOING TO LOG_FILE
//CONST PATH_LOG_DIR = __DIR__.'/log_dir';
//CONST PATH_LOG_FILE = PATH_LOG_DIR.'/log_file.log'; // можно было сделать через declare('calculate_post.php'); ?

//$file = fopen(PATH_LOG_FILE, 'r'); // NEED THIS?

// CREATE FUNCTION TO DISPLAY DATE BY FILTER
function drawLog($start, $finish) {

    $db = $GLOBALS['db'];
    $sql = "select * from calc_bd where date>'$start' and date<'$finish'";
//    print_r($sql);

    foreach ($db->query($sql) as $row){
        echo 'time:'.$row['date'].' result:'.$row['result'].'<br>';
    }
}

drawLog($firstDate, $secondDate);