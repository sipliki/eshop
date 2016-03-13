<?php
	session_start();
	require'../libs/Smarty.class.php';

	$smarty = new Smarty();

	if(!isset($_SESSION["user"])){
		header('Location: ../prihlaseni/login.php');
	}

	if(isset($_SESSION["delete_menu"])){
		$smarty->assign("delete_menu",$_SESSION["delete_menu"]);
		unset($_SESSION["delete_menu"]);
	}

	if(isset($_SESSION["update_menu"])){
		$smarty->assign("update_menu",$_SESSION["update_menu"]);
		unset($_SESSION["update_menu"]);
	}

	if(isset($_SESSION["add_menu"])){
		$smarty->assign("add_menu",$_SESSION["add_menu"]);
		unset($_SESSION["add_menu"]);
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

//vypis kategorii
  $sql_kategorie="SELECT * FROM kategorie";
    $result_kategorie=$conn->query($sql_kategorie);
    $arr=0;
      while ($row_kategorie=$result_kategorie->fetch_assoc()) {
        $kategorie[$arr]["id"]=$row_kategorie["id_kategorie"];
        $kategorie[$arr]["nazev"]=$row_kategorie["nazev_kategorie"];
        $kategorie[$arr]["update"]="<a href='upravit_menu.php?id=".$row_kategorie['id_kategorie']."'><img src='update18.png' style='width:15px;height:15px;' alt='Upravit'></a>";
        $kategorie[$arr]["delete"]="<a href='update_menu.php?id=".$row_kategorie['id_kategorie']."&delete=1'><img src='symbol5.png' style='width:15px;height:15px;' alt='Smazat'></a>";
        $arr++;
      }
      $smarty->assign("kategorie",$kategorie);

$username=$_SESSION["user"];
	$dotaz="SELECT * FROM uzivatele WHERE uzivatelske_jmeno='$username'";
	$result = $conn->query($dotaz);
	$row = $result->fetch_assoc();
		$user["admin"]=$row["admin"];
	$smarty->assign("user",$user);
	if($row["admin"]=='1'){$smarty->assign("admin",$user["admin"]);$_SESSION["admin"]='1';}

//DELETE
    if(isset($_GET['delete'])){  
      $id=$_GET['id'];
      $dotaz="DELETE FROM kategorie WHERE id_kategorie='$id'";
      $conn->query($dotaz);
      $_SESSION["delete_menu"]=1;
      header('Location: update_menu.php');
  };    

	$conn->close();
	$smarty->assign("session_user",$_SESSION["user"]);
	$smarty->display("../templates/update_menuTpl.tpl")
?>