<?php 

  session_start();

  include 'connect.php';

  define('UPLPATH', 'images/');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SOPITAS - article</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <header>
      <div class="header_div">
        <div class="logo"><img src="ball-S.png" alt="ball" /></div>
        <nav>
          <div><a href="index.php">HOME</a></div>
          <div><a href="kategorija.php?id=muzika">MUSIC</a></div>
          <div><a href="kategorija.php?id=sport">SPORT</a></div>
          <div style="margin-right: 0px"><a href="administracija.php">ADMIN</a></div>
        </nav>
      </div>
    </header>

    <div class="div_article">
      <?php

        $clanak_id = $_GET['id'];
        $query = "SELECT * FROM vijesti WHERE id = $clanak_id";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);

        echo '<img
          class="img_article_L"
          src="' . UPLPATH . $row['slika'] . '"
          alt="'.$row['slika'].'"
        />';
        echo '<h2>'.$row['naslov'].'</h2>';
        echo '<h5 id="h_article">'.$row['datum'].'</h5>';
        echo $row['tekst'];
      ?>
    </div>

    <footer></footer>
  </body>
</html>

<?php mysqli_close($dbc); ?>