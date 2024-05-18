<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
require '../src/header.php';
?>
    
<h1>Formula 1 Champions</h1>

<h2>Campioni in carica</h2>
<div class="row">
<div class="col-md-6">
<div class="card">
<img src="images/verstappen.jpg" class="card-img-top" alt="...">
<div class="card-body">
<a href="https://it.wikipedia.org/wiki/Max_Verstappen">Max Verstappen</a>
<p class="card-text">È l'ultimo vincitore del mondiale di Formula 1 ed è attualmente in testa alla classifica. Ha 3 titoli mondiali all'attivo ed è alla ricerca del quarto.</p>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card">
<img src="images/perez.jpg" class="card-img-top" alt="...">
<div class="card-body">
<a href="https://it.wikipedia.org/wiki/Sergio_P%C3%A9rez_(pilota_automobilistico)">Sergio Perez</a>
<p class="card-text">È il compagno di Max dal 2021 ed ha aiutato lui e RB Racing a vincere molti campionati costruttori e piloti. In classifica è attualmente secondo dietro a Max.</p>
</div>
</div>
</div>
</div>

<br>
<h2>La scuderia</h2>
<div class="card mb-3">
<img src="images/RBracing.jpg" class="card-img-top" alt="...">
<div class="card-body">
<a href="https://it.wikipedia.org/wiki/Red_Bull_Racing">Red Bull Racing</a>
  <p class="card-text">E' la scuderia dove corrono Max e Sergio ed è attualmente la prima in classifica.<br>Fondata nel 2005, ha vinto in tutto 7 titoli mondiali prima con
  Sebastian Vettel e poi con Max verstappen e sono alla rincorsa del loro ottavo titolo contro Ferrari</p>
  <p class="card-text"><small class="text-body-secondary">In figura Max Verstappen a bordo della rb19</small></p>
</div>
</div>

<div class="section-break"></div>
<div class="section-break"></div>

<h3>Alla prossima gara mancano: </h3>
<?php
require 'timer.php';

require '../src/footer.php';
?>