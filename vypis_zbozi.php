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
      $smarty->assign("session_user",$_SESSION["user"]);}

if(isset($_SESSION["kosik"])){
      $smarty->assign("kosik",$_SESSION["kosik"]);}

   if(isset($_GET["logout"])){
   unset($_SESSION["user"]);
   header('Location: vypis_zbozi.php');
  }

  if(isset($_SESSION["prazdny_kosik"])){$smarty->assign("prazdny_kosik","1");unset($_SESSION["prazdny_kosik"]);}
  
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

  //vyhledavani
  if(isset($_GET["search"])){
    $search=$_GET["search"];
      $sql="SELECT * FROM zbozi WHERE nazev LIKE '%$search%'";
  }
  else{$sql="SELECT * FROM zbozi";}
  
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
      $zbozi[$arr]["obrazek"]=$row["image"];
      $arr++;
    }
    SmartyPaginate::setTotal(count($zbozi));
    return array_slice($zbozi, SmartyPaginate::getCurrentIndex(),
            SmartyPaginate::getLimit());
              }
  // Ukončíme spojení s databází
  $conn->close();

  $smarty->assign("zbozi",get_db_results($result));
SmartyPaginate::assign($smarty);
if(isset($_GET['vypis']))$_SESSION['vypis']=$_GET['vypis'];
@$a=$_SESSION['vypis'];
if($a=="table") $smarty->display("zbozi2Tpl.tpl");
  else $smarty->display("zboziTpl.tpl");
?>