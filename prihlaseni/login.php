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

	if(isset($_POST["login"])){
			$username=$_POST["nick"];
			$pwd=md5($_POST["pwd"]);
			$dotaz="SELECT * FROM uzivatele WHERE uzivatelske_jmeno='$username' AND heslo='$pwd'";
			$vysledek=$conn->query($dotaz);
			$rows=mysqli_num_rows($vysledek);
			if($rows>0){
			  	$_SESSION["user"]=$username;
			  	if(isset($_SESSION["doprava"]) AND isset($_SESSION["platba"])){
					header('Location: ../objednavka/shrnuti.php');}
				else{header('Location: ../administrace/user.php');}	
				}
			else{$smarty->assign("error",$username);}		
	
	};

$conn->close();
$smarty->display("../templates/loginTpl.tpl");
?>