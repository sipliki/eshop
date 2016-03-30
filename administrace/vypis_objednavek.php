<?php
	session_start();
	require'../libs/Smarty.class.php';
	
	$smarty = new Smarty();

	if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
	
	if(isset($_GET["logout"])){
	 unset($_SESSION["user"]);
     header('Location: ../vypis_zbozi.php');
	}

	if(isset($_SESSION["update_objednavky"])){
		$smarty->assign("update_objednavky",$_SESSION["update_objednavky"]);
		unset($_SESSION["update_objednavky"]);
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

	//zruseni objednavky
	if(isset($_POST["zrusit"])){
		$id=$_POST["id_objednavky"];
		$sql_zruseni="DELETE FROM objednavky WHERE id_objednavky='$id'";
		$conn->query($sql_zruseni);
		$smarty->assign("zruseni",$id);
	}

	//načtení uživatele
	$user=$_SESSION["user"];
	$sql_uzivatel="SELECT ID_uzivatele,uzivatelske_jmeno,admin FROM uzivatele WHERE uzivatelske_jmeno='$user'";
	$result_uzivatel=$conn->query($sql_uzivatel);
		$row_uzivatel=$result_uzivatel->fetch_assoc();
			$uzivatel["ID"]=$row_uzivatel["ID_uzivatele"];
			$uzivatel["admin"]=$row_uzivatel["admin"];
			if($row_uzivatel["admin"]=='1'){$smarty->assign("admin",$uzivatel["admin"]);}
	//načtení objednávek
	$id=$uzivatel["ID"];
	$sql_objednavka="SELECT * FROM objednavky";
	//echo $sql_objednavka;
	$result_objednavka=$conn->query($sql_objednavka);
	$pocet_radku=mysqli_num_rows($result_objednavka);
		if($pocet_radku=="0"){$smarty->assign("bez_objednavky",$pocet_radku);}
		else{
			$a=0;
			while($row_objednavka=$result_objednavka->fetch_assoc()){
				$objednavka[$a]["id"]=$row_objednavka["id_objednavky"];
				$objednavka[$a]["jmeno"]=$row_objednavka["jmeno"];
				$objednavka[$a]["prijmeni"]=$row_objednavka["prijmeni"];
				$objednavka[$a]["ulice"]=$row_objednavka["ulice"];
				$objednavka[$a]["mesto"]=$row_objednavka["mesto"];
				$objednavka[$a]["psc"]=$row_objednavka["psc"];
				$objednavka[$a]["celkova_cena"]=$row_objednavka["celkova_cena"]." Kč";
				$objednavka[$a]["doprava"]=$row_objednavka["doprava"];
				$objednavka[$a]["platba"]=$row_objednavka["platba"];
				$objednavka[$a]["datum"]=date("d.m.Y h:i:sa", $row_objednavka["datum_vytvoreni"]);
				$objednavka[$a]["stav"]=$row_objednavka["stav"];
					
					//zboží
					$zbozi=explode(',', $row_objednavka["id_obj_zbozi"]);
					$sql="SELECT id_zbozi,nazev,cena FROM zbozi WHERE id_zbozi IN ('" . implode("', '", $zbozi) . "')";
					//echo $sql;
					$result_zbozi=$conn->query($sql);
					$b=0;
						while($row_zbozi=$result_zbozi->fetch_assoc()){
							$zbozi_vypis[$b]["nazev_zbozi"]=$row_zbozi["nazev"];
							$zbozi_vypis[$b]["cena_zbozi"]=$row_zbozi["cena"]." Kč";
							$b++;
						}
				$objednavka[$a]["zbozi"]=$zbozi_vypis;
				unset($zbozi_vypis);

				//doprava
				$doprava=$row_objednavka["doprava"];
				$sql_doprava="SELECT objednavky.doprava,doprava.nazev,doprava.cena,doprava.id_doprava FROM objednavky INNER JOIN doprava ON objednavky.doprava = doprava.id_doprava WHERE doprava.id_doprava='$doprava'";
					$result_doprava=$conn->query($sql_doprava);
						$row_doprava=$result_doprava->fetch_assoc();
				$objednavka[$a]["nazev_doprava"]=$row_doprava["nazev"];
					if($row_doprava["cena"]=="0"){$objednavka[$a]["cena_doprava"]='zdarma';}
	  					else $objednavka[$a]["cena_doprava"]=$row_doprava["cena"]." Kč";
				
				//platba
				$platba=$row_objednavka["platba"];
				$sql_platba="SELECT objednavky.platba,platba.nazev,platba.cena,platba.id_platba FROM objednavky INNER JOIN platba ON objednavky.platba = platba.id_platba WHERE platba.id_platba='$platba'";
					$result_platba=$conn->query($sql_platba);
						$row_platba=$result_platba->fetch_assoc();
				$objednavka[$a]["nazev_platba"]=$row_platba["nazev"];
					if($row_platba["cena"]=="0"){$objednavka[$a]["cena_platba"]='zdarma';}
	  					else $objednavka[$a]["cena_platba"]=$row_platba["cena"]." Kč";

	  					$a++;
		
		}
		//print_r($objednavka);
		$smarty->assign("objednavka",$objednavka);
	}
$conn->close();
$smarty->display("../templates/vypis_objednavekTpl.tpl");
?>