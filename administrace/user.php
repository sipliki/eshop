<?php
	session_start();
	require'../libs/Smarty.class.php';

	$smarty = new Smarty();

	if(!isset($_SESSION["user"])){
		header('Location: ../prihlaseni/login.php');
	}
	
	if(isset($_GET["logout"])){
	 unset($_SESSION["user"]);
     header('Location: ../vypis_zbozi.php');
	}

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

	$username=$_SESSION["user"];
	$dotaz="SELECT * FROM uzivatele WHERE uzivatelske_jmeno='$username'";
	$result = $conn->query($dotaz);
	$row = $result->fetch_assoc();
		$user["ID"]=$row["ID_uzivatele"];
		$user["uzivatelske_jmeno"]=$row["uzivatelske_jmeno"];
		$user["heslo"]=$row["heslo"];
		$user["jmeno"]=$row["jmeno"];
		$user["prijmeni"]=$row["prijmeni"];
		$user["ulice"]=$row["ulice"];
		$user["mesto"]=$row["mesto"];
		$user["psc"]=$row["psc"];
		$user["admin"]=$row["admin"];
	$smarty->assign("user",$user);
	if($row["admin"]=='1'){$smarty->assign("admin",$user["admin"]);$_SESSION["admin"]='1';}

	if(isset($_POST["update_uzivatele"])){
		$id=$_POST["id_radku"];
		$nick=$_POST["uzivatelske_jmeno"];
		if(isset($_POST["nove_heslo"])){$heslo=md5($_POST["nove_heslo"]);}
			else $heslo=md5($_POST["heslo"]);
		$jmeno=$_POST["jmeno"];
		$prijmeni=$_POST["prijmeni"];
		$ulice=$_POST["ulice"];
		$mesto=$_POST["mesto"];
		$psc=$_POST["psc"];
		$update="UPDATE uzivatele SET uzivatelske_jmeno='$nick',heslo='$heslo',jmeno='$jmeno',prijmeni='$prijmeni',ulice='$ulice',mesto='$mesto',psc='$psc' WHERE ID_uzivatele='$id'";
		$conn->query($update);
		header('Location: user.php');

	}
	$conn->close();
	$smarty->assign("session_user",$_SESSION["user"]);
	$smarty->display("../templates/userTpl.tpl")
?>