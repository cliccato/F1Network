<h1>Formula 1 News Feed</h1>

<?php
    require '../src/header.php';

    $feed_url = "https://www.autosport.com/rss/feed/f1";

    $xml = simplexml_load_file($feed_url);

    if ($xml) {
        $limit = 20;
        $count = 0;
        foreach ($xml->channel->item as $item) {
            if ($count < $limit) {
                $title = $item->title;
                $description = $item->description;
                
                echo "<div class='news-card'>";
                echo "<h2><a href='" . $item->link . "'>" . $title . "</a></h2>";
                echo "<p>" . $description . "</p>";
                echo "</div>";

                $count++;
            } else {
                break;
            }
        }
    } else {
        echo "<p>Impossibile caricare il feed delle notizie di Formula 1.</p>";
    }

    require '../src/footer.php';
?>