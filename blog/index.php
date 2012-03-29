<?php

include "markdown.php";

include "head.php";

include "menu.php";

/****************************************************/
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

/****************************************************/

echo Markdown($s);

?>

<?php

if ($_REQUEST['jmeno']) {
    $hodnota = $_REQUEST['jmeno'];
} else {
    $hodnota =  'sem napis cislo';
}
    
$hodnota = $_REQUEST['jmeno'] ? $_REQUEST['jmeno'] : 'sem napis cislo'; 

echo <<<EOF
<!-- poznamka -->
<form method="get" action="./">
    text: <input type="text" name="jmeno" value="$hodnota" /> <br /> 
    password: <input type="password" name="heslo"/> <br /> 
    submit: <input type="submit" name="tlacitko" value="Go go"/> <br /> 
    submit: <input type="submit" name="tlac123" value="123"/> <br /> 
    checkbox: <input type="checkbox" name="chck" value="Ano"/> <br /> 
    radio a: <input type="radio" name="radio1" value="a"/> <br /> 
    radio b: <input type="radio" name="radio1" value="b" checked="checked"/> <br /> 
    radio c: <input type="radio" name="radio1" value="c"/> <br /> 

    radio 1: <input type="radio" name="radio2" value="1"/> <br /> 
    radio 2: <input type="radio" name="radio2" value="2"/> <br /> 
    radio 3: <input type="radio" name="radio2" value="3" checked="checked"/> <br /> 

</form>
EOF;

echo "<pre>";
print_r( $_REQUEST );
echo "</pre>";

echo "<h1>Puntiky</h1>";
echo "<ul>";
for ( $i = 0; $i < $_GET['jmeno']; $i++) {
    echo "<li></li>";
}
echo "</ul>";

include "foot.php";
?>
