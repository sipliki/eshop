<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <title>E-SHOP</title>
  </head>
  <body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="../administrace/user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="objednavky.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            {else}
        <li><a href="../prihlaseni/register.php?kosik=1"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php?kosik=1.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
<div class="container">
          <div class="col-lg-12 text-center"> 
          <h2>Upravit objednávku</h2>
      <div class="btn-group">
        <a href="../administrace/user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednavky"> Moje objednávky</a>
       {if isset($admin)}
            <a href="../administrace/upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit/Smazat zboží</a>
            <a href="../administrace/pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            <a href="update_menu.php" class="btn btn-primary" name="upravit_menu">Upravit menu</a>
            <a href="upravit_menu.php" class="btn btn-primary" name="pridat_menu">Přidat menu</a>
            <a href="vypis_objednavek.php" class="btn btn-warning" name="vypis-objednavek">Výpis všech objednávek</a>
            {/if}
        </div><br />
        <br />
        <div class="col-md-12">
          <div class="col-md-10 text-center">
            <h3>Objednávka  #{$objednavka.id} </h3>
          </div>
          <div class="col-md-2 text-right">
          <form method="post">
            <input type="hidden" name="id_objednavky" value="{$objednavka.id}" />
          <button type="submit" name="zrusit" class="btn btn-danger">Zrušit objednávku</button>
          </form>
        </div> 
        </div>
          
        <div class="text-left">
          <b>Datum vytvoření objednávky:</b> {$objednavka.datum} 
        </div>
        
       
        <div class="text-left">
          <h4>Objednané zboží</h4>
          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr><th>Název</th><th>Cena</th><th>Odebrat</th></tr>
              </thead>
              <tbody>
                {foreach $objednavka.zbozi as $radek_zbozi}
                  <tr>
                    <th>{$radek_zbozi.nazev_zbozi}</th><th>{$radek_zbozi.cena_zbozi}</th>
                    <th>
                      <form method="post">
                        <input type="hidden" name="id" value="{$objednavka.id}">
                      <input type="hidden" name="id_zbozi" value="{$id}">
                      <button type="submit" class="btn btn-info" name="odebrat"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    </form>
                    </th>
                  </tr>
                 {/foreach}
                 <tr><th>Celková cena:</th><th>{$objednavka.celkova_cena}</th></tr>
              </tbody>
            </table>
          </div>
        <br />
        <form>
          <h4>Doprava a platba</h4>
          <div class="form-group col-md-12">
                <label for="doprava" class="col-sm-2 control-label">Doprava</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="doprava" name="doprava">
                      {foreach $doprava_vypis as $radek_doprava}
                        {$radek_doprava.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>
          <div class="form-group col-md-12">
                <label for="platba" class="col-sm-2 control-label">Platba</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="platba" name="platba">
                      {foreach $platba_vypis as $radek_doprava}
                        {$radek_doprava.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>
          <div class="col-md-12">
            <h4>Doručovací a fakturační údaje</h4>
          </div>
      <div class="form-group">
        <label for="jmeno">Jméno</label>
        <input type="text" class="form-control" id="jmeno" name="jmeno" value="{$objednavka.jmeno}">
  </div>
  <div class="form-group">
    <label for="prijmeni">Příjmení</label>
    <input type="text" class="form-control" id="prijmeni" name="prijmeni" value="{$objednavka.prijmeni}">
  </div>
  <div class="form-group">
    <label for="ulice">Ulice</label>
    <input type="text" class="form-control" id="ulice" name="ulice" value="{$objednavka.ulice}">
  </div>
  <div class="form-group">
    <label for="mesto">Město</label>
    <input type="text" class="form-control" id="mesto" name="mesto" value="{$objednavka.mesto}">
  </div>
  <div class="form-group">
    <label for="psc">PSČ</label>
    <input type="text" class="form-control" id="psc" name="psc" value="{$objednavka.psc}">
  </div>
  <div class="col-md-6">
    <input type="hidden" name="id" value="{$objednavka.id}"> 
    <button type="submit" class="btn btn-primary" name="update">Uložit změny</button>
  </div>
  
</form>           
      </div>
    </div>
  </body>
</html>
