<?php 

  session_start();

  include 'connect.php';

  define('UPLPATH', 'images/');

  $uspjesnaPrijava = false;
  $loginError = false;
      
  if(isset($_POST['prijava'])){


    $prijavaUser = $_POST['user'];
    $prijavaPass = $_POST['pass'];

    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt, $sql)){
      mysqli_stmt_bind_param($stmt, 's', $prijavaUser);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
    }

    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $level);
    mysqli_stmt_fetch($stmt);

    if(password_verify($prijavaPass, $hashed_password) && mysqli_stmt_num_rows($stmt) > 0){

      $uspjesnaPrijava = true;

      if($level == 1){
        $admin = true;
      }else{
        $admin = false;
      }

      $_SESSION['username'] = $username;
      $_SESSION['level'] = $level;

    }else{
      $loginError = true;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOPITAS - admin</title>
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

    <div class="main" id="unos-main">


      <?php
      
        if(($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['username']) && $_SESSION['level'] == 1)){
          echo '
          
          <div class="center">
            <a href="logout.php" class="logout_button">LOG OUT</a>
            <br/>
          </div>
          
          <div class="pre">
              <div class="hr_div" id="hr_div_news">NEW</div>
              <hr id="hr_news">
          </div>

          <div class="form-container">
              <form action="skripta.php" method="post" name="forma-vijesti" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-25">
                  <label for="naslov">Title</label>
                </div>
                <div class="col-75">
                  <input type="text" id="naslov" name="naslov" placeholder="News title..">
                  <span class="form-error" id="err_naslov"></span>
                </div>
              </div>
              <div class="form-row">
                <div class="col-25">
                  <label for="sazetak">Summary</label>
                </div>
                <div class="col-75">
                  <textarea name="sazetak" id="sazetak" style="height:200px" placeholder="News summary.."></textarea>
                  <span class="form-error" id="err_sazetak"></span>
                </div>
              </div>
              <div class="form-row">
                <div class="col-25">
                  <label for="tekst">Text</label>
                </div>
                <div class="col-75">
                  <textarea name="tekst" id="tekst" style="height:500px">&lt;p class='."'p_article'".'&gt;Text here...&lt;&#47;p&gt;</textarea>
                  <span class="form-error" id="err_tekst"></span>
                </div>
              </div>
              <div class="form-row">
                <div class="col-25">
                  <label for="kategorija">Category</label>
                </div>
                <div class="col-75">
                  <select name="kategorija" id="kategorija">
                      <option value="muzika">MUSIC</option>
                      <option value="sport">SPORT</option>
                  </select>
                  <span class="form-error" id="err_kategorija"></span>
                </div>
              </div>
              <div class="form-row">
                  <div class="col-25">
                    <label for="slika">Image</label>
                  </div>
                  <div class="col-75">
                    <input type="file" name="slika" id="slika" accept="image/jpeg, image/jpg, image/png">
                    <span class="form-error" id="err_slika"></span>
                  </div>
              </div>
              <div class="form-row">
                  <div class="col-25">
                    <label for="arhiva">Archive?</label>
                  </div>
                  <div class="col-75" id="check-col">
                    <input type="checkbox" name="arhiva" id="arhiva">
                  </div>
              </div>
              <br>
              <div class="form-row">
                <input type="submit" name="submit" id="submit" value="Make article">
              </div>
              </form>
          </div>';

          echo '
          <div class="pre">
                <div class="hr_div" id="hr_div_editor">EDIT</div>
                <hr id="hr_editor">
          </div>';
          
            $query = "SELECT * FROM vijesti";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)){

              echo '
              <div class="form-container">
                <form action="" method="post" name="forma-editor" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="col-25">
                    <label for="naslov">Title</label>
                  </div>
                  <div class="col-75">
                    <input type="text" id="naslov" name="naslov" value="'.$row['naslov'].'">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-25">
                    <label for="sazetak">Summary</label>
                  </div>
                  <div class="col-75">
                    <textarea name="sazetak" id="sazetak" style="height:200px">'.$row['sazetak'].'</textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-25">
                    <label for="tekst">Text</label>
                  </div>
                  <div class="col-75">
                    <textarea name="tekst" id="tekst" style="height:500px">'.$row['tekst'].'</textarea>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-25">
                    <label for="kategorija">Category</label>
                  </div>
                  <div class="col-75">
                    <select name="kategorija" id="kategorija">';
                    if($row['kategorija'] == 'muzika'){
                      echo '<option value="muzika" selected>MUSIC</option>
                            <option value="sport">SPORT</option>';
                    }elseif($row['kategorija'] == 'sport'){
                      echo '
                      <option value="muzika">MUSIC</option>
                      <option value="sport" selected>SPORT</option>';
                    }
                    echo '
                    </select>
                  </div>
                </div>
                <div class="form-row">
                    <div class="col-25">
                      <label for="slika">Image</label>
                    </div>
                    <div class="col-75">
                      <input type="file" name="slika" id="slika" value="'.$row['slika'].'" accept="image/jpeg, image/jpg, image/png">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-25">
                      <label for="arhiva">Archive?</label>
                    </div>
                    <div class="col-75" id="check-col">';
                    if($row['arhiva'] == 0){
                      echo '<input type="checkbox" name="arhiva" id="arhiva">';
                    }else{
                      echo '<input type="checkbox" name="arhiva" id="arhiva" checked>';
                    }
                      
                    echo '</div>
                </div>
                <br>
                <input type="hidden" name="id" value="'.$row['id'].'">
                <div class="form-row">
                  <input type="submit" name="update" id="update" value="Edit article">
                </div>
                <div class="form-row">
                  <input type="submit" name="delete" id="delete" value="Delete article">
                </div>
                </form>
              </div>
              ';

            }
          
        }elseif(($uspjesnaPrijava == true && $admin == false) || (isset($_SESSION['username']) && $_SESSION['level'] == 0)){

          echo '<br>';
          echo '<div class="center">';
          echo '<span class="msg-success" style="color: black; font-size: 20px;">Hello '.$_SESSION['username'].'! You have successfully logged in, but you are not an administrator.</span>';
          echo '</div>';
          echo '<br/>';
          echo '
          <div class="center">
            <a href="logout.php" class="logout_button">LOG OUT</a>
          </div>';
          

        }elseif($uspjesnaPrijava == false){

          echo '
          <div class ="form-container">

            <form action="" method="post" name="forma-login">
              <div class="form-row">
                <div class="col-25">
                  <label for="user">Username:</label>
                </div>
                <div class="col-75">
                  <input type="text" name="user" id="user">
                  <span class="form-error" id="err_user"></span>
                </div>
              </div>
              <div class="form-row">
                <div class="col-25">
                  <label for="user">Password:</label>
                </div>
                <div class="col-75">
                  <input type="password" name="pass" id="pass">
                  <span class="form-error" id="err_pass"></span>
                </div>
              </div>
              <br>
              <div class="form-row">
                <input type="submit" id="prijava" name="prijava" value="LOG IN">
              </div>
              <div class="form-row">
                <a href="registracija.php" id="register-link">Register</a>
              </div>
            </form>

          </div>';
          
          if($loginError == true){
            echo '<div class="center">';
            echo '<span class="msg-error">Incorrect username or password!</span>';
            echo '</div>';
          }

        }
      
      ?>



    </div>

    <footer>

    </footer>

    <script type="text/javascript">
      
          document.getElementById('submit').onclick = function(event){

            var slanjeForme = true;

            //naslov
            var poljeNaslov = document.getElementById('naslov');
            var naslov = document.getElementById('naslov').value;
            if(naslov.length < 5 || naslov.length > 128){
              slanjeForme = false;
              document.getElementById('err_naslov').innerHTML = 'Title must be between 5 and 128 characters';
              poljeNaslov.style.border = "1px solid red";
            }else{
              document.getElementById('err_naslov').innerHTML = '';
              poljeNaslov.style.border = "1px solid green";
            }

            //kratki sadrzaj
            var poljeSazetak = document.getElementById('sazetak');
            var sazetak = document.getElementById('sazetak').value;
            if(sazetak.length < 10 || sazetak.length > 100){
              slanjeForme = false;
              document.getElementById('err_sazetak').innerHTML = 'Summary must be between 10 and 100 characters';
              poljeSazetak.style.border = "1px solid red";
            }else{
              document.getElementById('err_sazetak').innerHTML = '';
              poljeSazetak.style.border = "1px solid green";
            }

            //tekst
            var poljeTekst = document.getElementById('tekst');
            var tekst = document.getElementById('tekst').value;
            if(tekst.length == 0){
              slanjeForme = false;
              document.getElementById('err_tekst').innerHTML = 'Text must be entered';
              poljeTekst.style.border = "1px solid red";
            }else{
              document.getElementById('err_tekst').innerHTML = '';
              poljeTekst.style.border = "1px solid green";
            }

            //slika
            var poljeSlika = document.getElementById('slika');
            var slika = document.getElementById('slika').value;
            if(slika.length == 0){
              slanjeForme = false;
              document.getElementById('err_slika').innerHTML = 'An image must be selected';
              poljeSlika.style.border = "1px solid red";
            }else{
              document.getElementById('err_slika').innerHTML = '';
              poljeSlika.style.border = "1px solid green";
            }

            if(slanjeForme != true){
              event.preventDefault();
            }
          }

    </script>
