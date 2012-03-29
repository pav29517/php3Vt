<?php

function toVsechnoVim() {
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";
}

function pocitej() {
    $remoteIP = $_SERVER["REMOTE_ADDR"];

    //$pristupy = nactiDB();
    // čtu
    $handler = fopen("w/pocitadlo.txt", "r+");
    flock($handler, LOCK_EX);
    while ($line = fscanf($handler, "%s%s\n")) {
        list($ip, $pocet) = $line;
        $pristupy[$ip] = $pocet;
    }
    // skočím na začátek souboru
    fseek($handler,0);
    // skrátím na nulovou délku
    ftruncate($handler,0);

    if ( isset( $pristupy[$remoteIP] ) ) {
        $pristupy[$remoteIP]++;
    } else {
        $pristupy[$remoteIP] = 1;
    }

    //ulozDB($pristupy);
    // zapíšu
    foreach ($pristupy as $ip => $pocet) {
        fputs($handler, $ip . " " . $pocet . "\n");
    }
    flock($handler, LOCK_UN);
    fclose($handler);
    $celkem = 0;
    $unikat = 0;
    foreach ($pristupy as $ip => $pocet) {
        $celkem += $pocet;
        $unikat++;
    }
    return array($unikat, $celkem);
}




//  oddělení čtení a psaní není vhodné z důvodu vícenásobného přístupu
function nactiDB() {
    $handle = fopen("w/pocitadlo.txt", "r");
    while ($line = fscanf($handle, "%s%s\n")) {
        list($ip, $pocet) = $line;
        $db[$ip] = $pocet;
    }
    fclose($handle);
    return $db;
}

function ulozDB($db) {
    $handler = fopen("w/pocitadlo.txt","w");
    foreach ($db as $ip => $pocet) {
        fputs($handler, $ip . " " . $pocet . "\n");
    }
    fclose($handler);

}


//////////////////////////////////////////////////////////////

function anketa($otazka, $moznosti, $soubor) {
    if ( file_exists($soubor) ) {
        $handler = fopen($soubor,'r');
        while ($line = fscanf($handler, "%s%s\n")) {
            list($index, $ccc) = $line;
            $cetnosti[$index] = $ccc;
        }
        fclose($handler);
    } else {
        $handler = fopen($soubor,'w');
        foreach ($moznosti as $index=>$mmm) {
            fputs($handler, "$index 0\n");
        }
        fclose($handler);
    }

    if ( isset($_GET[$soubor]) ) {
        $cetnosti[$_GET[$soubor]]++;
        $handler = fopen($soubor,'w');
        foreach ($cetnosti as $index=>$ccc) {
            fputs($handler, "$index $ccc\n");
        }
        fclose($handler);
    } 

    echo "<strong>$otazka</strong><br />" ; 
    echo "<ul>" ; 
    foreach ($moznosti as $index=>$mmm) {

        $sirka =300 * $cetnosti[$index] / max($cetnosti);
        echo "<li><a href=\"index.php?$soubor=$index\">$mmm</a>: <br/><span style=\"background-color:#6789ab; display:block; width:${sirka}px;\">$cetnosti[$index]</span></li>" ; 
    }
    echo "</ul>" ; 


/*    echo "<pre>";
    print_r($_GET);
    print_r($cetnosti);
    echo "</pre>"; */

}



?>
