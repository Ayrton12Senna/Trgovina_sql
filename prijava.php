<!DOCTYPE html>
<html>
    <head>
        <title>Prijava</title>
        <!--link za css-->
    </head>
    <body>
        <div id="formazaprijavu">
            <form action="proces_prijave.php" method="POST">
                <p>
                    <label>Korisničko ime: </label>
                    <input type="text" id="korisnicko_ime_za_prijavu" name="korisnicko_ime_za_prijavu" />
                </p>
                
                <p>
                    <label>Lozinka: </label>
                    <input type="password" id="lozinka_za_prijavu" name="lozinka_za_prijavu" />
                </p>
                
                <p>
                    <button id="submit">Prijava</button>
                </p>
            </form>
            
        </div>
    </body>
</html>


