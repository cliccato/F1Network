<?php
require '../src/connect.php';
require '../src/header.php';
require '../src/functions.php';
    
echo "<h1>Formula 1 Info</h1>";

echo "<h3>Alla prossima gara mancano: </h3>";
require 'timer.php';

require '../src/footer.php';
?>