<?php
	session_start();
	require'libs/Smarty.class.php';

	$smarty = new Smarty();

	if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
	
	if(isset($_GET["logout"])){
	 unset($_SESSION["user"]);
     header('Location: kosik.php');
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

	if(isset($_GET["odebrat"])){
		unset($_SESSION["kosik"][$_GET["id_zbozi"]]);
		if($_SESSION["kosik"]==NULL){$_SESSION["prazdny_kosik"]="1";header('Location: vypis_zbozi.php');unset($_SESSION["kosik"]);}
	}

      if($_SESSION["kosik"]) {
       $sql="SELECT * FROM zbozi WHERE id_zbozi IN ('" . implode("', '", array_keys($_SESSION["kosik"])) . "')";
       $result =$conn->query($sql);
    	  while($row =$result->fetch_assoc()) {
    	  	$id_zbozi[$row["id_zbozi"]]["id"]=$row["id_zbozi"];
        	$zbozi[$row["id_zbozi"]]["nazev"]=$row["nazev"];
      		$zbozi[$row["id_zbozi"]]["cena"]=$row["cena"]." Kč";
      		$mnozstvi[$row["id_zbozi"]]["mnozstvi"]=$_SESSION["kosik"][$row["id_zbozi"]];
    	  }
	  }
	  $smarty->assign("id_zbozi",$id_zbozi);
	  $smarty->assign("mnozstvi",$mnozstvi);
	  $smarty->assign("zbozi",$zbozi);

	  $sql_doprava="SELECT * FROM doprava";
	  	$result_doprava=$conn->query($sql_doprava);
	  	$arr=0;
	  		while($row_doprava=$result_doprava->fetch_assoc()){
	  			$doprava[$arr]["nazev"]=$row_doprava["nazev"];
	  				if($row_doprava["cena"]=="0"){$doprava[$arr]["cena"]="zdarma";}
	  					else $doprava[$arr]["cena"]=$row_doprava["cena"]. " Kč";
	  			$arr++;
	  		}
	  $smarty->assign("doprava",$doprava);
	  
	  $sql_platba="SELECT * FROM platba";
	  	$result_platba=$conn->query($sql_platba);
	  	$arr=0;
	  		while($row_platba=$result_platba->fetch_assoc()){
	  			$platba[$arr]["nazev"]=$row_platba["nazev"];
	  			if($row_platba["cena"]=="0"){$platba[$arr]["cena"]="zdarma";}
	  					else $platba[$arr]["cena"]=$row_platba["cena"]. " Kč";
	  			$arr++;
	  		}
	  $smarty->assign("platba",$platba);
	
	$conn->close();
	$smarty->display("kosikTpl.tpl")
?>