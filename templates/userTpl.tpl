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
        <li class="active"><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="user.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
            {else}
        <li><a href="../prihlaseni/register.php"><span class="glyphicon glyphicon-user"></span> Zaregistrovat se</a></li>
        <li><a href="../prihlaseni/login.php"><span class="glyphicon glyphicon-log-in"></span> Přihlásit se</a></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
          <div class="col-lg-12 text-center">
          <h2>Můj účet</h2>
      <div class="btn-group">
        <a href="user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
       {if isset($admin)}
            <a href="upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit/Smazat zboží</a>
            <a href="pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            {/if}
        </div><br />
        <div class="container">
          <div class="col-lg-12 text-left">
            <h3>Přihlašovací údaje</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="uzivatelske_jmeno" class="col-sm-2 control-label" >Uživatelské jméno</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="uzivatelske_jmeno" value="{$user.uzivatelske_jmeno}" name="uzivatelske_jmeno">
                </div>
              </div>
                <div class="form-group">
                <label for="heslo" class="col-sm-2 control-label">Heslo</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" id="heslo" name="heslo">
                </div>
              </div>
              <div class="form-group">
                <label for="nove_heslo" class="col-sm-2 control-label">Nové heslo</label>
                <div class="col-sm-5">
                <input type="password" class="form-control" id="nove_heslo"  name="nove_heslo">
                </div>
              </div>
              <div class="col-lg-12 text-left">
                <h3>Fakturační a doručovací údaje</h3>
              </div>
              <div class="form-group">
                <label for="jmeno" class="col-sm-2 control-label">Jméno</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="jmeno" value="{$user.jmeno}" name="jmeno">
                </div>
              </div>
              <div class="form-group">
                <label for="prijmeni" class="col-sm-2 control-label">Příjmení</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="prijmeni" value="{$user.prijmeni}" name="prijmeni">
                </div>
              </div>
              <div class="form-group">
                <label for="ulice" class="col-sm-2 control-label">Ulice</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="ulice" value="{$user.ulice}" name="ulice">
                </div>
              </div>
              <div class="form-group">
                <label for="mesto" class="col-sm-2 control-label">Město</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="mesto" value="{$user.mesto}" name="mesto">
                </div>
              </div>
              <div class="form-group">
                <label for="psc" class="col-sm-2 control-label">PSČ</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="psc" value="{$user.psc}" name="psc">
                </div>
              </div>
              <input type="hidden" name="id_radku" value="{$user.ID}">
              <input type="submit" name="update_uzivatele" class="btn btn-primary" value="Uložit změny">
            </form>
          </div>
        </div>
  </body>
</html>
