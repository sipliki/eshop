<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styl.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="custom.css" rel="stylesheet">
  <meta charset="utf-8">
  <title>Detail</title>
  </head>
  <body>
  		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="vypis_zbozi.php">Zboží</a></li>
        <li><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="vypis_zbozi.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            {else}
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
  <div id="outline">
		<div class="container">
		 <img src="{$zbozi.obrazek}" class="img-detail"><br /><br />
		 <ul class="nav nav-tabs">
		 <li class="active"><a data-toggle="pill" href="#popis">Popis</a><li>
		 <li><a  data-toggle="pill" href="#parametry">Parametry</a><li>
      {if isset($filtr)}
        <li><a href="filtr.php?filtr=1" class="btn btn-primary">Zpět na výpis</a></li>
      {else}
        <li><a  href="vypis_zbozi.php" class="btn btn-primary">Zpět na výpis</a></li>
      {/if}
		 </ul>
		 <div class="tab-content">
			<div id="popis" class="tab-pane fade in active">
       <div class="col-xs-12 col-md-9">
          <h3>{$zbozi.nazev}</h3><br />
          {$zbozi.popis}<br /><br />
          <strong>Dostupnost: </strong>{$dostupnost.nazev}<br /><br />
          <strong>Stav zboží: </strong>{$stav.nazev}
          <h4>Cena:</h4> <strong>{$zbozi.cena} Kč</strong><br /><br />
          <form class="form-inline">
            <input type="hidden" name="id" value="{$zbozi.id}" >
            <input type="hidden" name="id_kosik" value="{$zbozi.id}" >
            <button type='submit' name='pridat_zbozi' class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Vložit do košíku </button>
          </form>
       </div>
			</div>
			<div id="parametry" class="tab-pane fade">
        <div class="col-xs-12 col-md-6">
          <table class="table">
            <thead>
              <tr><td><h3>Parametry a specifikace</h3></td></tr>
            </thead>
            <tbody>
              <tr><td>Výrobce:</td><td>{$vyrobce.nazev_vyrobce}</td></tr>
              <tr><td>Operační systém:</td><td>{$os.nazev}</td></tr>
              <tr><td>Operační paměť:</td><td>{$zbozi.operacni_pamet} GB</td></tr>
              <tr><td>Interní paměť:</td><td>{$zbozi.interni_pamet} GB</td></tr>

              <tr class="info"><td><h4>Procesor</h4></td><td></td></tr>
              <tr><td>Typ procesoru:</td><td>{$procesor.nazev}</td></tr>
              <tr><td>Počet jader:</td><td>{$procesor.pocet_jader}</td></tr>

              <tr class="info"><td><h4>Displej</h4></td><td></td></tr>
              <tr><td>Úhlopříčka displeje</td><td>{$zbozi.uhlopricka}"</td></tr>
              <tr><td>Rozlišení:</td><td>{$rozliseni.nazev}</td></tr>
              <tr><td>Počet pixelů:</td><td>{$rozliseni.x} x {$rozliseni.y}</td></tr>

              <tr class="info"><td><h4>Grafická karta</h4></td><td></td></tr>
              <tr><td>Typ grafické karty:</td><td>{$gpu.nazev}</td></tr>
              <tr><td>Pamět grafické karty:</td><td>{$gpu.pamet} GB</td></tr>
            </tbody>
          </table>
        </div>
			</div>
			</div>	
	 </div>
</div>
  </body>
</html>