<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
require '../src/cross.php';
require '../src/header.php';
?>
    
<h1>Formula 1 Line Up's</h1>

<h2>Piloti</h2>
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

<div class="row">
<div class="col-md-6">
<div class="card">
<img src="images/leclerc.jpg" class="card-img-top" alt="...">
<div class="card-body">
<a href="https://it.wikipedia.org/wiki/Charles_Leclerc">Charles Leclerc</a>
<p class="card-text">
E' una delle stelle emergenti della Formula 1. Ha ottenuto diverse vittorie con la Scuderia Ferrari ed è attualmente uno dei piloti più competitivi del campionato. Nonostante la giovane età, ha già dimostrato di poter lottare ai massimi livelli e mira a conquistare il suo primo titolo mondiale.</p>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card">
<img src="images/sainz.jpg" class="card-img-top" alt="...">
<div class="card-body">
<a href="https://it.wikipedia.org/wiki/Carlos_Sainz_Jr.">Carlos Sainz</a>
<p class="card-text">In Ferrari dal 2021 col duro ruolo di sostituire il 4 volte campione del mondo Sebastian Vettel, non si è fatto impaurire dalla sfida e nella sua permanenza ha conquistato 3 vittorie con la scuderia. Non ha ancora un sedile per il 2024 ma non sarebbe una sorpresa se ne trovasse uno per un altro top team</p>
</div>
</div>
</div>
</div>

<br>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <img src="images/hamilton.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="https://it.wikipedia.org/wiki/Lewis_Hamilton">Lewis Hamilton</a>
        <p class="card-text">Sette volte campione del mondo, Lewis Hamilton è uno dei piloti più titolati nella storia della Formula 1. Attualmente corre per la Mercedes e continua a essere uno dei principali contendenti per il titolo mondiale.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <img src="images/russell.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="https://it.wikipedia.org/wiki/George_Russell">George Russell</a>
        <p class="card-text">Considerato uno dei giovani talenti più promettenti, George Russell è il compagno di squadra di Hamilton in Mercedes. Ha dimostrato grandi capacità e mira a vincere il suo primo titolo mondiale nei prossimi anni.</p>
      </div>
    </div>
  </div>
</div>

<br>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <img src="images/norris.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="https://it.wikipedia.org/wiki/Lando_Norris">Lando Norris</a>
        <p class="card-text">Giovane e talentuoso pilota britannico, Lando Norris corre per la McLaren. Ha mostrato grande abilità e consistenza, diventando uno dei piloti più popolari e promettenti della Formula 1.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <img src="images/alonso.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <a href="https://it.wikipedia.org/wiki/Fernando_Alonso">Fernando Alonso</a>
        <p class="card-text">Due volte campione del mondo, Fernando Alonso è un veterano della Formula 1. Attualmente corre per Aston Martin e continua a dimostrare la sua competitività e passione per le corse.</p>
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