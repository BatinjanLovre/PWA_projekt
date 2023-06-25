<?php

    session_start();

    include 'connect.php';

    define('UPLPATH', 'images/');

    $registriranKorisnik = false;
    $korisnikPostoji = false;

    if(isset($_POST['registracija'])){

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $hashed_pass = password_hash($pass, CRYPT_BLOWFISH);
        $razina = 0;
    
        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt, $sql)){
    
            mysqli_stmt_bind_param($stmt, 's', $user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt) > 0){
            $korisnikPostoji = true;
        }else{
    
            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $sql)){
    
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $user, $hashed_pass, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }
    
        mysqli_close($dbc);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOPITAS - register</title>
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
        
        <div class="form-container">

            <form action="" method="post" name="forma-registracija">
                <div class="form-row">
                <div class="col-25">
                    <label for="ime">Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="ime" id="ime">
                    <span class="form-error" id="err_ime"></span>
                </div>
                </div>
                <div class="form-row">
                <div class="col-25">
                    <label for="prezime">Surname:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="prezime" id="prezime">
                    <span class="form-error" id="err_prezime"></span>
                </div>
                </div>
                <div class="form-row">
                <div class="col-25">
                    <label for="user">Username:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="user" id="user">
                    <span class="form-error" id="err_user"></span>
                    <?php if($korisnikPostoji == true){ echo '<span class="msg-error">Username already exists</span>'; } ?>
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
                <div class="form-row">
                <div class="col-25">
                    <label for="confirmPass">Confirm Password:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="confirmPass" id="confirmPass">
                    <span class="form-error" id="err_confirmPass"></span>
                </div>
                </div>
                <br>
                <div class="form-row">
                <input type="submit" id="registracija" name="registracija" value="SIGN UP">
                </div>
            </form>

        </div>

        <?php 
            if($registriranKorisnik == true){
                echo '<div class="center">';
                echo '<span class="msg-success">Registration successful!</span>';
                echo '</div>';
            }

        ?>

    </div>

    <footer>

    </footer>

    <script type="text/javascript">
      
      document.getElementById('registracija').onclick = function(event){

        var slanjeForme = true;

        //ime
        var poljeIme = document.getElementById('ime');
        var ime = document.getElementById('ime').value;
        if(ime.length < 2 || ime.length > 32){
          slanjeForme = false;
          document.getElementById('err_ime').innerHTML = 'Input valid name';
          poljeIme.style.border = "1px solid red";
        }else{
          document.getElementById('err_ime').innerHTML = '';
          poljeIme.style.border = "1px solid green";
        }

        //prezime
        var poljePrezime = document.getElementById('prezime');
        var prezime = document.getElementById('prezime').value;
        if(prezime.length < 2 || prezime.length > 32){
          slanjeForme = false;
          document.getElementById('err_prezime').innerHTML = 'Input valid surname';
          poljePrezime.style.border = "1px solid red";
        }else{
          document.getElementById('err_prezime').innerHTML = '';
          poljePrezime.style.border = "1px solid green";
        }

        //korisnicko ime
        var poljeUser = document.getElementById('user');
        var user = document.getElementById('user').value;
        if(user.length < 3 || user.length > 32){
          slanjeForme = false;
          document.getElementById('err_user').innerHTML = 'Username must be between 3 and 32 characters';
          poljeUser.style.border = "1px solid red";
        }else{
          document.getElementById('err_user').innerHTML = '';
          poljeUser.style.border = "1px solid green";
        }

        //lozinka
        var poljePass = document.getElementById('pass');
        var pass = document.getElementById('pass').value;
        if(pass.length < 3){
          slanjeForme = false;
          document.getElementById('err_pass').innerHTML = 'Password must be at least 3 characters';
          poljePass.style.border = "1px solid red";
        }else{
          document.getElementById('err_pass').innerHTML = '';
          poljePass.style.border = "1px solid green";
        }

        //potvrda lozinke
        var poljeConf = document.getElementById('confirmPass');
        var confirmPass = document.getElementById('confirmPass').value;
        if(confirmPass != pass){
          slanjeForme = false;
          document.getElementById('err_confirmPass').innerHTML = 'Passwords must match';
          poljeConf.style.border = "1px solid red";
        }else{
          document.getElementById('err_confirmPass').innerHTML = '';
          poljeConf.style.border = "1px solid green";
        }

        if(slanjeForme != true){
          event.preventDefault();
        }
      }

    </script>
</body>
</html>