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
          <h2>Moje objednávky</h2>
      <div class="btn-group">
        <a href="../administrace/user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
       {if isset($admin)}
            <a href="../administrace/upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit zboží</a>
            <a href="../administrace/pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            {/if}
        </div><br />
        <br />
        {if isset ($bez_objednavky)}
        <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Zatím jste si u nás nic neobjednal</div>

        {else}
          {if isset($zruseni)}
          <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Objednávka byla úspěšně zrušena</div>
          {/if}
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    {foreach $objednavka as $radek_objednavka}
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading{$radek_objednavka.id}">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{$radek_objednavka.id}" aria-controls="collapse{$radek_objednavka.id}" aria-expanded="false">
          Objednávka  #{$radek_objednavka.id} 
        </a>
      </h4>
    </div>
    <div id="collapse{$radek_objednavka.id}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{$radek_objednavka.id}">
      <div class="panel-body">
        <div class="text-left">
          <b>Datum vytvoření objednávky:</b> {$radek_objednavka.datum} 
        </div>
        <div class="text-right">
          <form>
            <input type="hidden" name="id_objednavky" value="{$radek_objednavka.id}" />
          <button type="submit" name="zrusit" class="btn btn-primary">Zrušit objednávku</button>
          </form>
        </div>
        <div class="text-left">
          <h4>Objednané zboží</h4>
            <table class="table table-hover">
              <thead>
                <tr><th>Název</th><th>Cena</th></tr>
              </thead>
              <tbody>
                {foreach $radek_objednavka.zbozi as $radek_zbozi}
                  <tr>
                    {foreach $radek_zbozi as $bunka_zbozi}
                    <th>{$bunka_zbozi}</th>
                    {/foreach}
                  </tr>
                 {/foreach}
                 <tr><th>Doprava: {$radek_objednavka.nazev_doprava}</th><th>{$radek_objednavka.cena_doprava}</th></tr>
                 <tr><th>Platba: {$radek_objednavka.nazev_platba}</th><th>{$radek_objednavka.cena_platba}</th></tr>
                 <tr><th>Celková cena:</th><th>{$radek_objednavka.celkova_cena}</th></tr>
              </tbody>
            </table>
            <br />
            <h4>Doručovací a fakturační údaje</h4>
            <div class="text-left">
              <b>Jméno a příjmení:</b><br /> 
              {$radek_objednavka.jmeno} {$radek_objednavka.prijmeni}<br />
              <b>Adresa:</b><br />
              {$radek_objednavka.ulice} <br />
              {$radek_objednavka.psc} {$radek_objednavka.mesto}
            </div>
        </div>
      </div>
    </div>
  </div>
  {/foreach}
</div>
{/if}
  </body>
</html>
