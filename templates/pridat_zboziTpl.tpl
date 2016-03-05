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
        <li class="active"><a href="../vypis_zbozi.php">Zboží</a></li>
        <li><a href="user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="../kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user}</p></li>
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
          <h2>Administrace zboží</h2>
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
            <h3>Přidat zboží</h3>
          </div>
          <div>
            <form class="form-horizontal">
              <div class="form-group">
              <label for="nazev" class="col-sm-2 control-label" >Název zboží</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nazev" name="nazev" required>
                </div>
              </div>
              <div class="form-group">
              <label for="popis" class="col-sm-2 control-label" >Popis zboží</label>
                <div class="col-sm-5">
                <textarea class="form-control" rows="3" name="popis" required></textarea>
                </div>
              </div>
              <div class="form-group">
              <label for="cena" class="col-sm-2 control-label" >Cena zboží</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="cena" name="cena" required>
                </div>
              </div>
              <div class="form-group">
              <label for="obrazek" class="col-sm-2 control-label" >Obrázek zboží</label>
                <div class="col-sm-5">
                <input type="file" class="form-control" id="obrazek" name="obrazek" required>
                </div>
              </div>
              <div class="form-group">
                <label for="dostupnost" class="col-sm-2 control-label">Dostupnost</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="dostupnost" name="dostupnost">
                      {foreach $dostupnost as $radek_dostupnost}
                        {$radek_dostupnost.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="vyrobce" class="col-sm-2 control-label">Výrobce</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="vyrobce" name="vyrobce">
                     {foreach $vyrobce as $radek_vyrobce}
                        {$radek_vyrobce.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="stav_zbozi" class="col-sm-2 control-label">Stav zboží</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="stav_zbozi" name="stav_zbozi">
                      {foreach $stav as $radek_stav}
                        {$radek_stav.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="procesor" class="col-sm-2 control-label">Procesor</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="procesor" name="procesor" required>
                      {foreach $procesor as $radek_procesor}
                        {$radek_procesor.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
              <label for="uhlopricka" class="col-sm-2 control-label" >Úhlopříčka displeje</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="uhlopricka" name="uhlopricka" required>
                </div>
              </div>

              <div class="form-group">
                <label for="rozliseni" class="col-sm-2 control-label">Rozlišení displeje</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="rozliseni" name="rozliseni" required>
                      {foreach $rozliseni as $radek_rozliseni}
                        {$radek_rozliseni.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="os" class="col-sm-2 control-label">Operační systém</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="os" name="os" required>
                      {foreach $os as $radek_os}
                        {$radek_os.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
              <label for="operacni_pamet" class="col-sm-2 control-label" >Operační paměť</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="operacni_pamet" name="operacni_pamet" required>
                </div>
              </div>

              <div class="form-group">
              <label for="interni_pamet" class="col-sm-2 control-label" >Interní paměť</label>
                <div class="col-sm-5">
                <input type="number" class="form-control" id="interni_pamet" name="interni_pamet" required>
                </div>
              </div>

              <div class="form-group">
                <label for="gpu" class="col-sm-2 control-label">Grafická karta</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="gpu" name="gpu" required>
                      {foreach $gpu as $radek_gpu}
                        {$radek_gpu.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>

              <div class="form-group">
                <label for="kategorie" class="col-sm-2 control-label">Kategorie</label>
                  <div class="col-sm-5">
                    <select class="form-control" id="kategorie" name="kategorie" required>
                      {foreach $kategorie as $radek_kategorie}
                        {$radek_kategorie.nazev}
                      {/foreach}
                    </select>
                  </div>
              </div>
              <input type="submit" name="pridej" class="btn btn-primary" value="Přidat zboží">
            </form>
          </div>
        </div>
  </body>
</html>
