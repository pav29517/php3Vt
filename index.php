
<h1>Ahoj</h1>

<?php
// řádkový komentář

/* meziřádkový
 
      komentář */

$promena = 1234;

echo "<p>ahoj </p>\n\n\n\n";
echo '<p>a\"hoj</p>\n\n\n\n';
echo "<p>ahoj</p>";

echo "<hr />";

echo "<p>$promena</p>";
echo '<p>$promena</p>';

echo "<hr />";

$retezec = '1234.8787';
$cislo = 5;
$vysledek = (int)$retezec + (string)$cislo;

echo $vysledek;


?>

nějaký html kód 

<?php

echo "$retezec";
echo "<hr />";

$x=9;
if ($x>0 && $x< 5) {  
    echo "to je málo";
    echo "to je málo";
} elseif ($x <10) 
  {   
    echo "to je akorát";
  }  
else
{    
    echo "to je HODNE";
}

echo "<hr />";

if ( 0 )
    echo "toto se Provede";


$a = ( $b = ($c = 10));

echo $a++;
echo "<hr />";
echo $a;
echo "<hr />";
// a == 11
if ( ++$a == 11 ) {
    echo "Je tam 11";
} elseif ( $a == 12)
    echo "Je tam 12";

// cyklus s podmínkou na začátku
$i=0;    
while ($i++ < 6) {
    echo "<h$i>Napis $i</h$i>";
} 
// cyklus s podmínkou na konci
$i=6;    
do {
    echo "<h$i>Napis $i</h$i>";
} while ($i-- > 1); 

/* cyklus For */
echo "<h1>Cyklus for</h1>";

for ($i=6; $i>1; $i--) {
    echo "<h$i>Napis $i</h$i>";
}

$retezec = <<<EOF

sem neco napisu

$i $a

<br />
EOF;
echo $retezec;
echo "\n\nsem neco napisu\n\n $i $a\n";


$pole[-1] = 'pepa';
$pole[1] = 'pepa';
$pole[2] =  77;
$pole[3] = 'tonda';
$pole[4] = 'honza';

$pole[7] = 'Jeronym';





?>



