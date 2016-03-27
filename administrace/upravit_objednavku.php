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
	if(isset($_GET["zrusit"])){
		$id=$_GET["id_objednavky"];
		$sql_zruseni="DELETE FROM objednavky WHERE id_objednavky='$id'";
		$conn->query($sql_zruseni);
		$smarty->assign("zruseni",$id);
	}

	//odebrání zboží
	if(isset($_GET["odebrat"])){
		unset($_SESSION["kosik"][$_GET["id_zbozi"]]);
	}

	//načtení uživatele
	$user=$_SESSION["user"];
	$sql_uzivatel="SELECT ID_uzivatele,uzivatelske_jmeno,admin FROM uzivatele WHERE uzivatelske_jmeno='$user'";
	$result_uzivatel=$conn->query($sql_uzivatel);
		$row_uzivatel=$result_uzivatel->fetch_assoc();
			$uzivatel["ID"]=$row_uzivatel["ID_uzivatele"];
			$uzivatel["admin"]=$row_uzivatel["admin"];
			if($row_uzivatel["admin"]=='1'){$smarty->assign("admin",$uzivatel["admin"]);}

	//načtení objednávky
	$id=$_GET["id"];
	$sql_objednavka="SELECT * FROM objednavky WHERE id_objednavky='$id'";
	//echo $sql_objednavka;
	$result_objednavka=$conn->query($sql_objednavka);
	$pocet_radku=mysqli_num_rows($result_objednavka);
		if($pocet_radku=="0"){$smarty->assign("bez_objednavky",$pocet_radku);}
		else{
			while($row_objednavka=$result_objednavka->fetch_assoc()){
				$objednavka["id"]=$row_objednavka["id_objednavky"];
				$objednavka["jmeno"]=$row_objednavka["jmeno"];
				$objednavka["prijmeni"]=$row_objednavka["prijmeni"];
				$objednavka["ulice"]=$row_objednavka["ulice"];
				$objednavka["mesto"]=$row_objednavka["mesto"];
				$objednavka["psc"]=$row_objednavka["psc"];
				$objednavka["celkova_cena"]=$row_objednavka["celkova_cena"]." Kč";
				$objednavka["doprava"]=$row_objednavka["doprava"];
				$objednavka["platba"]=$row_objednavka["platba"];
				$objednavka["datum"]=date("d.m.Y h:i:sa", $row_objednavka["datum_vytvoreni"]);
				$objednavka["stav"]=$row_objednavka["stav"];
					
					//zboží
					$zbozi=explode(',', $row_objednavka["id_obj_zbozi"]);
					$sql="SELECT id_zbozi,nazev,cena FROM zbozi WHERE id_zbozi IN ('" . implode("', '", $zbozi) . "')";
					//echo $sql;
					$result_zbozi=$conn->query($sql);
						while($row_zbozi=$result_zbozi->fetch_assoc()){
							$id_zbozi[$row_zbozi["id_zbozi"]]["id"]=$row_zbozi["id_zbozi"];
							$zbozi_vypis[$row_zbozi["id_zbozi"]]["nazev_zbozi"]=$row_zbozi["nazev"];
							$zbozi_vypis[$row_zbozi["id_zbozi"]]["cena_zbozi"]=$row_zbozi["cena"]." Kč";
							$_SESSION["zbozi"][$row_zbozi["id_zbozi"]]=$row_zbozi["id_zbozi"];

						}
				$objednavka["id_zbozi"]=$id_zbozi;
				$objednavka["zbozi"]=$zbozi_vypis;
				unset($zbozi_vypis);

				//doprava
				$doprava=$row_objednavka["doprava"];
				$sql_doprava="SELECT objednavky.doprava,doprava.nazev,doprava.cena FROM objednavky INNER JOIN doprava ON objednavky.doprava = doprava.nazev WHERE doprava.nazev='$doprava'";
					$result_doprava=$conn->query($sql_doprava);
						$row_doprava=$result_doprava->fetch_assoc();
				$objednavka["nazev_doprava"]=$row_doprava["nazev"];
					if($row_doprava["cena"]=="0"){$objednavka["cena_doprava"]='zdarma';}
	  					else $objednavka["cena_doprava"]=$row_doprava["cena"]." Kč";
				
				//platba
				$platba=$row_objednavka["platba"];
				$sql_platba="SELECT objednavky.platba,platba.nazev,platba.cena FROM objednavky INNER JOIN platba ON objednavky.platba = platba.nazev WHERE platba.nazev='$platba'";
					$result_platba=$conn->query($sql_platba);
						$row_platba=$result_platba->fetch_assoc();
				$objednavka["nazev_platba"]=$row_platba["nazev"];
					if($row_platba["cena"]=="0"){$objednavka["cena_platba"]='zdarma';}
	  					else $objednavka["cena_platba"]=$row_platba["cena"]." Kč";
		
		}
		//print_r($objednavka);
		
	}

	//výpis doprava
	$vychozi_doprava=$objednavka["nazev_doprava"];
				$sql_doprava="SELECT * FROM doprava ";
					$result_doprava=$conn->query($sql_doprava);
				$a=0;
				while($row_doprava=$result_doprava->fetch_assoc()){
					$id_doprava=$row_doprava["id_doprava"];
					$nazev_doprava=$row_doprava["nazev"];
					if($vychozi_doprava==$row_doprava["id_doprava"]){$doprava_vypis[$a]["nazev"]="<option value='$id_doprava' selected>".$nazev_doprava." </option>";}
						else{$doprava_vypis[$a]["nazev"]="<option value='$id_doprava' >".$nazev_doprava." </option>";}
					$a++;
					
				}
			//print_r($doprava_vypis);
	$smarty->assign("doprava_vypis",$doprava_vypis);

	//výpis platba
	$vychozi_platba=$objednavka["platba"];
				$sql_platba="SELECT * FROM platba ";
					$result_platba=$conn->query($sql_platba);
				$b=0;
				while($row_platba=$result_platba->fetch_assoc()){
					$id_platba=$row_platba["id_platba"];
					$nazev_platba=$row_platba["nazev"];
					if($vychozi_platba==$row_platba["id_platba"]){$platba_vypis[$b]["nazev"]="<option value='$id_platba' selected>".$nazev_platba." </option>";}
						else{$platba_vypis[$b]["nazev"]="<option value='$id_platba' >".$nazev_platba." </option>";}
					$b++;
					
				}
			//print_r($platba_vypis);
	$smarty->assign("platba_vypis",$platba_vypis);

	//odebrání zboží
	if(isset($_GET["odebrat"])){
		unset($objednavka["zbozi"][$_GET["id_zbozi"]]);
		unset($objednavka["id_zbozi"][$_GET["id_zbozi"]]);
		unset($_SESSION["zbozi"][$_GET["id_zbozi"]]);
	}
	$smarty->assign("objednavka",$objednavka);

	//update objednavky
	if(isset($_GET["update"])){
		$id=$_GET["id"];
		$jmeno=$_GET["jmeno"];
		$prijmeni=$_GET["prijmeni"];
		$ulice=$_GET["ulice"];
		$mesto=$_GET["mesto"];
		$psc=$_GET["psc"];
		$zbozi=implode(',', array_keys($_SESSION["zbozi"]));
		$doprava=$_GET["doprava"];
		$platba=$_GET["platba"];
		$celkova_cena=0;

			$sql_cena="SELECT id_zbozi, cena FROM zbozi WHERE id_zbozi IN ('" . implode("', '", array_keys($_SESSION["zbozi"])) . "')";
			$result_cena=$conn->query($sql_cena);
						while($row_cena=$result_cena->fetch_assoc()){
							$celkova_cena+=$row_cena["cena"];
						}
		
		$sql="UPDATE objednavky SET jmeno='$jmeno', prijmeni='$prijmeni', ulice='$ulice', mesto='$mesto', psc='$psc', id_obj_zbozi='$zbozi', celkova_cena='$celkova_cena', doprava='$doprava', platba='$platba' WHERE id_objednavky='$id'";
		$conn->query($sql);
		 $_SESSION["update_objednavky"]=1;
		 header('Location: vypis_objednavek.php');

	}
$conn->close();
$smarty->display("../templates/upravit_objednavkuTpl.tpl");
?>