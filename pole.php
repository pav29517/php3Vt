<?php

include 'hlavicka.php';

function opakuj($retezec,$n) {
    $vysledek = '';
    while ($n-- > 0) {
        $vysledek = $vysledek . $retezec;
    } 
    return $vysledek;
}

echo opakuj('L',50);
echo "<h1>Array</h1>";

$pole[] = 'Bart';
$pole[] = 'pepa';
$pole[] =  77;
$pole[] = 'tonda';
$pole[] = 'honza';
$pole[] = 'Jeronym';
$pole[] = 'Adéla';

$zelenina = array('zeli', 'mrkev', 'paprika');

echo sizeof($pole);

for ($i=0; $i<sizeof($pole); $i++) {
    echo "<li> $pole[$i] </li>"; 
}


echo $zelenina[1];

$hash['sobota'] = 6;
$hash['nedele'] = 7;
$hash['pondeli'] = 1;
$hash['utery'] = 2;
$hash['3'] = 'streda';

$klic='hugo';
$hash[$klic] = 'Okurka';


echo "<pre>";
print_r($hash);

print_r(array_keys($hash));

echo "</pre>";

echo $prochozani = <<<EOF
<h1>Procházení pole</h1>
<ul>
EOF;

foreach ($pole  as $key => $value) {
    echo "<li>$key: $value</li>";
}

echo "<li>-------------------------</li>";

foreach ($hash  as $key => $value) {
    echo "<li>$key: $value</li>";
}

echo "<li>-------------------------</li>";

foreach (array_keys($hash)  as $key ) {
    echo "<li>$key: $hash[$key]</li>";
}


echo "</ul>";




include 'paticka.php';
?>



