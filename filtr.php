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
   if(isset($_SESSION["kosik"])){$smarty->assign("kosik",$_SESSION["kosik"]);}

   if(isset($_SESSION["fail_database"])){$smarty->assign("fail_database",$_SESSION["fail_database"]);unset($_SESSION["fail_database"]);}

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

//vypis kategorii
  $sql_kategorie="SELECT * FROM kategorie";
    $result_kategorie=$conn->query($sql_kategorie);
    $arr=0;
      while ($row_kategorie=$result_kategorie->fetch_assoc()) {
        $kategorie[$arr]["id"]=$row_kategorie["id_kategorie"];
        $kategorie[$arr]["nazev"]=$row_kategorie["nazev_kategorie"];
        $kategorie[$arr]["presmerovani"]="filtr.php?kategorie=".$row_kategorie['id_kategorie'];
        $arr++;
      }
      $smarty->assign("kategorie",$kategorie);

      

  if(isset($_GET["filtr"])){$sql=$_SESSION["filtr"];}

  if(!isset($_GET["kategorie"])){$_SESSION["fail_kategorie"]='1';header('Location: vypis_zbozi.php');}
    else{
      $kategorie=$_GET["kategorie"];
      $sql="SELECT * FROM zbozi WHERE kategorie='$kategorie'";
    }

    $sql_kategorie_id="SELECT * FROM kategorie WHERE id_kategorie='$kategorie'";
        $result_kategorie_id=$conn->query($sql_kategorie_id);
          $row_kategorie_id=$result_kategorie_id->fetch_assoc();
            $kategorie_id["id"]=$row_kategorie_id["id_kategorie"];

      $smarty->assign("kategorie_id",$kategorie_id);
    //vyhledavani
        if(isset($_GET["search"])){$search=$_GET["search"];$kategorie_search=$_GET["kategorie"];$sql="SELECT * FROM zbozi WHERE kategorie='$kategorie_search' AND nazev LIKE '%$search%'";}

  //vypis filtru
    //vyrobce
   $sql_vyrobce="SELECT vyrobce.id_vyrobce, vyrobce.nazev_vyrobce FROM vyrobce INNER JOIN zbozi ON vyrobce.id_vyrobce = zbozi.vyrobce WHERE zbozi.kategorie='$kategorie'";
   $result_vyrobce=$conn->query($sql_vyrobce);
   $arr=0;
   $vyrobce=array();
   $vyrobce_id=array();
    while($row_vyrobce=$result_vyrobce->fetch_assoc()){
    if(!in_array($row_vyrobce["id_vyrobce"], $vyrobce_id)){
      $vyrobce_id[$row_vyrobce["id_vyrobce"]]=$row_vyrobce["id_vyrobce"];

      $vyrobce[$arr]["id"]=$row_vyrobce["id_vyrobce"];
    $vyrobce[$arr]["nazev"]=$row_vyrobce["nazev_vyrobce"];}
    $arr++;
   }
   $smarty->assign("vyrobce",$vyrobce);

    //procesor
   $sql_procesor="SELECT procesor.id_procesoru, procesor.nazev_procesoru, procesor.pocet_jader FROM procesor INNER JOIN zbozi ON procesor.id_procesoru = zbozi.procesor WHERE zbozi.kategorie='$kategorie'";
   $result_procesor=$conn->query($sql_procesor);
   $arr=0;
   $procesor=array();
   $procesor_id=array();
    while($row_procesor=$result_procesor->fetch_assoc()){
    if(!in_array($row_procesor["id_procesoru"], $procesor_id)){
      $procesor_id[$row_procesor["id_procesoru"]]=$row_procesor["id_procesoru"];

      $procesor[$arr]["id"]=$row_procesor["id_procesoru"];
      $procesor[$arr]["nazev"]=$row_procesor["nazev_procesoru"];
      $procesor[$arr]["pocet_jader"]=$row_procesor["pocet_jader"];
  }
    $arr++;
   }
    $smarty->assign("procesor",$procesor);

    //os
    $sql_os="SELECT operacni_system.id_os, operacni_system.nazev_os FROM operacni_system INNER JOIN zbozi ON operacni_system.id_os = zbozi.operacni_system WHERE zbozi.kategorie='$kategorie'";
   $result_os=$conn->query($sql_os);
   $arr=0;
   $os=array();
   $os_id=array();
    while($row_os=$result_os->fetch_assoc()){
    if(!in_array($row_os["id_os"], $os_id)){
      $os_id[$row_os["id_os"]]=$row_os["id_os"];

    $os[$arr]["id"]=$row_os["id_os"];
    $os[$arr]["nazev"]=$row_os["nazev_os"];}
    $arr++;
   }
   $smarty->assign("os",$os);

   //stav_zbozi
    $sql_sz="SELECT stav_zbozi.id_stavu,stav_zbozi.nazev_stavu FROM stav_zbozi INNER JOIN zbozi ON stav_zbozi.id_stavu = zbozi.stav_zbozi WHERE zbozi.kategorie='$kategorie'";
   $result_sz=$conn->query($sql_sz);
   $arr=0;
   $sz=array();
   $sz_id=array();
    while($row_sz=$result_sz->fetch_assoc()){
    if(!in_array($row_sz["id_stavu"], $sz_id)){
      $sz_id[$row_sz["id_stavu"]]=$row_sz["id_stavu"];

      $sz[$arr]["id"]=$row_sz["id_stavu"];
    $sz[$arr]["nazev"]=$row_sz["nazev_stavu"];}
    $arr++;
   }
   $smarty->assign("sz",$sz);

   //rozliseni
    $sql_rozliseni="SELECT rozliseni_displeje.id_rozliseni, rozliseni_displeje.nazev_rozliseni FROM rozliseni_displeje INNER JOIN zbozi ON rozliseni_displeje.id_rozliseni = zbozi.rozliseni_displeje WHERE zbozi.kategorie='$kategorie'";
   $result_rozliseni=$conn->query($sql_rozliseni);
   $arr=0;
   $rozliseni=array();
   $rozliseni_id=array();
    while($row_rozliseni=$result_rozliseni->fetch_assoc()){
    if(!in_array($row_rozliseni["id_rozliseni"], $rozliseni_id)){
      $rozliseni_id[$row_rozliseni["id_rozliseni"]]=$row_rozliseni["id_rozliseni"];

      $rozliseni[$arr]["id"]=$row_rozliseni["id_rozliseni"];
    $rozliseni[$arr]["nazev"]=$row_rozliseni["nazev_rozliseni"];}
    $arr++;
   }
   $smarty->assign("rozliseni",$rozliseni);

   //dostupnost
    $sql_dostupnost="SELECT dostupnost.id_dostupnost, dostupnost.nazev_dostupnosti FROM dostupnost INNER JOIN zbozi ON dostupnost.id_dostupnost = zbozi.dostupnost WHERE zbozi.kategorie='$kategorie'";
   $result_dostupnost=$conn->query($sql_dostupnost);
   $arr=0;
   $dostupnost=array();
   $dostupnost_id=array();
    while($row_dostupnost=$result_dostupnost->fetch_assoc()){
    if(!in_array($row_dostupnost["id_dostupnost"], $dostupnost_id)){
      $dostupnost_id[$row_dostupnost["id_dostupnost"]]=$row_dostupnost["id_dostupnost"];

      $dostupnost[$arr]["id"]=$row_dostupnost["id_dostupnost"];
    $dostupnost[$arr]["nazev"]=$row_dostupnost["nazev_dostupnosti"];}
    $arr++;
   }
   $smarty->assign("dostupnost",$dostupnost);

