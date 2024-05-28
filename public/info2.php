<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php
  require '../src/cross.php';
  require '../src/header.php';

  echo "<div class='container'>";
  echo "<h1>Formula 1 Standings</h1>";

  $feed_url = "https://ergast.com/api/f1/current/driverStandings";
  $xml = simplexml_load_file($feed_url);

  if ($xml === false) {
      echo "<p>Impossibile caricare il feed delle notizie di Formula 1. Errore durante il caricamento del file XML.</p>";
      foreach (libxml_get_errors() as $error) {
          echo "<p>" . $error->message . "</p>";
      }
  } else {
      // Array associativo per mappare driverId alle immagini
      $driver_images = [
          'max_verstappen' => 'images/verstappen.jpg',
          'hamilton' => 'images/hamilton.jpg',
          'leclerc' => 'images/leclerc.jpg',
          'norris' => 'images/norris.jpg',
          'perez' => 'images/perez.jpg',
          'sainz' => 'images/sainz.jpg',
          'piastri' => 'images/piastri.jpg',
          'russell' => 'images/russell.jpg',
          'alonso' => 'images/alonso.jpg',
          'tsunoda' => 'images/tsunoda.jpg',
          'stroll' => 'images/stroll.jpg',
          'bearman' => 'images/bearman.jpg',
          'hulkenberg' => 'images/hulkenberg.jpg',
          'ricciardo' => 'images/ricciardo.jpg',
          'albon' => 'images/albon.jpg',
          'ocon' => 'images/ocon.jpg',
          'kevin_magnussen' => 'images/magnussen.jpg',
          'gasly' => 'images/gasly.jpg',
          'zhou' => 'images/zhou.jpg',
          'bottas' => 'images/bottas.jpg',
          'sargeant' => 'images/sargeant.jpg',
          // Aggiungi altre immagini per i piloti se necessario
      ];

      // Verifica che esistano i driverStandings nel feed XML
      if (isset($xml->StandingsTable->StandingsList->DriverStanding)) {
          $limit = 20;
          $count = 0;

          echo "<h2>Drivers</h2>";

          echo "<div class='row row-cols-1 row-cols-md-3 g-4'>";

          foreach ($xml->StandingsTable->StandingsList->DriverStanding as $standing) {
              if ($count < $limit) {
                  $position = $standing['position'];
                  $points = $standing['points'];
                  $wins = $standing['wins'];

                  $driver = $standing->Driver;
                  $driverId = (string)$driver['driverId'];
                  $name = $driver->GivenName . ' ' . $driver->FamilyName;
                  $url = $driver->Url;

                  $constructor = $standing->Constructor->Name;

                  $image_url = isset($driver_images[$driverId]) ? $driver_images[$driverId] : 'images/default.jpg';

                  echo "<div class='col mb-4'>";
                  echo "<div class='card' style='width: 18rem;'>";
                  echo "<img class='card-img-top' src='" . $image_url . "' alt='Immagine di " . $name . "'>";
                  echo "<div class='card-body'>";
                  echo "<h5 class='card-title'>" . $name . "</h5>";
                  echo "<p class='card-text'>Posizione: " . $position . "</p>";
                  echo "<p class='card-text'>Scuderia: " . $constructor . "</p>";
                  echo "<p class='card-text'>Punti: " . $points . "</p>";
                  echo "<p class='card-text'>Vittorie: " . $wins . "</p>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";

                  $count++;
              } else {
                  break;
              }
          }

          echo "</div>";
      } else {
          echo "<p>Nessun dato disponibile nel feed delle notizie di Formula 1.</p>";
      }
  }

  echo "</div>";

  require '../src/footer.php';
  ?>
</body>
</html>
