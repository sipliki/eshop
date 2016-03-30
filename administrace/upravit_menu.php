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

//vypis kategorie
	if(isset($_GET["id"])){	
 		$id=$_GET["id"];
  		$sql_kategorie="SELECT * FROM kategorie WHERE id_kategorie='$id'";
    		$result_kategorie=$conn->query($sql_kategorie);
      			$row_kategorie=$result_kategorie->fetch_assoc();
       				$kategorie["id"]=$row_kategorie["id_kategorie"];
        			$kategorie["nazev"]=$row_kategorie["nazev_kategorie"];

      	$smarty->assign("kategorie",$kategorie);}
     else{

     }

$username=$_SESSION["user"];
	$dotaz="SELECT * FROM uzivatele WHERE uzivatelske_jmeno='$username'";
	$result = $conn->query($dotaz);
	$row = $result->fetch_assoc();
		$user["admin"]=$row["admin"];
	$smarty->assign("user",$user);
	if($row["admin"]=='1'){$smarty->assign("admin",$user["admin"]);$_SESSION["admin"]='1';}

	//update položky
		if(isset($_POST['update'])){

             $id=$_POST["id_radku"];
             $nazev=$_POST["nazev"];                                                                                                                                                                                                                                  
            $update= "UPDATE kategorie SET nazev_kategorie='$nazev' WHERE id_kategorie='$id'";
             $conn->query($update);
             $_SESSION["update_menu"]=1;
             header('Location: update_menu.php');
             
         };

    //přidání položky
        if(isset($_POST['add'])){

            $nazev=$_POST["nazev"];                                                                                                                                                                                                                                  
            $add= "INSERT INTO kategorie VALUES ('NULL','$nazev')";
             $conn->query($add);
             $_SESSION["add_menu"]=1;
             header('Location: update_menu.php');
             
         };
	$conn->close();
	$smarty->assign("session_user",$_SESSION["user"]);
	$smarty->display("../templates/upravit_menuTpl.tpl")
?>