<html>
    <head>
        <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var name = $("#reg-username").val();
                var email = $("#reg-email").val();
                var lozinka = $("#reg-prvi_password").val();
                var lozinka2 = $("#reg-potvrda_passworda").val();
                var submit = $("#reg-submit").val();
                
                $(".form-message").load("provjeri_registraciju.php", { <!-->Tu ide ona stranica za provjeru maila, u primjeru mail.php-->
                ime : name, <!--ovo name je ime varijable u retku 13-->
                email : email,
                lozinka : lozinka,
                lozinka2 : lozinka2,
                potvrdi : submit
            });
        });
    </script>
    </head>
    <body>
        <div class="zaglavlje">
            <h1>Registracija</h1>
        </div>
        
        <form action="provjeri_registraciju.php" method="post">
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
                
                <tr>
                    <td></td>
                    <td><p class="form-message"></p>
                        
                </tr>
            </table>
        </form>
    </body>
</html>
