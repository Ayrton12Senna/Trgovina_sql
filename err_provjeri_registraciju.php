<?php

if (isset($_POST['submit'])) // provjerava imamo li post metodu submit, provjeravamo je li kliknut gumb u registracija.php file-u 
{
	$name = $_POST['name']; //uočiti da je ovo post metoda iz forme u registracija.php
	$email = $_POST['email'];
	$lozinka = $_POST['lozinka'];
	$lozinka2 = $_POST['lozinka2'];
	
	//dodat ćemo dvije varijable. ErrorEmpty će provjeravati da li se pojavila neka greška.
	$errorEmpty = false;
	$errorEmail = false;
	
if (empty($name) || empty($email) || empty($lozinka) || empty($lozinka2))
{
echo "<span class='form-error'>Popunite sva polja!</span>";
$errorEmpty = true;
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "<span class='form-error'>Upišite ispravnu email adresu</span>";
	$errorEmail = true;
}
else
{
	echo "<span class='form-success'>Popunite sva polja!</span>";
	}
}
else 
{
	echo "Greška, provjerite unesene podatke!";
}

?>

<script>
$("#reg-username, #reg-email, #reg-prvi_password, #reg-potvrda_passworda").removeClass("input-error");
	var errorEmpty = "<?php echo $errorEmpty; ?>";
	var errorEmail = "<?php echo $errorEmail; ?>";

if (errorEmpty == true)
{
$("#reg-username, #reg-email, #reg-prvi_password, #reg-potvrda_passworda").addClass("input-error");
}
if (errorEmail == true)
{
	$("#reg-email").addClass("input-error");
}
if (errorEmpty == false && errorEmail == false)
{
	$("#reg-username, #reg-email, #reg-prvi_password, #reg-potvrda_passworda").val("");
	
}
</script>