</body>
</html>

<!-- DELETE -->
<?php 

  if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query);
  }
  /* EDIT */
  if(isset($_POST['update'])){
    $naslov = $_POST['naslov'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];
    if (isset($_POST['arhiva'])){
      $arhiva = 1;
    }else{
      $arhiva = 0;
    }

    $id=$_POST['id'];

    if (!empty($_FILES['slika']['tmp_name'])) {
      $file_name = $_FILES['slika']['name'];
      $target_dir = 'images/' . $file_name;
      move_uploaded_file($_FILES['slika']['tmp_name'], $target_dir);
      $query = "UPDATE vijesti SET naslov = '" . mysqli_real_escape_string($dbc, $naslov) . "', sazetak = '" . mysqli_real_escape_string($dbc, $sazetak) . "', tekst = '" . mysqli_real_escape_string($dbc, $tekst) . "', slika = '$file_name', kategorija = '$kategorija', arhiva = '$arhiva' WHERE id = $id";
    } else {
      $query = "UPDATE vijesti SET naslov = '" . mysqli_real_escape_string($dbc, $naslov) . "', sazetak = '" . mysqli_real_escape_string($dbc, $sazetak) . "', tekst = '" . mysqli_real_escape_string($dbc, $tekst) . "', kategorija = '$kategorija', arhiva = '$arhiva' WHERE id = $id";
    }

    $result = mysqli_query($dbc, $query);
  }

  mysqli_close($dbc);

?>