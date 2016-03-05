<?php
    session_start();
    require'libs/Smarty.class.php';
    require'libs/SmartyPaginate.class.php';

    $smarty = new Smarty();
    SmartyPaginate::connect();
   SmartyPaginate::setLimit(9);

if(isset($_GET["pridat_zbozi"])){
       $_SESSION["kosik"][$_GET["id_kosik"]]=$_GET["pocet_kusu"];
    }
    
if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
   if(isset($_GET["logout"])){
   unset($_SESSION["user"]);
   header('Location: filtr.php');
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

  if(isset($_GET["filtr"])){$sql=$_SESSION["filtr"];}

  //kategorie
  @$kategorie=$_GET["kategorie"];
  if($kategorie=="notebook"){$sql="SELECT * FROM zbozi WHERE kategorie='1'";$smarty->assign("notebook",$kategorie);}
    else if($kategorie=="pc"){$sql="SELECT * FROM zbozi WHERE kategorie='2'";$smarty->assign("pc",$kategorie);}
      else if($kategorie=="mobil"){$sql="SELECT * FROM zbozi WHERE kategorie='3'";$smarty->assign("mobil",$kategorie);}
        else if($kategorie=="tablet"){$sql="SELECT * FROM zbozi WHERE kategorie='4'";$smarty->assign("tablet",$kategorie);}
  
        //vyhledavani
        if(isset($_GET["ntb_search"])){$ntb_search=$_GET["ntb_search"];$sql="SELECT * FROM zbozi WHERE kategorie='1' AND nazev LIKE '%$ntb_search%'";$smarty->assign("search",$ntb_search);}
        if(isset($_GET["pc_search"])){$pc_search=$_GET["pc_search"];$sql="SELECT * FROM zbozi WHERE kategorie='2' AND nazev LIKE '%$pc_search%'";$smarty->assign("search",$pc_search);}
        if(isset($_GET["mobil_search"])){$mobil_search=$_GET["mobil_search"];$sql="SELECT * FROM zbozi WHERE kategorie='3' AND nazev LIKE '%$mobil_search%'";$smarty->assign("search",$mobil_search);}
        if(isset($_GET["tablet_search"])){$tablet_search=$_GET["tablet_search"];$sql="SELECT * FROM zbozi WHERE kategorie='4' AND nazev LIKE '%$tablet_search%'";$smarty->assign("search",$tablet_search);}

  //filtrovani noteboku
  if(isset($_GET["filtruj_notebooky"])){
    $sql="SELECT * FROM zbozi WHERE kategorie='1'";
      //print_r($_GET["vyrobce"]);
      if(isset($_GET["vyrobce"])){$a=implode("','",$_GET["vyrobce"]);$sql.="AND vyrobce IN ('$a')";unset($a);} 

      if(isset($_GET["procesor"])){$a=implode("','",$_GET["procesor"]);$sql.="AND procesor IN ('$a')";unset($a);}

      if(isset($_GET["os"])){$a=implode("',",$_GET["os"]);$sql.="AND operacni_system IN ($a)";unset($a);}

      if(isset($_GET["sz"])){$a=implode("',",$_GET["sz"]);$sql.="AND stav_zbozi IN ($a)";unset($a);}

      if(isset($_GET["dostupnost"])){$a=implode("',",$_GET["dostupnost"]);$sql.="AND dostupnost IN ($a)";unset($a);}

      if(isset($_GET["rozliseni"])){$a=implode("',",$_GET["rozliseni"]);$sql.="AND rozliseni_displeje IN ($a)";unset($a);}

      if(isset($_GET["gpu"])){$a=implode("',",$_GET["gpu"]);$sql.="AND gpu IN ($a)";unset($a);}

  }
  //filtrovani pc
  if(isset($_GET["filtruj_pc"])){
    $sql="SELECT * FROM zbozi WHERE kategorie='2'";

      if(isset($_GET["vyrobce"])){$a=implode("','",$_GET["vyrobce"]);$sql.="AND vyrobce IN ('$a')";unset($a);} 

      if(isset($_GET["procesor"])){$a=implode("','",$_GET["procesor"]);$sql.="AND procesor IN ('$a')";unset($a);}

      if(isset($_GET["os"])){$a=implode("','",$_GET["os"]);$sql.="AND operacni_system IN ($a)";unset($a);}

      if(isset($_GET["sz"])){$a=implode("','",$_GET["sz"]);$sql.="AND stav_zbozi IN ($a)";unset($a);}

      if(isset($_GET["dostupnost"])){$a=implode("','",$_GET["dostupnost"]);$sql.="AND dostupnost IN ($a)";unset($a);}

      if(isset($_GET["rozliseni"])){$a=implode("','",$_GET["rozliseni"]);$sql.="AND rozliseni_displeje IN ($a)";unset($a);}

      if(isset($_GET["gpu"])){$a=implode("','",$_GET["gpu"]);$sql.="AND gpu IN ($a)";unset($a);}


  }

  //filtrovani mobilu
  if(isset($_GET["filtruj_mobily"])){
    $sql="SELECT * FROM zbozi WHERE kategorie='3'";
      if(isset($_GET["vyrobce"])){$a=implode("','",$_GET["vyrobce"]);$sql.="AND vyrobce IN ('$a')";unset($a);} 

      if(isset($_GET["procesor"])){$a=implode("','",$_GET["procesor"]);$sql.="AND procesor IN ('$a')";unset($a);}

      if(isset($_GET["os"])){$a=implode("','",$_GET["os"]);$sql.="AND operacni_system IN ($a)";unset($a);}

      if(isset($_GET["sz"])){$a=implode("','",$_GET["sz"]);$sql.="AND stav_zbozi IN ($a)";unset($a);}

      if(isset($_GET["dostupnost"])){$a=implode("','",$_GET["dostupnost"]);$sql.="AND dostupnost IN ($a)";unset($a);}

      if(isset($_GET["rozliseni"])){$a=implode("','",$_GET["rozliseni"]);$sql.="AND rozliseni_displeje IN ($a)";unset($a);}

      if(isset($_GET["gpu"])){$a=implode("','",$_GET["gpu"]);$sql.="AND gpu IN ($a)";unset($a);}
  }

  //filtrovani tabletu
  if(isset($_GET["filtruj_tablety"])){
    $sql="SELECT * FROM zbozi WHERE kategorie='4'";
      if(isset($_GET["vyrobce"])){$a=implode("','",$_GET["vyrobce"]);$sql.="AND vyrobce IN ('$a')";unset($a);} 

      if(isset($_GET["procesor"])){$a=implode("','",$_GET["procesor"]);$sql.="AND procesor IN ('$a')";unset($a);}

      if(isset($_GET["os"])){$a=implode("','",$_GET["os"]);$sql.="AND operacni_system IN ($a)";unset($a);}

      if(isset($_GET["sz"])){$a=implode("','",$_GET["sz"]);$sql.="AND stav_zbozi IN ($a)";unset($a);}

      if(isset($_GET["dostupnost"])){$a=implode("','",$_GET["dostupnost"]);$sql.="AND dostupnost IN ($a)";unset($a);}

      if(isset($_GET["rozliseni"])){$a=implode("','",$_GET["rozliseni"]);$sql.="AND rozliseni_displeje IN ($a)";unset($a);}

      if(isset($_GET["gpu"])){$a=implode("','",$_GET["gpu"]);$sql.="AND gpu IN ($a)";unset($a);}
  }
  //echo $sql;
    // Načtení databáze do associativího pole
	$result = $conn->query($sql);

  //Výpis položek
function get_db_results($result){
  $arr=0;
    while($row = $result->fetch_assoc()) {
      $zbozi[$arr]["id"]=$row["id_zbozi"];
      $zbozi[$arr]["nazev"]=$row["nazev"];
      $zbozi[$arr]["popis"]=$row["popis"];
      $zbozi[$arr]["cena"]=$row["cena"];
      if(!isset($row["image"])){$zbozi[$arr]["obrazek"]="../images/bez_obrazku.png";}
        else {$zbozi[$arr]["obrazek"]=$row["image"];}
      $arr++;
    }
    SmartyPaginate::setTotal(count($zbozi));
    return array_slice($zbozi, SmartyPaginate::getCurrentIndex(),
            SmartyPaginate::getLimit());
              }
  // Ukončíme spojení s databází
  $conn->close();
  if(isset($_SESSION["kosik"])){$smarty->assign("kosik",$_SESSION["kosik"]);}

  $smarty->assign("zbozi",get_db_results($result));
SmartyPaginate::assign($smarty);
$smarty->display("filtrTpl.tpl");
?>