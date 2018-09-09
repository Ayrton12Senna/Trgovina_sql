<?php

function verify_query($rezultat)
{
    global $connection;
    
    if (!$rezultat)
    {
        die("Neuspješno ažuriranje baze podataka s novim datumom prijave" . mysqli_error($connection));
    }
}

function logMessage($message){
    file_put_contents('log.txt', $message.PHP_EOL , FILE_APPEND | LOCK_EX);
}


?>
