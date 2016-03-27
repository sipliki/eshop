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

     //UPDATE
    if(isset($_GET['update'])){
         $id=$_GET["id_zbozi"];
         $nazev=$_GET["nazev"];
         $popis=$_GET["popis"];
         $cena=$_GET["cena"];
         $img=$_GET["obrazek"]; 
         $dostupnost=$_GET["dostupnost"];
         $procesor=$_GET["procesor"];
         $vyrobce=$_GET["vyrobce"];
         $stav_zbozi=$_GET["stav_zbozi"]; 
         $uhlopricka=$_GET["uhlopricka"];
         $rozliseni=$_GET["rozliseni"];
         $os=$_GET["os"];
         $operacni_pamet=$_GET["operacni_pamet"];
         $interni_pamet=$_GET["interni_pamet"]; 
         $gpu=$_GET["gpu"];                                                                                                                                                                                                                                          
            $update= "UPDATE zbozi SET nazev='$nazev', popis='$popis', cena='$cena', image='$img', dostupnost='$dostupnost', vyrobce='$vyrobce', stav_zbozi='$stav_zbozi', procesor='$procesor', uhlopricka_displeje='$uhlopricka', rozliseni_displeje='$rozliseni', operacni_system='os', operacni_pamet='$operacni_pamet', interni_pamet='$interni_pamet', gpu='$gpu'  WHERE id_zbozi='$id' ";
             $conn->query($update);
             $_SESSION["update"]=1;
             header('Location: upravit_zbozi.php');
             
         };
	       //vypis polozek
         if(!isset($_GET["id"])){$_SESSION["update_fail"]='1';header('Location: upravit_zbozi.php');}
          else{
         $id=$_GET["id"];
         $dotaz="SELECT * FROM zbozi WHERE id_zbozi='$id'";
	       $result = $conn->query($dotaz);
	       	$row = $result->fetch_assoc();
    	$zbozi["id"]=$row["id_zbozi"];
      $zbozi["nazev"]=$row["nazev"];
      $zbozi["popis"]=$row["popis"];
      $zbozi["cena"]=$row["cena"];
      $zbozi["obrazek"]=$row["image"];
      $zbozi["interni_pamet"]=$row["interni_pamet"];
      $zbozi["operacni_pamet"]=$row["operacni_pamet"];
      $zbozi["uhlopricka"]=$row["uhlopricka_displeje"];

      $vychozi_vyrobce=$row["vyrobce"];
      $vychozi_procesor=$row["procesor"];
      $vychozi_rozliseni=$row["rozliseni_displeje"];
      $vychozi_os=$row["operacni_system"];
      $vychozi_gpu=$row["gpu"];
      $vychozi_dostupnost=$row["dostupnost"];
      $vychozi_stav=$row["stav_zbozi"];
      $vychozi_kategorie=$row["kategorie"];

      $smarty->assign("zbozi",$zbozi);
  
    $vyrobce_dotaz="SELECT * FROM vyrobce";
    $result_vyrobce=$conn->query($vyrobce_dotaz);
    $arr=0;
      while($row_vyrobce = $result_vyrobce->fetch_assoc()){
        $id_vyrobce=$row_vyrobce["id_vyrobce"];
        if($id_vyrobce==$vychozi_vyrobce){
            $vyrobce[$arr]["nazev"]="<option value='$id_vyrobce' selected>".$row_vyrobce["nazev_vyrobce"]."</option>";}
          else $vyrobce[$arr]["nazev"]="<option value='$id_vyrobce'>".$row_vyrobce["nazev_vyrobce"]."</option>";
        $arr++;
      }
          $smarty->assign("vyrobce",$vyrobce);

    $procesor_dotaz="SELECT * FROM procesor";
    $result_procesor=$conn->query($procesor_dotaz);
      while($row_procesor = $result_procesor->fetch_assoc()){
        $id_procesor=$row_procesor["id_procesoru"];
        if($id_procesor==$vychozi_procesor){
            $procesor[$arr]["nazev"]="<option value='$id_procesor' selected>".$row_procesor["nazev_procesoru"]." [počet jader: ".$row_procesor["pocet_jader"]."]</option>";}
          else $procesor[$arr]["nazev"]="<option value='$id_procesor'>".$row_procesor["nazev_procesoru"]." [počet jader: ".$row_procesor["pocet_jader"]."]</option>";
        $arr++;
      }
          $smarty->assign("procesor",$procesor);

          

    $rozliseni_dotaz="SELECT * FROM rozliseni_displeje"; 
    $result_rozliseni=$conn->query($rozliseni_dotaz);
    $arr=0;
      while($row_rozliseni = $result_rozliseni->fetch_assoc()){
        $id_rozliseni=$row_rozliseni["id_rozliseni"];
        if($id_rozliseni==$vychozi_rozliseni){
            $rozliseni[$arr]["nazev"]="<option value='$id_rozliseni' selected>".$row_rozliseni["nazev_rozliseni"]."</option>";}
          else $rozliseni[$arr]["nazev"]="<option value='$id_rozliseni'>".$row_rozliseni["nazev_rozliseni"]."</option>";
        $arr++;
      }
        $smarty->assign("rozliseni",$rozliseni);

      $os_dotaz="SELECT * FROM operacni_system";
      $result_os=$conn->query($os_dotaz);
      $arr=0;
      while($row_os = $result_os->fetch_assoc()){
        $id_os=$row_os["id_os"];
        if($id_os==$vychozi_os){
            $os[$arr]["nazev"]="<option value='$id_os' selected>".$row_os["nazev_os"]."</option>";}
          else $os[$arr]["nazev"]="<option value='$id_os'>".$row_os["nazev_os"]."</option>";
        $arr++;
      }
          $smarty->assign("os",$os);

     $gpu_dotaz="SELECT * FROM grafika";
      $result_gpu=$conn->query($gpu_dotaz);
      $arr=0;
      while($row_gpu=$result_gpu->fetch_assoc()){
        $id_gpu=$row_gpu["id_gpu"];
        if($id_gpu==$vychozi_gpu){
            $gpu[$arr]["nazev"]="<option value='$id_gpu' selected>".$row_gpu["nazev_gpu"]."</option>";}
          else $gpu[$arr]["nazev"]="<option value='$id_gpu'>".$row_gpu["nazev_gpu"]."</option>";
        $arr++;
      }
          $smarty->assign("gpu",$gpu);

      $dostupnost_dotaz="SELECT * FROM dostupnost";
      $result_dostupnost=$conn->query($dostupnost_dotaz);
       $arr=0;
      while($row_dostupnost=$result_dostupnost->fetch_assoc()){
        $id_dostupnost=$row_dostupnost["id_dostupnost"];
        if($id_dostupnost==$vychozi_dostupnost){
            $dostupnost[$arr]["nazev"]="<option value='$id_dostupnost' selected>".$row_dostupnost["nazev_dostupnosti"]."</option>";}
          else $dostupnost[$arr]["nazev"]="<option value='$id_dostupnost'>".$row_dostupnost["nazev_dostupnosti"]."</option>";
        $arr++;
      }
          $smarty->assign("dostupnost",$dostupnost);

      $stav_dotaz="SELECT * FROM stav_zbozi";
      $result_stav=$conn->query($stav_dotaz);
       $arr=0;
      while($row_stav=$result_stav->fetch_assoc()){
        $id_stav=$row_stav["id_stavu"];
        if($id_stav==$vychozi_stav){
            $stav[$arr]["nazev"]="<option value='$id_stav' selected>".$row_stav["nazev_stavu"]."</option>";}
          else $stav[$arr]["nazev"]="<option value='$id_stav'>".$row_stav["nazev_stavu"]."</option>";
        $arr++;
      }
      $smarty->assign("stav",$stav);

      $kategorie_dotaz="SELECT * FROM kategorie";
      $result_kategorie=$conn->query($kategorie_dotaz);
       $arr=0;
      while($row_kategorie=$result_kategorie->fetch_assoc()){
        $id_kateg=$row_kategorie["id_kategorie"];
        if($id_kateg==$vychozi_kategorie){
            $kategorie[$arr]["nazev"]="<option value='$id_kateg' selected>".$row_kategorie["nazev_kategorie"]."</option>";}
          else $kategorie[$arr]["nazev"]="<option value='$id_kateg'>".$row_kategorie["nazev_kategorie"]."</option>";
        $arr++;
      }
      $smarty->assign("kategorie",$kategorie);

            };

	      $conn->close(); 
	      $smarty->assign("zbozi",$zbozi);
		  $smarty->display("../templates/updateTpl.tpl");
?>