<?php
	session_start();
	require'../libs/Smarty.class.php';

	$smarty = new Smarty();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eshop";

    // Vytvoření připojení
	$conn = new mysqli($servername, $username, $password, $dbname);

    // Kontrola připojení
	if ($conn->connect_error) {
    die("Nezdařilo se spojit s databází: " . $conn->connect_error);
      }
    // Nastavení "češtiny"
  	$sql = "SET CHARACTER SET utf8";
	$conn->query($sql);

	if(isset($_GET["shrnuti"])){$_SESSION["shrnuti"]=$_GET["kosik"];}

	if(isset($_GET["registrace"])){
			$uzivatelske_jmeno=$_GET["uzivatelske_jmeno"];
			$heslo1=md5($_GET["heslo1"]);
			$heslo2=md5($_GET["heslo2"]);
			$jmeno=$_GET["jmeno"];
			$prijmeni=$_GET["prijmeni"];
			$ulice=$_GET["ulice"];
			$mesto=$_GET["mesto"];
			$psc=$_GET["psc"];

		if($heslo1==$heslo2){
			$dotaz_user="SELECT * FROM uzivatele WHERE uzivatelske_jmeno='$uzivatelske_jmeno'";
			$vysledek_user=$conn->query($dotaz_user);
			$rows_user=mysqli_num_rows($vysledek_user);
				if($rows_user>0){$smarty->assign("vice_uzivatelu",$rows_user);}
				else{
			$dotaz="INSERT INTO uzivatele VALUES ('NULL','$uzivatelske_jmeno','$heslo','$jmeno','$prijmeni','$ulice','$mesto','$psc','0')";
			$conn->query($dotaz);
				$_SESSION["user"]=$uzivatelske_jmeno;
				
				if(isset($_SESSION["doprava"]) AND isset($_SESSION["platba"])){
		header('Location: ../objednavka/shrnuti.php');		
	}
	else{header('Location: ../administrace/user.php');}
		}}

	if($heslo1!=$heslo2) {$error="1";$smarty->assign("error",$error);}

	}

	$conn->close();
	$smarty->display("../templates/registraceTpl.tpl")
?>