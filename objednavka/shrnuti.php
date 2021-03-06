<?php
	session_start();
	require'../libs/Smarty.class.php';

	$smarty = new Smarty();

	if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
	
	if(isset($_GET["logout"])){
	 unset($_SESSION["user"]);
     header('Location: shrnuti.php');
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

	//zboží, doprava, platba
	if(isset($_SESSION["doprava"])){$doprava=$_SESSION["doprava"];unset($_SESSION["doprava"]);}
	   else {$doprava=$_GET["doprava"];}
	 if(isset($_SESSION["platba"])){$platba=$_SESSION["platba"];unset($_SESSION["platba"]);}
	   else {$platba=$_GET["platba"];}
	   $celkova_cena=0;

       $sql="SELECT id_zbozi,nazev,cena FROM zbozi WHERE id_zbozi IN ('" . implode("', '", array_keys($_SESSION["kosik"])) . "')";
       $result =$conn->query($sql);
    	  while($row =$result->fetch_assoc()) {
        	$zbozi[$row["id_zbozi"]]["nazev"]=$row["nazev"];
      		$zbozi[$row["id_zbozi"]]["cena"]=$row["cena"]." Kč";
      		$celkova_cena+=$row["cena"];
    	  }
	$smarty->assign("zbozi",$zbozi);

	$sql_doprava="SELECT * FROM doprava WHERE id_doprava='$doprava'";
		$result_doprava=$conn->query($sql_doprava);
			$row_doprava=$result_doprava->fetch_assoc();
				$doprava_vypis["id"]=$row_doprava["id_doprava"];
				$doprava_vypis["nazev"]=$row_doprava["nazev"];
				$doprava_vypis["cena"]=$row_doprava["cena"];
				$celkova_cena+=$row_doprava["cena"];
				$_SESSION["doprava"]=$row_doprava["id_doprava"];
					$smarty->assign("doprava",$doprava_vypis);

		$sql_platba="SELECT * FROM platba WHERE id_platba='$platba'";
		$result_platba=$conn->query($sql_platba);
			$row_platba=$result_platba->fetch_assoc();
				$platba_vypis["id"]=$row_platba["id_platba"];
				$platba_vypis["nazev"]=$row_platba["nazev"];
				$platba_vypis["cena"]=$row_platba["cena"];
				$celkova_cena+=$row_platba["cena"];
				$_SESSION["platba"]=$row_platba["id_platba"];
					$smarty->assign("platba",$platba_vypis);
					
		$smarty->assign("celkova_cena",$celkova_cena);

	//uživatel
	if(isset($_SESSION["user"])){$smarty->assign("session_user",$_SESSION["user"]);
		$name=$_SESSION["user"];
		$sql_user="SELECT * FROM uzivatele WHERE uzivatelske_jmeno='$name'";
			$result_user=$conn->query($sql_user);
			$row_user=$result_user->fetch_assoc();
				$user["id"]=$row_user["ID_uzivatele"];
				$user["nick"]=$row_user["uzivatelske_jmeno"];
				$user["jmeno"]=$row_user["jmeno"];
				$user["prijmeni"]=$row_user["prijmeni"];
				$user["ulice"]=$row_user["ulice"];
				$user["mesto"]=$row_user["mesto"];
				$user["psc"]=$row_user["psc"];
			$smarty->assign("user",$user);
			}

//vytvoření objednavky
	if(isset($_POST["objednat"])){
		$jmeno= $_POST["jmeno"];
		$prijmeni=$_POST["prijmeni"];
		$ulice=$_POST["ulice"];
		$mesto=$_POST["mesto"];
		$psc=$_POST["psc"];
		if(isset($_POST["id"])){$id=$_POST["id"];}
			else{$id="neregistrovaný uživatel";}
		$doprava=$_POST["doprava"];
		$platba=$_POST["platba"];
		$celkova_cena=$_POST["cena"];
		$datum=strtotime("now");
		$zbozi_zapis=implode(',', array_keys($_SESSION["kosik"]));
			$sql_objednavka="INSERT INTO objednavky VALUES ('NULL','$jmeno','$prijmeni','$ulice','$mesto','$psc','$zbozi_zapis','$celkova_cena','$doprava','$platba','$id','$datum','1')";
		$conn->query($sql_objednavka);
		unset($_SESSION["kosik"]);
		//echo $sql_objednavka;
		header('Location: prijato.php');
	}


	$conn->close();
	$smarty->display("../templates/shrnutiTpl.tpl")
?>