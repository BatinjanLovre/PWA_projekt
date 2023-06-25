<?php 

    session_start();

    include 'connect.php';

    define('UPLPATH', 'images/');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOPITAS.com</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="header_div">
            <div class="logo"><img src="ball-S.png" alt="ball"></div>
            <nav>
                <div><a href="index.php">HOME</a></div>
                <div><a href="kategorija.php?id=muzika">MUSIC</a></div>
                <div><a href="kategorija.php?id=sport">SPORT</a></div>
                <div style="margin-right: 0px;"><a href="administracija.php">ADMIN</a></div>
            </nav>
        </div>
    </header>

    <div class="main">

        <div class="pre">
            <div class="hr_div" id="hr_div_music">MUSIC</div>
            <hr id="hr_music">
        </div>
        
        <section class="article-row">
            <?php 
            
                $query = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'muzika' ORDER BY id DESC LIMIT 3";
                $result = mysqli_query($dbc, $query);
                //$i = 0;
                while($row = mysqli_fetch_array($result)){
                    
                    echo '<article class="row-member">';
                        echo '<a href="clanak.php?id='.$row['id'].'">';
                            echo '<img class="row_image" src="' . UPLPATH . $row['slika'] . '" alt="'.$row['slika'].'">';
                            echo '<h4>'.$row['naslov'].'</h4>';
                            echo '<h5>'.$row['datum'].'</h5>';
                        echo '</a>';
                    echo '</article>';
                }
            
            ?>
        </section>

        <div class="pre">
            <div class="hr_div" id="hr_div_sport">SPORT</div>
            <hr id="hr_sport">
        </div>

        <section class="article-row">
            <?php 
                
                $query = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'sport' ORDER BY id DESC LIMIT 3";
                $result = mysqli_query($dbc, $query);
                //$i = 0;
                while($row = mysqli_fetch_array($result)){
                    
                    echo '<article class="row-member">';
                        echo '<a href="clanak.php?id='.$row['id'].'">';
                            echo '<img class="row_image" src="' . UPLPATH . $row['slika'] . '" alt="'.$row['slika'].'">';
                            echo '<h4>'.$row['naslov'].'</h4>';
                            echo '<h5>'.$row['datum'].'</h5>';
                        echo '</a>';
                    echo '</article>';
                }
            
            ?>
        </section>

    </div>

    <footer>

    </footer>
</body>
</html>

<?php mysqli_close($dbc); ?>