<?php

session_start();

include 'connect.php';

if (isset($_POST['naslov'])) {
    $naslov = $_POST['naslov'];
}
if (isset($_POST['sazetak'])) {
    $sazetak = $_POST['sazetak'];
}
if (isset($_POST['tekst'])) {
    $tekst = $_POST['tekst'];
}
if (isset($_POST['kategorija'])) {
    $kategorija = $_POST['kategorija'];
}
if (isset($_POST['arhiva'])){
    $arhiva = 1;
}else{
    $arhiva = 0;
}

$datum = date('j/m/Y');



/*image upload*/
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["slika"]["name"]);
$file_name = ($_FILES["slika"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["slika"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
    } else {
    }
}

//slanje na bazu

$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum', '" . mysqli_real_escape_string($dbc, $naslov) . "', '" . mysqli_real_escape_string($dbc, $sazetak) . "', '" . mysqli_real_escape_string($dbc, $tekst) . "', '$file_name', '$kategorija', '$arhiva')";

$result = mysqli_query($dbc, $query) or die('Error querying database.');

mysqli_close($dbc);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SOPITAS - New article</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<header>
    <div class="header_div">
        <div class="logo"><img src="ball-S.png" alt="ball"/></div>
        <nav>
            <div><a href="index.php">HOME</a></div>
            <div><a href="kategorija.php?id=muzika">MUSIC</a></div>
            <div><a href="kategorija.php?id=sport">SPORT</a></div>
            <div style="margin-right: 0px"><a href="administracija.php">ADMIN</a></div>
        </nav>
    </div>
</header>

<div class="div_article">
    <img class="img_article_L" src="images/<?php echo $file_name; ?>" alt="uploaded_img"/>
    <h2><?php echo $naslov; ?></h2>
    <h5 id="h_article"><?php echo $datum; ?></h5>
    <?php echo "$tekst"; ?>
</div>

<footer></footer>
</body>
</html>

