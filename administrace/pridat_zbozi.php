<?php
       session_start();
       require'../libs/Smarty.class.php';

   $smarty = new Smarty();

   if(isset($_SESSION["user"])){
      $smarty->assign("session_user",$_SESSION["user"]);
   }
   if(isset($_SESSION["admin"])){
      $smarty->assign("admin",$_SESSION["admin"]);
   }
   
    // Načtení databáze
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
  
    $vyrobce_dotaz="SELECT * FROM vyrobce";
    $result_vyrobce=$conn->query($vyrobce_dotaz);
    $arr=0;
      while($row_vyrobce = $result_vyrobce->fetch_assoc()){
        $id_vyrobce=$row_vyrobce["id_vyrobce"];
        $vyrobce[$arr]["nazev"]="<option value='$id_vyrobce'>".$row_vyrobce["nazev_vyrobce"]."</option>";
        $arr++;
      }
          $smarty->assign("vyrobce",$vyrobce);

    $procesor_dotaz="SELECT * FROM procesor";
    $result_procesor=$conn->query($procesor_dotaz);
      while($row_procesor = $result_procesor->fetch_assoc()){
        $id_procesor=$row_procesor["id_procesoru"];
        $procesor[$arr]["nazev"]="<option value='$id_procesor'>".$row_procesor["nazev_procesoru"]." [počet jader: ".$row_procesor["pocet_jader"]."]</option>";
        $arr++;
      }
          $smarty->assign("procesor",$procesor);

          

    $rozliseni_dotaz="SELECT * FROM rozliseni_displeje"; 
    $result_rozliseni=$conn->query($rozliseni_dotaz);
    $arr=0;
      while($row_rozliseni = $result_rozliseni->fetch_assoc()){
        $id_rozliseni=$row_rozliseni["id_rozliseni"];
        $rozliseni[$arr]["nazev"]="<option value='$id_rozliseni'>".$row_rozliseni["nazev_rozliseni"]."</option>";
        $arr++;
      }
        $smarty->assign("rozliseni",$rozliseni);

      $os_dotaz="SELECT * FROM operacni_system";
      $result_os=$conn->query($os_dotaz);
      $arr=0;
      while($row_os = $result_os->fetch_assoc()){
        $id_os=$row_os["id_os"];
        $os[$arr]["nazev"]="<option value='$id_os'>".$row_os["nazev_os"]."</option>";
        $arr++;
      }
          $smarty->assign("os",$os);

     $gpu_dotaz="SELECT * FROM grafika";
      $result_gpu=$conn->query($gpu_dotaz);
      $arr=0;
      while($row_gpu=$result_gpu->fetch_assoc()){
        $id_gpu=$row_gpu["id_gpu"];
        $gpu[$arr]["nazev"]="<option value='$id_gpu'>".$row_gpu["nazev_gpu"]."</option>";
        $arr++;
      }
          $smarty->assign("gpu",$gpu);

      $dostupnost_dotaz="SELECT * FROM dostupnost";
      $result_dostupnost=$conn->query($dostupnost_dotaz);
       $arr=0;
      while($row_dostupnost=$result_dostupnost->fetch_assoc()){
        $id_dostupnost=$row_dostupnost["id_dostupnost"];
         $dostupnost[$arr]["nazev"]="<option value='$id_dostupnost'>".$row_dostupnost["nazev_dostupnosti"]."</option>";
        $arr++;
      }
          $smarty->assign("dostupnost",$dostupnost);

      $stav_dotaz="SELECT * FROM stav_zbozi";
      $result_stav=$conn->query($stav_dotaz);
       $arr=0;
      while($row_stav=$result_stav->fetch_assoc()){
        $id_stav=$row_stav["id_stavu"];
        $stav[$arr]["nazev"]="<option value='$id_stav'>".$row_stav["nazev_stavu"]."</option>";
        $arr++;
      }
      $smarty->assign("stav",$stav);

      $kategorie_dotaz="SELECT * FROM kategorie";
      $result_kategorie=$conn->query($kategorie_dotaz);
       $arr=0;
      while($row_kategorie=$result_kategorie->fetch_assoc()){
        $id_kateg=$row_kategorie["id_kategorie"];
        $kategorie[$arr]["nazev"]="<option value='$id_kateg'>".$row_kategorie["nazev_kategorie"]."</option>";
        $arr++;
      }
      $smarty->assign("kategorie",$kategorie);
	
	 //Vlozit zbozi
    if(isset($_GET['pridej'])){
                    $nazev=$_GET["nazev"];
                    $popis=$_GET["popis"];
                    $cena=$_GET["cena"];
                    $obrazek=$_GET["obrazek"];
                    $dostupnost=$_GET["dostupnost"];
                    $vyrobce=$_GET["vyrobce"];
                    $stav_zbozi=$_GET["stav_zbozi"];
                    $procesor=$_GET["procesor"];
                    $uhlopricka=$_GET["uhlopricka"];
                    $rozliseni=$_GET["rozliseni"];
                    $os=$_GET["os"];
                    $operacni_pamet=$_GET["operacni_pamet"];
                    $interni_pamet=$_GET["interni_pamet"];
                    $gpu=$_GET["gpu"];
                    $kategorie=$_GET["kategorie"];					                                                                                                                                                                                                                           
				    $sql_pridej="INSERT INTO zbozi VALUES('NULL','$nazev','$popis','$cena','$obrazek','$dostupnost','$vyrobce','$stav_zbozi','$procesor','$uhlopricka','$rozliseni','$os','$operacni_pamet','$interni_pamet','$gpu','$kategorie')";
						 $conn->query($sql_pridej);
						 $conn->close();
						 $_SESSION["pridano"]='1';
					header('Location: upravit_zbozi.php');
             
				 };
		  $smarty->display("../templates/pridat_zboziTpl.tpl");
?>