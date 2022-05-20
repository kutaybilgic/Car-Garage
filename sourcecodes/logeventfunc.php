<?php 

function logEvent($message) {
    if ($message != '') {
        date_default_timezone_set("Europe/Istanbul");
        $message = date("Y/m/d H:i:s").': '.$message;
        $fp = fopen('C:/xampp/htdocs/log.txt', 'a');
        fwrite($fp, $message."\n");
        fclose($fp);
    }
}

?>