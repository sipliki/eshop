<?php
    session_start();
    require'../libs/Smarty.class.php';

    $smarty = new Smarty();

if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
   if(isset($_SESSION["pridano"])){
      $smarty->assign("pridano",$_SESSION["pridano"]);
      unset($_SESSION["pridano"]);
   }
   if(isset($_SESSION["admin"])){
      $smarty->assign("admin",$_SESSION["admin"]);
   }
   if(isset($_SESSION["update_fail"])){$smarty->assign("update_fail",$_SESSION["update_fail"]);unset($_SESSION["update_fail"]);}
  
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
  
    // Načtení databáze do associativího pole
  $sql = "SELECT * FROM zbozi";
	$result = $conn->query($sql);

  //Výpis položek
  $arr=0;
    while($row = $result->fetch_assoc()) {
      $zbozi[$arr]["id"]=$row["id_zbozi"];
      $zbozi[$arr]["nazev"]=$row["nazev"];
      $zbozi[$arr]["popis"]=$row["popis"];
      $zbozi[$arr]["cena"]=$row["cena"];
      $zbozi[$arr]["obrazek"]=$row["image"];
      $zbozi[$arr]["update"]="<a href='update.php?id=".$row['id_zbozi']."'><img src='update18.png' style='width:15px;height:15px;' alt='Upravit'></a>";
      $zbozi[$arr]["delete"]="<a href='upravit_zbozi.php?id=".$row['id_zbozi']."&delete=1'><img src='symbol5.png' style='width:15px;height:15px;' alt='Smazat'></a>";
      $arr++;
    }

    //DELETE
    if(isset($_GET['delete'])){  
      $id=$_GET['id'];
      $conn = new mysqli($servername, $username, $password, $dbname);
      $dotaz="DELETE FROM zbozi WHERE id_zbozi='$id'";
      $conn->query($dotaz);
      header('Location: upravit_zbozi.php');
       $conn->close();
  };    
  // Ukončíme spojení s databází
  $conn->close();

  $smarty->assign("zbozi",$zbozi);
  $smarty->display("../templates/upravit_zboziTpl.tpl");
?>