//gpu
    $sql_gpu="SELECT grafika.id_gpu, grafika.nazev_gpu FROM grafika INNER JOIN zbozi ON grafika.id_gpu = zbozi.gpu WHERE zbozi.kategorie='$kategorie'";
   $result_gpu=$conn->query($sql_gpu);
   $arr=0;
   $gpu=array();
   $gpu_id=array();
    while($row_gpu=$result_gpu->fetch_assoc()){
    if(!in_array($row_gpu["id_gpu"], $gpu_id)){
      $gpu_id[$row_gpu["id_gpu"]]=$row_gpu["id_gpu"];

      $gpu[$arr]["id"]=$row_gpu["id_gpu"];
    $gpu[$arr]["nazev"]=$row_gpu["nazev_gpu"];}
    $arr++;
   }
   $smarty->assign("gpu",$gpu);

  //filtrovani
  if(isset($_GET["filtrovani"])){
    $kategorie=$_GET["kategorie"];
    $sql="SELECT * FROM zbozi WHERE kategorie='$kategorie'";
      //print_r($_GET["vyrobce"]);
      if(isset($_GET["vyrobce"])){$a=implode("','",$_GET["vyrobce"]);$sql.=" AND vyrobce IN ('$a')";unset($a);} 

      if(isset($_GET["procesor"])){$a=implode("','",$_GET["procesor"]);$sql.=" AND procesor IN ('$a')";unset($a);}

      if(isset($_GET["os"])){$a=implode("',",$_GET["os"]);$sql.=" AND operacni_system IN ('$a')";unset($a);}

      if(isset($_GET["sz"])){$a=implode("',",$_GET["sz"]);$sql.=" AND stav_zbozi IN ('$a')";unset($a);}

      if(isset($_GET["dostupnost"])){$a=implode("',",$_GET["dostupnost"]);$sql.=" AND dostupnost IN ('$a')";unset($a);}

      if(isset($_GET["rozliseni"])){$a=implode("',",$_GET["rozliseni"]);$sql.=" AND rozliseni_displeje IN ('$a')";unset($a);}

      if(isset($_GET["gpu"])){$a=implode("',",$_GET["gpu"]);$sql.=" AND gpu IN ('$a')";unset($a);}

  }
  //echo $sql;

    // Načtení databáze do associativího pole
	$result = $conn->query($sql);
    //print_r($result);

  //Výpis položek
  if(mysqli_num_rows($result)==0){
    $_SESSION["fail_database"]='1';
  }
  else{
    function get_db_results($result){
  $arr=0;
      while($row = $result->fetch_assoc()) {
        $zbozi[$arr]["id"]=$row["id_zbozi"];
        $zbozi[$arr]["nazev"]=$row["nazev"];
        $zbozi[$arr]["popis"]=$row["popis"];
        $zbozi[$arr]["cena"]=$row["cena"];
        $zbozi[$arr]["obrazek"]=$row["image"];
        $arr++;
      }

    SmartyPaginate::setTotal(count($zbozi));
    return array_slice($zbozi, SmartyPaginate::getCurrentIndex(),
            SmartyPaginate::getLimit());
    }
  }

  // Ukončíme spojení s databází
  $conn->close();
 

  $smarty->assign("zbozi",get_db_results($result));
SmartyPaginate::assign($smarty);
$smarty->display("filtrTpl.tpl");
?>