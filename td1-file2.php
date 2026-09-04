<?php

$v1 = 42;
$v2 = 73;

print $v1 + $v2 . "\n";
print $v1 - $v2 . "\n";

print gettype($v1) . "\n";
print gettype($v2) . "\n";

$v1 = "442" . "\n";

print gettype($v1) . "\n";
print $v1 + $v2 . "\n";

$a1 = 1337;
$a2 = 01337;
$a3 = 0x1337;
$a4 = 3.14159;
$a5 = "yopyop";
$a6 = "yepyep";
$a7 = true;
$a8 = false;

$a = ['a1' => $a1, 'a2' => $a2, 'a3' => $a3, 'a4' => $a4, 'a5' => $a5, 'a6' => $a6, 'a7' => $a7, 'a8' => $a8];

foreach($a as $arra => $value) {
    print "La variable $arra est de type : " . gettype($value) . " et a pour valeur : " . $value . "\n";
}

print "variable v1 : $v1\n";
print 'variable v1 : $v1' . "\n";

print 'La variable $v1 vaut 42' . "\n";
print 'La variable "$v2" vaut 73' . "\n";
?>