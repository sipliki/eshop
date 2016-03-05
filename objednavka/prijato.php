<?php
	session_start();
	require'../libs/Smarty.class.php';
	
	$smarty = new Smarty();

	if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
	
	if(isset($_GET["logout"])){
	 unset($_SESSION["user"]);
     header('Location: vypis_zbozi.php');
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

		
$conn->close();
$smarty->display("../templates/prijatoTpl.tpl");
?>