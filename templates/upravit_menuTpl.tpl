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
          <h2>Upravit menu</h2>
      <div class="btn-group">
        <a href="user.php" class="btn btn-success" name="user">Informace</a>
       <a href="../objednavka/objednavky.php" class="btn btn-success" name="objednávky"> Moje objednávky</a>
       {if isset($admin)}
            <a href="upravit_zbozi.php" class="btn btn-info" name="upravit_zbozi">Upravit/Smazat zboží</a>
            <a href="pridat_zbozi.php" class="btn btn-info" name="pridat_zbozi">Přidat zboží</a>
            <a href="update_menu.php" class="btn btn-primary" name="upravit_menu">Upravit menu</a>
            <a href="upravit_menu.php" class="btn btn-primary" name="pridat_menu">Přidat menu</a>
            <a href="vypis_objednavek.php" class="btn btn-warning" name="vypis-objednavek">Výpis všech objednávek</a>
            {/if}
        </div><br />
        <div class="container">
          {if isset($kategorie)} 
          <div class="col-lg-12 text-left">
            <h3>Upravit položku menu</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="nazev" class="col-sm-2 control-label" >Název kategorie</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nazev" value="{$kategorie.nazev}" name="nazev">
                </div>
              </div>
              <input type="hidden" name="id_radku" value="{$kategorie.id}">
              <input type="submit" name="update" class="btn btn-primary" value="Uložit změny">
            </form>
            </div>

            {else}
            <div class="col-lg-12 text-left">
            <h3>Přidat položku menu</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="nazev" class="col-sm-2 control-label" >Název kategorie</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nazev" name="nazev">
                </div>
              </div>
              <input type="submit" name="add" class="btn btn-primary" value="Přidat kategorii">
            </form>
            </div>
            {/if}
          
        </div>
  </body>
</html>
