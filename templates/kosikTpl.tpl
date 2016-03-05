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
      <a class="navbar-brand" href="vypis_zbozi.php">E-shop</a>
    </div>

    <div>
      <ul class="nav navbar-nav">
        <li><a href="vypis_zbozi.php">Zboží</a></li>
        <li><a href="administrace/user.php">Můj účet</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        {if isset($kosik)}
              <li><a href="kosik.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Dokončit objednávku</a></li>
           {/if}
        {if isset($session_user)}
            <li><p class="navbar-text">Přihlášen uživatel {$session_user} <a href="kosik.php?logout=1" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></p></li>
         {/if}
      </ul>
    </div>
  </div>
  </nav>
 <div class="container">
    <div class="col-md-12 text-center"> 
      <h2>Dokončení objednávky</h2>
    </div>
    <div>
      <div class="col-md-12 text-center">
        <div class="col-md-12">
          <h3>Výpis zboží v košíku</h3>
          <div class="col-md-10">
          <table class="table table-hover">
            <thead>
              <tr><td>Název zboží</td><td>Cena</td><td>Množství</td></tr>
            </thead>
            <tbody>
             {foreach $zbozi as $radek}
              <tr>{foreach $radek as $bunka}
                <th>{$bunka}</th>{/foreach}
                <th>
                  <form>
                   <div class="col-md-8">
                      <input type="number" class="form-control" name="mnozstvi" value="1" max="5" min="1" disabled />
                      <input type="hidden" name="id_zbozi" value="{}">
                   </div>
                  </form>
                </th>
              </tr>{/foreach}
            </tbody>
            </table>
          </div>
          <div class="col-md-2">
            <table class="table table-hover">
              <thead>
                <tr><td>Odebrat položku</td></tr>
              </thead>
              <tbody>
                {foreach $id_zbozi as $id_radek}
                  <tr>{foreach $id_radek as $id}
                    <th>
                      <form>
                      <input type="hidden" name="id_zbozi" value="{$id}">
                      <button type="submit" class="btn btn-info" name="odebrat"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    </form>
                    </th>{/foreach}
              </tr>{/foreach}
            </tbody>
          </table>
        </div>
        </div>
        <form>
        <div class="col-md-6 text-left">
          <h3 class="text-center">Doprava</h3>
          <table class="table table-hover">
               {foreach $doprava as $radek_doprava}
                  <tr> <th><input type="radio" name="doprava" value="{$radek_doprava.nazev}" required></th>
                   {foreach $radek_doprava as $bunka_doprava}
                    <th>{$bunka_doprava}</th>
                  {/foreach} </tr>
                {/foreach}
          </table>
        </div>
        <div class="col-md-6">
          <h3>Způsob platby</h3>
          <table class="table table-hover">
              {foreach $platba as $radek_platba}
                  <tr> <th><input type="radio" name="platba" value="{$radek_platba.nazev}" required></th>
                    {foreach $radek_platba as $bunka_platba}
                    <th>{$bunka_platba}</th>
                  {/foreach} </tr>
                {/foreach}
          </table>
        </div>
        <div class="col-md-12 text-right">
        <button type="submit" formaction="objednavka/shrnuti.php" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Shrnutí objednávky</button>
        </div>
      </form>
    </div>
  </div>
  </body>
</html>
