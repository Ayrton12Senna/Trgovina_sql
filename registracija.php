<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija</title>
    
        
    </head>
   <!-- <script>
        function provjeraPodataka(){
            var username = document.getElementById('username').value;
            var email = document.getElementById('email').value;
            var lozinka = document.getElementById('password').value;
            var lozinkaPotvrda = document.getElementById('potvrdaPassword').value;
            
            if(username === ''){
                alert("Nije uneseno korisničko ime");
            }
            
            else if(email === ''){
                alert("Nije unesen email");
            }
            else if(lozinka === ''){
                alert("Nije unesena lozinka");
            }
            
            else if(lozinka !== lozinkaPotvrda){
                alert("Lozinke se ne podudaraju");
            }
        }
        
        
        
        function registrirajKorisnikaJavascript(){
            provjeraPodataka();
            //pozvati php funkciju registriraj();
            //PITATI asistenta
        }
   </script>    -->
        
    <body>
        <div class="zaglavlje">
            <h1>Registracija</h1>
        </div>
        
        <form action="registracija.php" method="post">
            <table>
                <tr>
                <td>Korisničko ime:</td>
                <td><input id="reg-username" type="text" name="username" id="username" class="textInput"</td>
                </tr> <!--jedan redak u formi-->
                
                <tr>
                <td>Email:</td>
                <td><input id="reg-email" type="email" name="email" id="email" class="textInput"</td>
                </tr>
                
                <tr>
                <td>Lozinka:</td>
                <td><input id="reg-prvi_password" type="password" name="prvi_password" id="password" class="textInput"</td>
                </tr>
                
                <tr>
                <td>Potvrda lozinke:</td>
                <td><input id="reg-potvrda_passworda" type="password" name="potvrda_passworda" id="potvrdaPassword" class="textInput"</td>
                </tr>
                
                <tr>
                <td></td>
                <td><input id="reg-submit" type="submit" name="gumb_za_registraciju" value="Registriraj"</td>
                </tr>

            </table>
        </form>
    </body>
</html>

<?php
    include 'funkcije.php';
    function registriraj()
    {
        $ime_baze = mysqli_connect("localhost", "root", "", "autentikacija");
      /*  if(isset($_GET['username']) && isset($_GET['email']) && isset($_GET['prvi_password']) && isset($_GET['potvrda_passworda']))*/
        {
            echo 'Test';
            $korisnickoime = mysqli_real_escape_string($ime_baze, $_GET['username']);
            $email = mysqli_real_escape_string($ime_baze, $_GET['email']);
            $lozinka = mysqli_real_escape_string($ime_baze, $_GET['prvi_password']);
            $lozinka_2put = mysqli_real_escape_string($ime_baze, $_GET['potvrda_passworda']);

            if($korisnickoime === ''){
                logMessage('Krivi unos korisnickog imena');
                echo '<script>alert("krivi unos korisnickog imena")</script>';
            }

            else if(email === ''){
                logMessage('Krivi unos maila');
                echo '<script>alert("krivi unos maila")</script>';
            }

            else if($lozinka === ''){
                logMessage('Krivi unos lozinke');
                echo '<script>alert("krivi unos lozinke")</script>';
            }

            else if($lozinka_2put !== $lozinka){
                logMessage('Lozinke se ne podudaraju');
                echo '<script>alert("lozinke se ne podudaraju")</script>';
            }
                 // kreiraj korisnika
               $lozinka = md5($lozinka); //hashirana lozinka se sprema u bazu iz sigurnosnih razloga
               $sql_upit = "INSERT INTO korisnicki_racuni VALUES ('','$korisnickoime', '$email', '$lozinka','')";
               
               if(mysqli_query($ime_baze, $sql_upit)) 
               {
                echo "Registracija je uspješna";
                header("resferh:2; Location: pocetna.php"); //redirect na home page
               }
	  else
               {
                echo "Registracija nije uspjela";
               }
        }
    }
               //die();            
    registriraj();
?>
