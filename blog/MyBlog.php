<?php
include "markdown.php";

function printHead() {
    echo <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; 
    charset=UTF-8" />
  <meta name="keywords" content="php,blog,Marek"/>
  <link href="styles.css" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="images/favico.png" 
    type="image/png" />
  <title>Markův webLog</title>
</head>

<body>
EOF;
}

function printMenu() {
    echo <<<EOF
<ul>
    <li>a</li>
    <li>b</li>
    <li>c</li>
    <li>d</li>
</ul>
EOF;
}

/****************************************************/


function printContent() {
    $dh = opendir(".");
    $s = '';
    // čtu adresář
    while (($filename = readdir($dh)) !== false) {
        // pokud jméno končí na .mdwn tak čtu soubor
        if (substr($filename,-5) == '.mdwn') {
            $handler = fopen($filename, "r"); 
            // čtu soubor po řádcích
            while ( ($buffer = fgets($handler)) !== false  ) {
                $s .= $buffer;
            }
            fclose($handler); 
            $s .= "\n\n";
            echo "\n<hr />\n";
        }
    }
    closedir($dh);

    echo Markdown($s);
}



function printFoot() {
    echo <<<EOF
<hr />
<p style="color:#999; text-align:right;">
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
 created by 
<a href="mailto: marek zavináč spseol tečka cz">Marek</a></p>


</body>
</html>
EOF;
}

?>

