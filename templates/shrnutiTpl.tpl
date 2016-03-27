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
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="shrnuti.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            {else}
        <li><a href="../prihlaseni/register.php?kosik=1"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php?kosik=1"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
    <div class="col-md-12 text-center"> 
      <h2>Shrnutí objednávky</h2>
    </div>
      <div class="col-md-12 text-center">
        <div class="col-md-12">
          <h3>Výpis zboží v košíku</h3>
          <table class="table">
            <thead>
              <tr><td>Název zboží</td><td>Cena</td></tr>
            </thead>
            <tbody>
             {foreach $zbozi as $radek}
              <tr>{foreach $radek as $bunka}
                <th>{$bunka}</th>{/foreach}
              </tr>{/foreach}
            </tbody>
            <thead>
              <tr><td>Doprava: {$doprava.nazev}</td><td>{$doprava.cena} Kč</td></tr>
              <tr><td>Platba: {$platba.nazev}</td><td>{$platba.cena} Kč</td></tr>
              <tbody>
              <tr class="info"><td>Celková cena:</td><td>{$celkova_cena} Kč</td></tr>
            </tbody>
            </thead>
          </table>
        </div>
    </div>
    <div class="col-md-12 text-left">
      <form class="form-horizontal">
        {if isset($user)}
        Přihlášen jako uživatel <b>{$user.nick}</b>.
        Nejste to vy? <a href="shrnuti.php?logout=1" class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a><br />
          <h3>Fakturační a dodací údaje</h3><br />
            <div class="form-group">
              <label for="id_jmeno" class="col-sm-2 control-label">Jméno:</label>
                <div class="col-sm-10">
                  <input type="text" name="jmeno" id="id_jmeno" class="form-control" value="{$user.jmeno}" />
                </div>
            </div>
            <div class="form-group">
              <label for="id_prijmeni" class="col-sm-2 control-label">Příjmení:</label>
                <div class="col-sm-10">
                  <input type="text" name="prijmeni" id="id_prijmeni" class="form-control" value="{$user.prijmeni}" />
                </div>
              </div>
                <div class="form-group">
              <label for="id_ulice" class="col-sm-2 control-label">Ulice:</label>
                <div class="col-sm-10">
                  <input type="text" name="ulice" id="id_ulice" class="form-control" value="{$user.ulice}" />
                </div>
            </div>
            <div class="form-group">
              <label for="id_mesto" class="col-sm-2 control-label">Město:</label>
                <div class="col-sm-10">
                  <input type="text" name="mesto" id="id_mesto" class="form-control" value="{$user.mesto}" />
                </div>
            </div>
            <div class="form-group">
              <label for="id_psc" class="col-sm-2 control-label">PSČ:</label>
                <div class="col-sm-10">
                  <input type="number" name="psc" id="id_psc" class="form-control" value="{$user.psc}" min="00000" max="99999"/>
                </div>
            </div>
            <input type="hidden" name="id" value="{$user.id}">
            <input type="hidden" name="cena" value="{$celkova_cena}">
            <input type="hidden" name="doprava" value="{$doprava.id}">
            <input type="hidden" name="platba" value="{$platba.id}">
        {else}
        Nejste přihlášeni. Pokud máte účet přihlašte se. <a href="../prihlaseni/login.php?shrnuti=1" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a><br />
        Nakupujete u nás často a nemáte účet. Vytvořte si ho zdarma. <a href="../prihlaseni/register.php?kosik=1" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> Vytvořit účet</a><br />
        <h3>Fakturační a dodací údaje</h3><br />
            <div class="form-group">
              <label for="id_jmeno" class="col-sm-2 control-label">Jméno:</label>
                <div class="col-sm-10">
                  <input type="text" name="jmeno" id="id_jmeno" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
              <label for="id_prijmeni" class="col-sm-2 control-label">Příjmení:</label>
                <div class="col-sm-10">
                  <input type="text" name="prijmeni" id="id_prijmeni" class="form-control" required/>
                </div>
              </div>
                <div class="form-group">
              <label for="id_ulice" class="col-sm-2 control-label">Ulice:</label>
                <div class="col-sm-10">
                  <input type="text" name="ulice" id="id_ulice" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
              <label for="id_mesto" class="col-sm-2 control-label">Město:</label>
                <div class="col-sm-10">
                  <input type="text" name="mesto" id="id_mesto" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
              <label for="id_psc" class="col-sm-2 control-label">PSČ:</label>
                <div class="col-sm-10">
                  <input type="number" name="psc" id="id_psc" class="form-control" min="00000" max="99999" required/>
                </div>
            </div>
            <input type="hidden" name="cena" value="{$celkova_cena}">
        {/if}
      <div class="col-md-12">
        <div class="col-md-6 text-left">
          <a href="../kosik.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Zpět k výpisu zboží </a> 
        </div>
    <div class="col-md-6 text-right">
      <button type="submit" class="btn btn-primary btn-lg" name="objednat">Objednat zboží <span class="glyphicon glyphicon-chevron-right"></span></button>
    </div>
  </div>
      </form>
      </div>
  </body>
</html>
