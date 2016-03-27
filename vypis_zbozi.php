<?php
    session_start();
    require'libs/Smarty.class.php';
    require'libs/SmartyPaginate.class.php';

    $smarty = new Smarty();
    SmartyPaginate::connect();
   SmartyPaginate::setLimit(9);

if(isset($_GET["pridat_zbozi"])){
       $_SESSION["kosik"][$_GET["id_kosik"]]=1;
    }

if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);}

if(isset($_SESSION["kosik"])){
      $smarty->assign("kosik",$_SESSION["kosik"]);}

      if(isset($_SESSION["fail_kategorie"])){
      $smarty->assign("fail_kategorie",$_SESSION["fail_kategorie"]);unset($_SESSION["fail_kategorie"]);}

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
      //print_r($kategorie);
      
  //vyhledavani
 if(isset($_GET["search"])){
    $search=$_GET["search"];
      $sql="SELECT * FROM zbozi WHERE nazev LIKE '%$search%'";}
  else{$sql="SELECT * FROM zbozi";}
  
    // Načtení databáze do associativího pole
	$result = $conn->query($sql);

  //Výpis položek
if(mysqli_num_rows($result)==0){
    $_SESSION["fail_database"]='1';
   header('Location: vypis_zbozi.php');
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
 $smarty->display("zboziTpl.tpl");
?>