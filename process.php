<?php
      include_once('db.php');
 
	  $username = mysqli_real_escape_string($conn, $_POST["username"] );
	  $password = mysqli_real_escape_string($conn, $_POST["pass"] );
	  $var_razina = mysqli_real_escape_string($conn,(int) $_POST["razina"] );
	  
          $sql = "INSERT INTO korisnici (korisnicko_ime, lozinka, razina_ID) VALUES ('$username', '$password', '$var_razina')";
          
          if( mysqli_query($conn, $sql) )
	  {
            echo "Registracija je uspješna";
            header("refresh: 3; url=prijava.php");
          }
          else
	  {
              echo "Registracija nije uspjela";
              header("refresh: 3; url=registracija_2.php");
          }
          
          $conn->close();
?>