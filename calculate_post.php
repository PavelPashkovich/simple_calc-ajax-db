<?php

require_once 'db.php';

//$mysql = mysqli_connect("207.180.216.166", "user1", "qwerty12345", "pavel_pashkovich");
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// GETTING DATA
$firstDigit = $_REQUEST['first_digit'] ?? '';
$secondDigit = $_REQUEST['second_digit'] ?? '';
$sign = $_REQUEST['sign'] ?? '';

// RESULT CALCULATION
$result = 0;
if (!is_numeric($firstDigit) or !is_numeric($secondDigit)) {
    $result = 0; //"Enter a digit!";
} else {
    switch ($sign) {
        case '+':
            $result = $firstDigit + $secondDigit;
            break;
        case '-':
            $result = $firstDigit - $secondDigit;
            break;
        case '*':
            $result = $firstDigit * $secondDigit;
            break;
        case '/':
            if ($secondDigit == 0) {
                $result = 0; //'Can not divide by zero!';
            } else {
                $result = $firstDigit / $secondDigit;
            }
            break;
        case '**':
            $result = $firstDigit ** $secondDigit;
            break;
        default:
            $result = 0; // 'Must enter a sign: "+", "-", "*", "/", "**".';
    }
}

$sql = 'insert into calc_bd set first_digit = "'.$firstDigit.'", second_digit = "'.$secondDigit.'", sign = "'.$sign.'", result = "'.$result.'"';
//mysqli_query($db, $sql);
$db = $GLOBALS['db'];
$db->query($sql);

$array = json_encode(['result' => $result, 'date' => date('Y-m-d H:i:s')]);
echo $array;
//
//// CREATE LOG_DIR AND LOG_FILE TO SAVE DATE-TIME AND CALCULATED RESULT
//CONST PATH_LOG_DIR = __DIR__.'/log_dir';
//CONST PATH_LOG_FILE = PATH_LOG_DIR.'/log_file.log';
//
//if(!is_dir(PATH_LOG_DIR)) {
//    mkdir(PATH_LOG_DIR);
//}
//$file = fopen(PATH_LOG_FILE, 'a');
//
//$result_json = json_encode([date('Y-m-d H:i:s'), $result]);
//fwrite($file, $result_json."\n");
//fclose($file);




