<?php
require_once 'niva.php';
require_once 'toyota.php';

$newNiva = new Niva(40);

$newNiva->turnEngine(true);
$newNiva->switchTransmission(true);
$newNiva->move(3, 200, 'backward');
$newNiva->turnEngine(false);
$newNiva->switchTransmission(false);

echo '<hr>';
$newToyota = new Toyota(150);

$newToyota->turnEngine(true);
$newToyota->switchTransmission(true);
$newToyota->move(2, 300, 'forward');
$newToyota->turnEngine(false);
$newToyota->switchTransmission(false);

?>