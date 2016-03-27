<?php
  session_start();
  require'libs/Smarty.class.php';
  $smarty=new Smarty();

  if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
   if(isset($_GET["logout"])){
   unset($_SESSION["user"]);
   header('Location: vypis_zbozi.php');
  }
  if(isset($_GET["filtr"])){
    $filtr=$_SESSION["filtr"];
    $smarty->assign("filtr",$filtr);
  }
   $id=$_GET["id"];
   
  $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eshop";

		// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
	if ($conn->connect_error) {
    die("Nezdařilo se spojit s DB: " . $conn->connect_error);
		}

  //přidání zboží

    if(isset($_GET["pridat_zbozi"])){
       $_SESSION["kosik"][$_GET["id_kosik"]]=1;
    }

  if(isset($_SESSION["kosik"])){$smarty->assign("kosik",$_SESSION["kosik"]);
}
	$sql = "SET CHARACTER SET utf8";
	$conn->query($sql);
	
	$dotaz="SELECT * FROM zbozi WHERE id_zbozi='$id'";
	$result=$conn->query($dotaz);
		$row = $result->fetch_assoc();
    	$zbozi["id"]=$row["id_zbozi"];
      $zbozi["nazev"]=$row["nazev"];
      $zbozi["popis"]=$row["popis"];
      $zbozi["cena"]=$row["cena"];
      $zbozi["obrazek"]=$row["image"];
      $zbozi["interni_pamet"]=$row["interni_pamet"];
      $zbozi["operacni_pamet"]=$row["operacni_pamet"];
      $zbozi["uhlopricka"]=$row["uhlopricka_displeje"];
      $zbozi["kategorie"]=$row["kategorie"];
        $smarty->assign("zbozi",$zbozi);
	
    $vyrobce_dotaz="SELECT zbozi.vyrobce, vyrobce.nazev_vyrobce FROM zbozi INNER JOIN vyrobce ON zbozi.vyrobce=vyrobce.id_vyrobce WHERE id_zbozi='$id'";
    $result_vyrobce=$conn->query($vyrobce_dotaz);
      $row_vyrobce = $result_vyrobce->fetch_assoc();
        $vyrobce["nazev_vyrobce"]=$row_vyrobce["nazev_vyrobce"];
          $smarty->assign("vyrobce",$vyrobce);

    $procesor_dotaz="SELECT zbozi.procesor, procesor.nazev_procesoru, procesor.pocet_jader FROM zbozi INNER JOIN procesor ON zbozi.procesor=procesor.id_procesoru WHERE id_zbozi='$id'";
    $result_procesor=$conn->query($procesor_dotaz);
    $row_procesor = $result_procesor->fetch_assoc();
        $procesor["nazev"]=$row_procesor["nazev_procesoru"];
        $procesor["pocet_jader"]=$row_procesor["pocet_jader"];
          $smarty->assign("procesor",$procesor);

    $rozliseni_dotaz="SELECT zbozi.rozliseni_displeje, rozliseni_displeje.nazev_rozliseni, rozliseni_displeje.pocet_pixelu_x, rozliseni_displeje.pocet_pixelu_y FROM zbozi INNER JOIN rozliseni_displeje ON zbozi.rozliseni_displeje=rozliseni_displeje.id_rozliseni WHERE id_zbozi='$id'"; 
    $result_rozliseni=$conn->query($rozliseni_dotaz);
    $row_rozliseni = $result_rozliseni->fetch_assoc();
      $rozliseni["nazev"]=$row_rozliseni["nazev_rozliseni"];
      $rozliseni["x"]=$row_rozliseni["pocet_pixelu_x"];
      $rozliseni["y"]=$row_rozliseni["pocet_pixelu_y"];
        $smarty->assign("rozliseni",$rozliseni);

      $os_dotaz="SELECT zbozi.operacni_system, operacni_system.nazev_os FROM zbozi INNER JOIN operacni_system ON zbozi.operacni_system=operacni_system.id_os WHERE id_zbozi='$id'";
      $result_os=$conn->query($os_dotaz);
      $row_os = $result_os->fetch_assoc();
        $os["nazev"]=$row_os["nazev_os"];
          $smarty->assign("os",$os);

      $gpu_dotaz="SELECT * FROM zbozi INNER JOIN grafika ON zbozi.gpu=grafika.id_gpu WHERE id_zbozi='$id'";
      $result_gpu=$conn->query($gpu_dotaz);
      $row_gpu=$result_gpu->fetch_assoc();
        $gpu["nazev"]=$row_gpu["nazev_gpu"];
        $gpu["pamet"]=$row_gpu["pamet_gpu"];
          $smarty->assign("gpu",$gpu);

      $dostupnost_dotaz="SELECT zbozi.dostupnost, dostupnost.id_dostupnost, dostupnost.nazev_dostupnosti FROM zbozi INNER JOIN dostupnost ON zbozi.dostupnost=dostupnost.id_dostupnost WHERE id_zbozi='$id'";
      $result_dostupnost=$conn->query($dostupnost_dotaz);
      $row_dostupnost=$result_dostupnost->fetch_assoc();
        $dostupnost["nazev"]=$row_dostupnost["nazev_dostupnosti"];
          $smarty->assign("dostupnost",$dostupnost);

      $stav_dotaz="SELECT zbozi.stav_zbozi, stav_zbozi.nazev_stavu FROM zbozi INNER JOIN stav_zbozi ON zbozi.stav_zbozi=stav_zbozi.id_stavu WHERE id_zbozi='$id'";
      $result_stav=$conn->query($stav_dotaz);
      $row_stav=$result_stav->fetch_assoc();
        $stav["nazev"]=$row_stav["nazev_stavu"];
          $smarty->assign("stav",$stav);

	$conn->close();
  $smarty->display("detailTpl.tpl");
?>